<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Users
 */
class Users extends MY_Controller
{
    /**
     * Session variable.
     *
     * @var array
     */
    public $Session = [];

    /**
     * Backend constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session', 'pagination', 'form_validation']);
        $this->load->helper(['url', 'string']);
        $this->load->model('Logins', '', true);
        $this->lang->load(['welcome']);

        $this->Session = $this->session->userdata('logged_in');
    }

    /**
     * Middleware controller.
     *
     * @return array
     */
    public function middleware()
    {
        /**
         * Return the list of middlewares you want to be applied,
         * Here is list of some valid options
         *
         * loggged_in                    // As used below, simplest, will be applied to all
         * someother|except:index,list   // This will be only applied to posts()
         * yet_another_one|only:index    // This will be only applied to index()
         */
        return ['logged_in'];
    }

    /**
     * The User management view.
     *
     * @return blade view.
     */
    public function index()
    {
        $this->blade->render('users/index', $this->pagination());
    }

    /**
     * Create a new user in the system.
     *
     * @return string
     */
    public function insert()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === true) {
            // Validation fails

            $input['username'] = $this->input->post('username');
            $input['email']    = $this->input->post('email');
            $input['password'] = password_hash(random_string('alnum', 15), PASSWORD_DEFAULT);


            if (Logins::create($input)) {
                // Validation passes.
                $this->session->set_flashdata('class', 'alert alert-success');
                $this->session->set_flashdata('message', 'The login has been created.');

                redirect('users');
            }
        } else {
            // Validation fails.
            $this->blade->render('users/index', $this->pagination());
        }
    }

    /**
     * [METHOD]: Reset a user his password.
     *
     * @return mixed
     */
    public function reset()
    {
        $userId = $this->uri->segmpent(3);
        $params = ['password' => password_hash(random_string('alnum', '16'), PASSWORD_DEFAULT)];

        if (Logins::find($userId)->update($params)) {
            // TODO: Implement mailing logic.

            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The use password has been reset.');
        }
    }

    /**
     * [METHOD]: Set the status for a user.
     *
     * @return mixed
     */
    public function status()
    {
        $userId = $this->uri->segment(3);
        $status = $this->uri->segment(4);

        if (Logins::findOrFail($userId)->update(['blocked' => $status])) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The user state has been changed');
        }

        redirect('users');
    }

    /**
     * [METHOD]: Destroy a user.
     */
    public function destroy()
    {
        $userId = $this->uri->segment(3);

        if (Logins::destroy($userId)) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The user has been deleted');
        }

        redirect('users');
    }

    /**
     * [METHOD]: Setup the user management pagination.
     *
     * @return mixed
     */
    protected function pagination()
    {
        $config['base_url']    = base_url('/users/index/');
        $config['total_rows']  = count(Logins::all());
        $config['per_page']    = 25;
        $config['uri_segment'] = 3;

        $choice = $config["total_rows"] / $config["per_page"];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['users'] = Logins::skip($page)->take($config['per_page'])->get();
        $data['links'] = $this->pagination->create_links();

        return $data;
    }

}