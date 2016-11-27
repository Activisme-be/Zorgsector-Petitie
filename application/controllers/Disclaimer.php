<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Disclaimer
 */
class Disclaimer extends MY_Controller
{
    /**
     * Authencation session collection.
     *
     * @var array
     */
    public $Session = [];

    /**
     * Disclaimer constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session']);
        $this->load->helper(['url']);
        $this->lang->load(['welcome']);


        $this->Session = $this->session->userdata('logged_in');
    }

    /**
     * Show Disclaimer page.
     *
     * @return blade view
     */
    public function index()
    {
        $this->blade->render('disclaimer');
    }
}