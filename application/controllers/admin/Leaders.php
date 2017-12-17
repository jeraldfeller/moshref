<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaders extends CI_Controller 
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
		$data['datas'] = $this->Common_model->get_data('users','user_type','leader');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Leaders';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/leaders/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('users','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Leader Delete Successfully.');
		}
		redirect(site_url('admin/leaders'));
	}
    public function edit()
    {
		//$data['user'] = $this->Common_model->get_data_by_id('user','userid',$id);

		if($this->input->post())
		{
            $data = array(
	            'school_id'=> $this->input->post('school_id'),
				'name'=> $this->input->post('name'),
				'phone'=> $this->input->post('phone'),
				'email'=> $this->input->post('email'),
            	);

		    $update = $this->Common_model->update('users',$data,'id',$this->input->post('id'));
		    if($update)
		    {
		    	$this->session->set_flashdata('message', 'Leader Update Successfully.');
		    	redirect(site_url('admin/leaders'));
		    }
		}
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Edit Leader Details';
			
			$data['data'] = $this->Common_model->get_data_by_id('users','id',$id);

			$data['city'] = $this->db->order_by('city')->group_by('city')->get_where('schools')->result_array();
			$data['level'] = $this->db->order_by('level')->group_by('level')->get_where('schools')->result_array();
			$data['gender'] = $this->db->order_by('id', 'ASC')->group_by('gender')->get_where('schools')->result_array();
			$data['school_det'] = $this->Common_model->get_data_by_id('schools','id',$data['data']['school_id']);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$query = $this->db->get_where('schools',array('city'=>$data['school_det']['city'],'level'=>$data['school_det']['level'],'gender'=>$data['school_det']['gender']));
        $data['schools'] = $query->result_array();
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/leaders/edit');	
	    }
	}
	public function add()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post())
		{
			$check_phone = $this->Common_model->get_data_by_id('users','phone',$this->input->post('phone'));
			$checkemail = $this->Common_model->get_data_by_id('users','email',$this->input->post('email'));
			if(!empty($check_phone))
			{
				$this->session->set_flashdata('message', 'This Phone Number Leader Already Exist!');
		    	redirect(site_url('admin/moshref/add'));		
			}
			elseif(!empty($checkemail))
			{
				$this->session->set_flashdata('message', 'This Email Leader Already Exist!');
		    	redirect(site_url('admin/moshref/add'));
			}
			else
			{
				$otp = substr(uniqid(rand(), True), 0, 4);
			$data = array(
			'school_id'=> $this->input->post('school_id'),
			'name'=> $this->input->post('name'),
			'phone'=> $this->input->post('phone'),
			'email'=> $this->input->post('email'),
			'otp' =>$otp,
			'user_type'=> 'leader',
			'created'=>date('d-m-y h:i:s')	
			);

		  $this->Common_model->insert_data($data,'users');
		 
		 $this->session->set_flashdata('message', 'Leader Add Successfully.');
		 redirect(site_url().'admin/leaders');
		}
		}
		else
		{
		$data['title']  = 'Add Leader';
		$data['city'] = $this->db->order_by('city')->group_by('city')->get_where('schools')->result_array();
		$data['level'] = $this->db->order_by('level')->group_by('level')->get_where('schools')->result_array();
		$data['gender'] = $this->db->order_by('id', 'ASC')->group_by('gender')->get_where('schools')->result_array();
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/leaders/add');
		}
		
	}
		public function get_schools()
    {
    	$query = $this->db->get_where('schools',array('city'=>$this->input->post('city'),'level'=>$this->input->post('level'),'gender'=>$this->input->post('gender')));
        $data['schools'] = $query->result_array();
        
        //print_r($product);
        $this->load->view('admin/leaders/schools',$data); 
    }//edit
}