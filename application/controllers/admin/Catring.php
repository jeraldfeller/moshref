<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catring extends CI_Controller 
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
		$data['datas'] = $this->Common_model->get_data('catring');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Caterings';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/catring/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('catring','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Catring Delete Successfully.');
		}
		redirect(site_url('admin/catring'));
	}
	public function delete_images($id,$catid)
    {
		$delete = $this->Common_model->delete('catring_images','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('image_message', 'Catering Image Delete Successfully.');
		}
		redirect(site_url('admin/catring/edit/'.$catid));
	}
    public function edit()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){
			 $formattedAddr = str_replace(' ','+',$this->input->post('location'));
	        //Send request and receive json data by address
	        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
	        $output = json_decode($geocodeFromAddr);
	        //Get latitude and longitute from json data
	        $latitude  = $output->results[0]->geometry->location->lat;   
	        $longitude = $output->results[0]->geometry->location->lng;
		
			$data = array(
			'name'=> $this->input->post('name'),
			'location'=> $this->input->post('location'),
			'name1'=> $this->input->post('name1'),
			'location1'=> $this->input->post('location1'),
			'latitude'=> $latitude,
			'longitude'=> $longitude,
			'phone'=> $this->input->post('phone')
	        );			
		
		$update = $this->Common_model->update('catring',$data,'id',$this->input->post('id'));


			if(isset($_FILES['image']))
			{
			foreach ($_FILES['image']['name'] as $key => $imagename) {
				$image_name = time().'_'.$imagename;

			$img_path = 'uploads/catring/'.$image_name;		
			$a = move_uploaded_file($_FILES['image']['tmp_name'][$key],$img_path);
			$catring_data = array('catring_id' =>$this->input->post('id'),'image'=>$image_name);
			$this->Common_model->insert_data($catring_data,'catring_images');
			}	
			}
		 
		 $this->session->set_flashdata('message', 'Catring Update Successfully.');
		 redirect(site_url().'admin/catring/edit/'.$this->input->post('id'));
		}
		else
		{
		 $data['title']  = 'Edit Catering';
         $id = $this->uri->segment('4');
         $data['hotels'] = $this->Common_model->get_data('hotels');
		$data['data'] = $this->Common_model->get_data_by_id('catring','id',$id);
			
		$sql =  $this->db->query ("SELECT * from catring_images where catring_id = '$id' order by id desc");
		$data['catring'] =  $sql->result_array();

		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/catring/edit');
		}	
	}
    public function add()
    {
		$admin_details = $this->session->userdata('admin_details');
		 $formattedAddr = str_replace(' ','+',$this->input->post('location'));
	        //Send request and receive json data by address
	        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
	        $output = json_decode($geocodeFromAddr);
	        //Get latitude and longitute from json data
	        $latitude  = $output->results[0]->geometry->location->lat;   
	        $longitude = $output->results[0]->geometry->location->lng;
		if($this->input->post()){
		
			$data = array(
			'name'=> $this->input->post('name'),
			'location'=> $this->input->post('location'),
			'name1'=> $this->input->post('name1'),
			'location1'=> $this->input->post('location1'),
			'latitude'=> $latitude,
			'longitude'=> $longitude,
			'phone'=> $this->input->post('phone'),
			'created' => date('y-m-d h:i:s')
		
	        );			
		 
		$this->Common_model->insert_data($data,'catring');
        $insert_id = $this->db->insert_id();
		foreach ($_FILES['image']['name'] as $key => $imagename) 
		{
			$image_name = time().'_'.$imagename;
			$img_path = 'uploads/catring/'.$image_name;		
			$a = move_uploaded_file($_FILES['image']['tmp_name'][$key],$img_path);
			$catring_data = array('catring_id' => $insert_id,'image'=>$image_name);
			$this->Common_model->insert_data($catring_data,'catring_images');				
		}
		 
		 $this->session->set_flashdata('message', 'Catering Add Successfully.');
		 redirect(site_url().'admin/catring');
		}
		else
		{
		 $data['title']  = 'Add Catering';
		 $data['hotels'] = $this->Common_model->get_data('hotels');
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/catring/add');
		}
		
	}
	
}
