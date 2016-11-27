<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Signature
 */
class Signature extends MY_Controller
{
    /**
     * @var array
     */
    public $Session = [];

    /**
     * Signature constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url']);
        $this->load->model('signatures', '', true);
        $this->load->library(['pagination', 'session', 'blade', 'form_validation']);

        $this->Session = $this->session->userdata('logged_in');
    }

    /**
     * Middleware for this controller.
     *
     * @return array
     */
    public function middleware()
    {
        return [];
    }

    /**
     * [METHOD]: Search for a specific term.
     * 
     * @return blade view
     */
    public function search() 
    {
        $term = $this->input->post('term');
        $query = Signatures::where('column', 'LIKE', "%$term%");

        $config['base_url']    = base_url('signature/index/'); 
        $config['total_rows']  = count($query->get());
        $config['per_page']    = 25;
        $config['uri_segment'] = 3;

        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['results'] = $query->skip($page)->take($config['per_page'])->get(); 
        $data['links']   = $this->pagination->create_links(); 

        $this->blade->render('signatures/index', $data);
    }

    /**
     * Backend index for the signatures.
     *
     * @return blade view
     */
    public function index()
    {
        $config['base_url']    = base_url('/signature/index/');
        $config['total_rows']  = count(Signatures::all());
        $config['per_page']    = 25;
        $config['uri_segment'] = 3;

        $choice = $config["total_rows"] / $config["per_page"];
        $config['num_links'] = round($choice);

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['results']    = Signatures::skip($page)->take($config['per_page'])->get();
        $data['links']      = $this->pagination->create_links(); 
        $data['signatures'] = Signatures::count(); 

        $this->blade->render('signatures/index', $data);
    }

    /**
     * Insert a signature.
     *
     * @return redirect
     */
    public function insert()
    {
        // Validation is done by vue.js.
        // -------

        // Birth day calculation.
        $day   = $this->input->post('day');
        $month = $this->input->post('month');
        $year  = $this->input->post('year');

        $input['name']          = $this->input->post('name');
        $input['email']         = $this->input->post('email');
        $input['city']          = $this->input->post('city');
        $input['birth_date']    = $day . '/' . $month . '/' . $year;

        // var_dump($input);

        if (Signatures::create($input)) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The signature has been inserted');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Destroy a invalid signature.
     *
     * @return redirect
     */
    public function destroy()
    {
        $sid = $this->uri->segment(3);

        if (Signatures::destroy($sid)) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'The signature has been deleted.');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}