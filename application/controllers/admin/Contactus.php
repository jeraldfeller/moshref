<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
		$this->load->model('admin/Admin_model');
		$this->load->model('admin/Common_model');
		if(!$this->session->userdata('admin_details'))
		{
			redirect(site_url('admin'));
			exit;
		}
	}
    public function index()
    {
    	error_reporting(0);
		$data['datas'] = $this->Common_model->get_data('contactus');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Contact Us';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/contactus/manage');
	}
	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('contactus','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Contact us Delete Successfully.');
		}
		redirect(site_url('admin/contactus'));
	}
    public function view($id)
    {
		//$data['user'] = $this->Common_model->get_data_by_id('user','userid',$id);
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'View Contact Us Details';
		$data['data'] = $this->Common_model->get_data_by_id('contactus','id',$id);
		//$data['usersg'] = $this->Admin_model->get_user($id);
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/contactus/view');	
	}
	

	
}
