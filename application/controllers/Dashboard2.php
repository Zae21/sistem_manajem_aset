<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
	}

	public function index()
	{
		
		$this->load->view('dashboard2');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */