<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating_questions extends CI_Controller 
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
		$data['datas'] = $this->Common_model->get_data('rating_questions');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Rating Questions';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/rating_questions/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('users','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Rating Question Delete Successfully.');
		}
		redirect(site_url('admin/rating_questions'));
	}
    public function edit()
    {
		
		if($this->input->post())
		{
            $data = array(
            	'question' => trim($this->input->post('question')),         	
            );

		    $update = $this->Common_model->update('rating_questions',$data,'id',$this->input->post('id'));
		    if($update)
		    {
		    	$this->session->set_flashdata('message', 'Rating Question Update Successfully.');
		    	redirect(site_url('admin/rating_questions'));
		    }
		}
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Edit Rating Question';
			$data['data'] = $this->Common_model->get_data_by_id('rating_questions','id',$id);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/rating_questions/edit');	
	    }
	}
	public function add()
    {
		if($this->input->post())
		{
			
	            $data = array(
	            	'question' => trim($this->input->post('question')),
	            	'created'=>date('Y-m-d h:i:s')
	              	);

			    $update = $this->Common_model->insert_data($data,'rating_questions');
			    if($update)
			    {
			    	$this->session->set_flashdata('message', 'Rating Question Add Successfully.');
			    	redirect(site_url('admin/rating_questions'));
			    }
		   }
		
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Add Rating Question';
			$data['data'] = $this->Common_model->get_data_by_id('rating_questions','id',$id);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/rating_questions/add');	
	    }

    }
}
