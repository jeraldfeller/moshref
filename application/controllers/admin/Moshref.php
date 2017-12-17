<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Moshref extends CI_Controller 
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
		$data['datas'] = $this->Common_model->get_data('users','user_type','moshref');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Moshrefs';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/moshref/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('users','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Moshref Delete Successfully.');
		}
		redirect(site_url('admin/moshref'));
	}
    public function edit()
    {
		//$data['user'] = $this->Common_model->get_data_by_id('user','userid',$id);

		if($this->input->post())
		{
            $data = array(
           
            	'email' => trim($this->input->post('email')),
            	'phone' => $this->input->post('phone'),
            	'name' => trim($this->input->post('name')),         	
            );

		    $update = $this->Common_model->update('users',$data,'id',$this->input->post('id'));
		    if($update)
		    {
		    	$this->session->set_flashdata('message', 'Moshref Update Successfully.');
		    	redirect(site_url('admin/moshref'));
		    }
		}
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Edit Moshref Details';
			$data['data'] = $this->Common_model->get_data_by_id('users','id',$id);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/moshref/edit');	
	    }
	}
	public function add()
    {
		if($this->input->post())
		{
			$check_phone = $this->Common_model->get_data_by_id('users','phone',$this->input->post('phone'));
			$checkemail = $this->Common_model->get_data_by_id('users','email',$this->input->post('email'));
			if(!empty($check_phone))
			{
				$this->session->set_flashdata('message', 'This Phone Number Moshref Already Exist!');
		    	redirect(site_url('admin/moshref/add'));		
			}
			elseif(!empty($checkemail))
			{
				$this->session->set_flashdata('message', 'This Email Moshref Already Exist!');
		    	redirect(site_url('admin/moshref/add'));
			}
			else
			{
	            $data = array(
	            	'phone' => $this->input->post('phone'),
	            	'name' => trim($this->input->post('name')),
	            	'email' => trim($this->input->post('email')),
	            	'user_type'=> 'moshref',
	            	'created'=>date('Y-m-d h:i:s')
	              	);

			    $update = $this->Common_model->insert_data($data,'users');
			    if($update)
			    {
			    	$this->session->set_flashdata('message', 'Moshref Add Successfully.');
			    	redirect(site_url('admin/moshref'));
			    }
		   }
		}
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Add Moshref Details';
			$data['data'] = $this->Common_model->get_data_by_id('users','id',$id);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/moshref/add');	
	    }
	}
	

	
}
