<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class VerifyLogin
 */
class VerifyLogin extends MY_Controller
{
    /**
     * VerifyLogin constructor.
     *
     * TODO: Implement eloquent
     * TODO: Implement middleware.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'blade']);
        $this->load->database();
        $this->load->helper(['url']);
        $this->lang->load(['welcome']);
        $this->load->model('Logins', '', true);
    }

    /**
     * [METHOD]: Function for authencating the user.
     */
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == false) {
            $this->blade->render('login');
        } else {
            redirect('users', 'refresh');
        }
    }

    /**
     * [METHOD]: Run the user input against the database.
     *
     * @param  $password
     * @return bool
     */
    public function check_database($password)
    {
        $username = $this->input->post('username');
        $result = Logins::where('email', $username)
            ->where('blocked', 0)
            ->where('password', password_hash($password, PASSWORD_DEFAULT))
            ->get();

        if ($result) {
            $auth = [];

            foreach ($result as $row) {
                $auth['id']       = $row->id;
                $auth['username'] = $row->username;
                $auth['email']    = $row->email;

                $this->session->set_userdata('logged_in', $auth);
            }

            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Wrong password or username.');
            return false;
        }
    }

    /**
     * [METHOD]: Password reset function.
     */
    public function reset()
    {
        $email = $this->input->post('email');
        $data  = $this->user->reset_pass_data($email);

        if ($data) {
            $password['new'] = random_string('alnum', 16);
            $this->user->new_password($password);

            // Sending the notification mail.
            $mail = $this->blade->render('emails/reset');

            $this->email->from('email address', 'email name');
            $this->email->to($email);
            $this->email->subject('Reset password');
            $this->email->message($mail);
            $this->email->set_mailtype('html');
            $this->email->send();
            $this->email->clear();
        }

        $this->blade->render('login');
    }
}

