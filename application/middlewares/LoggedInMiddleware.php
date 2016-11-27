<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class LoggedInMiddleware
 */ 
class LoggedInMiddleware
{
	/**
     * The controller instance. 
     * 
     * @var instance
     */ 
    protected $controller;

    /**
     * Codeigniter framework instance. 
     *
     * @var instance
     */ 
    protected $ci;

    /**
     * AuthMiddleware constructor. 
     */
    public function __construct($controller, $ci)
    {
        $this->controller = $controller;
        $this->ci = $ci;
    }

    /**
     * Check if the user is logged in. 
     */
    public function run()
    {
        $this->ci->load->library('session');
        $this->ci->load->helper('url');

        // var_dump($this->ci->session->userdata('logged_in'));
        // die();

        if (! $this->ci->session->userdata('logged_in')) // The user is logged in.
        {
            redirect('login', 'refresh');
        }
    }
}