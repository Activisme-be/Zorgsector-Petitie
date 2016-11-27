<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class comment
 */ 
class Comment extends MY_Controller 
{
	/**
	 * Logged in user data session.
	 * 
	 * @var array
	 */
	public $Session = []; 

	public function __construct()
	{
		parent::__construct();

        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['utl']);
	}

    /**
     * Insert anew comment.
     */
	public function insert() 
	{

	}

	public function destory() 
	{

	}
}