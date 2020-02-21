<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{

	public function __construct()
    {
        parent::__construct();
                // Your own constructor code
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/admin/dashboard/Home
	 *	- or -
	 * 		http://example.com/index.php/admin/dashboard/Home/index
	 *  -or _
	 *   http://localhost/codeigniter/index.php/admin/dashboard/Home
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{     
	  /**$data['page_title'] = 'Admin Panel;
	  */
	  $this->load->view('includes/header'); //header loaded

    }

}
