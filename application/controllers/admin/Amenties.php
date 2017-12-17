<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amenties extends CI_Controller 
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
		$data['datas'] = $this->Common_model->get_data('amenties');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Amenties';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/amenties/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('amenties','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Amenty Delete Successfully.');
		}
		redirect(site_url('admin/amenties'));
	}
    public function edit()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){
		$img = $_FILES['image'];
	
		$image_name = time().'_'.$img['name'];
        if(empty($_FILES['image']['name']))
        {		
			$data = array(
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),	
			);
		}
		else
		{
			$data = array(
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'image'=> $image_name
	        );			
		    $img_path = 'uploads/amenties/'.$image_name;		
			$a = move_uploaded_file($img['tmp_name'],$img_path);		
		}
		$update = $this->Common_model->update('amenties',$data,'id',$this->input->post('id'));
		 
		 $this->session->set_flashdata('message', 'Amenty Update Successfully.');
		 redirect(site_url().'admin/amenties');
		}
		else
		{
		 $data['title']  = 'Edit Amenty';
         $id = $this->uri->segment('4');
		$data['data'] = $this->Common_model->get_data_by_id('amenties','id',$id);	
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/amenties/edit');
		}	
	}
    public function add()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){
		$img = $_FILES['image'];
	
		$image_name = time().'_'.$img['name'];
        if(empty($_FILES['image']['name']))
        {		
			$data = array(
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			);
		}
		else
		{
			$data = array(
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'image'=> $image_name
	        );			
		    $img_path = 'uploads/amenties/'.$image_name;		
			$a = move_uploaded_file($img['tmp_name'],$img_path);		
		}
		$this->Common_model->insert_data($data,'amenties');
		 
		 $this->session->set_flashdata('message', 'Amenty Add Successfully.');
		 redirect(site_url().'admin/amenties');
		}
		else
		{
		 $data['title']  = 'Add Amenty';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/amenties/add');
		}
		
	}
	
}
