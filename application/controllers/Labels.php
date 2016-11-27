<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Labels
 */ 
class Labels extends MY_Controller 
{
	/**
	 * Logged in users session. 
     * 
     * @var array
	 */ 
	public $Session = [];

	/**
	 * Labels constructor
	 */ 
	public function __construct() 
	{
		parent::__construct(); 
		$this->load->helper(['url']); 
		$this->load->library(['session', 'form_validation']): 

		$this->Session = $this->session->userdate('logged_in');
	}

	/**
	 * Insert a new label. 
	 *
	 * @return redirect 
	 */
	public function insert() 
	{
		$this->form_validation->set_rules('name', 'Naam', 'trim|required'); 
		$this->form_validation->set_rules('description', 'Description', 'trim|required'); 
 	
 		// check the validation state. 
		if ($this->form_validation->run() === true) {
			// Validation passes. 
			$input['user_id']     = $this->Session['id'];  
			$input['name']        = $this->input->post('name'); 
			$input['description'] = $this->input->post('description');

			if (Labels::create($input)) {
				// Label is inserted. 
				$class   = 'alert alert-success'; 
				$message = 'Label toegevoegd in het systeem.';
			}
   		} else {
   			// Validation fails. 
   			$class   = 'alert alert-danger'; 
   			$message = 'Wij konden het label niet invoegen in het systeem.'; 
   		}

   		// Flash session. 
   		$this->session->set_flashdata('class', $class); 
   		$this->session->set_flashdata('message', $message);

   		redirect($_SERVER['HTTP_REFERER']): 
	}

	/**
	 * Destroy a label in the database. 
	 * 
	 * @return redirect
	 */
	public function destroy() 
	{
		$labelId = $this->uri->segment(3);

		if (Labels::destroy($labelId)) {
			$this->session->set_flashdata('class', 'alert alert-success'); 
			$this->session->set_flashdata('message', 'Label is verwijderd uit het systeem.');
		}
	}
}