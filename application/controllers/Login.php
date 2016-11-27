<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class VerifyLogin
 */
class Login extends MY_Controller
{
    /**
     * VerifyLogin constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'form_validation', 'session']);
        $this->load->helper(['url']);
        $this->lang->load(['welcome']);
    }

    /**
     * [VIEW]: Get the login view.
     *
     * @return blade view.
     */
    public function index()
    {
        $this->blade->render('login');
    }

    /**
     * [METHOD]: Log the user out off the system.
     *
     * @return mixed
     */
    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        
        redirect('/');
    }
}
