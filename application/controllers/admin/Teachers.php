<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
		error_reporting(0);
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
		$data['datas'] = $this->Common_model->get_data('users','user_type','teacher');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Teachers';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/teachers/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('users','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Teacher Delete Successfully.');
		}
		redirect(site_url('admin/teacher'));
	}
    public function edit()
    {
		//$data['user'] = $this->Common_model->get_data_by_id('user','userid',$id);

		if($this->input->post())
		{
            $data = array(
            	'school_id' => trim($this->input->post('school_id')),
            	'leader_id' => trim($this->input->post('leader_id')),
            	'class_id' => trim($this->input->post('class_id')),
            	'subject_id' => trim($this->input->post('subject_id')),
            	'name' => trim($this->input->post('name')),
            	'phone' => trim($this->input->post('phone')),
            	);

		    $update = $this->Common_model->update('users',$data,'id',$this->input->post('id'));
		    if($update)
		    {
		    	$this->session->set_flashdata('message', 'Teacher Update Successfully.');
		    	redirect(site_url('admin/teachers'));
		    }
		}
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Edit Teacher Details';
			$data['data'] = $this->Common_model->get_data_by_id('users','id',$id);
		    $data['city'] = $this->db->order_by('city')->group_by('city')->get_where('schools')->result_array();
			$data['level'] = $this->db->order_by('level')->group_by('level')->get_where('schools')->result_array();
			$data['gender'] = $this->db->order_by('id', 'ASC')->group_by('gender')->get_where('schools')->result_array();
			$data['school_det'] = $this->Common_model->get_data_by_id('schools','id',$data['data']['school_id']);
			//$data['usersg'] = $this->Admin_model->get_user($id);
			$query = $this->db->get_where('schools',array('city'=>$data['school_det']['city'],'level'=>$data['school_det']['level'],'gender'=>$data['school_det']['gender']));
        $data['schools'] = $query->result_array();
			$data['classes'] = $this->Common_model->get_data('classes');

			$data['subjects'] = $this->db->get_where('subjects',array('class_id'=>$data['data']['class_id']))->result_array();;
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/teachers/edit');	
	    }
	}
	public function add()
    {
		if($this->input->post())
		{
			
	            $check_phone = $this->Common_model->get_data_by_id('users','phone',$this->input->post('phone'));
				
				if(!empty($check_phone))
				{
					$this->session->set_flashdata('message', 'This Phone Number Teacher Already Exist!');
			    	redirect(site_url('admin/teachers/add'));		
				}
				else
				{
		            $data = array(
		            	'school_id' => trim($this->input->post('school_id')),
		            	'leader_id' => trim($this->input->post('leader_id')),
		            	'class_id' => trim($this->input->post('class_id')),
		            	'subject_id' => trim($this->input->post('subject_id')),
		            	'name' => trim($this->input->post('name')),
		            	'phone' => trim($this->input->post('phone')),
		            	'user_type' => 'teacher',
		            	'created'=>date('Y-m-d h:i:s')
		              	);

				    $update = $this->Common_model->insert_data($data,'users');
				    if($update)
				    {
				    	$this->session->set_flashdata('message', 'Teacher Add Successfully.');
				    	redirect(site_url('admin/teachers'));
				    }
			    }
		   }
		
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Add Teacher Details';
			$data['city'] = $this->db->order_by('city')->group_by('city')->get_where('schools')->result_array();
			$data['level'] = $this->db->order_by('level')->group_by('level')->get_where('schools')->result_array();
			$data['gender'] = $this->db->order_by('id', 'ASC')->group_by('gender')->get_where('schools')->result_array();
			$data['leaders'] = $this->Common_model->get_data('users','user_type','leader');
			$data['classes'] = $this->Common_model->get_data('classes');
			$data['subjects'] = $this->Common_model->get_data('subjects');
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/teachers/add');	
	    }

    }
	public function get_subject()
    {
    	
       $query = $this->db->get_where('subjects',array('class_id'=>$this->input->post('id')));
        $data['subjects'] = $query->result_array();
        //print_r($product);
        $this->load->view('admin/teachers/subject',$data); 
    }
}