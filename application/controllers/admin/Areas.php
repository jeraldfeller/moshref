<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends CI_Controller 
{
	public function __construct()
    {
    	error_reporting(0);
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
		$data['datas'] = $this->Common_model->get_data('areas');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Areas';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/areas/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('areas','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Area Delete Successfully.');
		}
		redirect(site_url('admin/areas'));
	}
    public function edit()
    {
		
		if($this->input->post())
		{
            $data = array(
            	'name' => trim($this->input->post('name')),         	
            );

		    $update = $this->Common_model->update('areas',$data,'id',$this->input->post('id'));
		    if($update)
		    {
		    	$this->session->set_flashdata('message', 'Area Update Successfully.');
		    	redirect(site_url('admin/areas'));
		    }
		}
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Edit Area Details';
			$data['data'] = $this->Common_model->get_data_by_id('areas','id',$id);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/areas/edit');	
	    }
	}
	public function add()
    {
		if($this->input->post())
		{
			
	            $data = array(
	            	'name' => trim($this->input->post('name')),
	            	'created'=>date('Y-m-d h:i:s')
	              	);

			    $update = $this->Common_model->insert_data($data,'areas');
			    if($update)
			    {
			    	$this->session->set_flashdata('message', 'Area Add Successfully.');
			    	redirect(site_url('admin/areas'));
			    }
		   }
		
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Add Area Details';
			$data['data'] = $this->Common_model->get_data_by_id('areas','id',$id);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/areas/add');	
	    }

    }
}
