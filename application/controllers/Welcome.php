<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Welcome
 */
class Welcome extends MY_Controller 
{
    public $Session = [];

    /**
     * Welcome constructor.
     */
	public function __construct()
	{
		parent::__construct();
        $this->load->library(['blade', 'session']);
        $this->load->helper(['url']);
        $this->load->model('Signatures', '', true);
        $this->lang->load(['welcome']);

        $this->Session = $this->session->userdata('logged_in');
	}

	public function index() 
	{
        $data['signatures'] = Signatures::count();
		$this->blade->render('welcome', $data);
	}
}
