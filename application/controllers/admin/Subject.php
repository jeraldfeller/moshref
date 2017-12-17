<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller 
{
	public function __construct()
    {
    	error_reporting(0);
		parent::__construct();
		$this->load->model('admin/Admin_model');
		$this->load->model('admin/Common_model');
		if(!$this->session->userdata('admin_details'))
		{
			redirect(base_url('admin'));
			exit;
		}
		
	}
    public function index()
    {
		$data['data'] = $this->Common_model->get_data('subjects');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage subjects';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/subjects/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('subjects','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Subject Delete Successfully.');
		}
		redirect(site_url('admin/subject'));
	}
    public function edit()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){
		
			$data = array(
			'name'=> $this->input->post('name'),
			'class_id'=> $this->input->post('class_id'),
			'created'=>date('d-m-y h:i:s')	
			
	        );			
		    
		$update = $this->Common_model->update('subjects',$data,'id',$this->input->post('id'));
		 
		 $this->session->set_flashdata('message', 'Subject Update Successfully.');
		 redirect(site_url().'admin/subject');
		}
		else
		{
		 $data['title']  = 'Edit Subject';
         $id = $this->uri->segment('4');
         $data['classes'] = $this->Common_model->get_data('classes');
		$data['data'] = $this->Common_model->get_data_by_id('subjects','id',$id);	
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/subjects/edit');
		}	
	}
	 public function add()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post())
		{
			$data = array(
			'class_id'=> $this->input->post('class_id'),
			'name'=> $this->input->post('name'),
			'created'=>date('d-m-y h:i:s')	
			);

		$this->Common_model->insert_data($data,'subjects');
		 
		 $this->session->set_flashdata('message', 'Subject Add Successfully.');
		 redirect(site_url().'admin/subject');
		}
		else
		{
		 $data['title']  = 'Add Subject';
		$data['classes'] = $this->Common_model->get_data('classes');
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/subjects/add');
		}
		
	}
}
	/*====================
    public function add_category()///when add categories with images
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){
		$img = $_FILES['image'];
	
		$image_name = time().'_'.$img['name'];
        if(empty($_FILES['image']['name']))
        {		
			$data = array(
			'category_id'=> $this->input->post('category_id'),
			'name'=> $this->input->post('name'),	
			);
		}
		else
		{
			$data = array(
			'category_id'=> $this->input->post('category_id'),
			'name'=> $this->input->post('name'),
			'image'=> $image_name
	        );			
		    $img_path = 'uploads/subcategories/'.$image_name;		
			$a = move_uploaded_file($img['tmp_name'],$img_path);		
		}
		$this->Common_model->insert_data($data,'subcategories');
		 
		 $this->session->set_flashdata('message', 'Subcategory Add Successfully.');
		 redirect(base_url().'admin/subcategories');
		}
		else
		{
		 $data['title']  = 'Add Work Subcategory';
		$data['categories'] = $this->Common_model->get_data('categories');
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/subcategories/add');
		}
		
	}
	
}
=================*/