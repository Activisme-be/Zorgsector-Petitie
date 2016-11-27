<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Account
 */
class Account extends MY_Controller
{
    /**
     * The logged in session data array.
     */
    public $Session = [];

    /**
     * Account constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url']);
        $this->load->library(['blade', 'session', 'form_validation']);
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
     * Get the profile view for the logged in user.
     *
     * @return blade view.
     */
    public function index()
    {
        $userId = $this->Session['id'];
        $data['user'] = Logins::find($userId);

        $this->blade->render('auth/profile', $data);
    }

    public function updateSec()
    {

    }

    /**
     * Update the
     */
    public function updateInfo()
    {

    }
}