<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		error_reporting('0');
		$this->load->view('admin/admin_pages/login');
	}
}
