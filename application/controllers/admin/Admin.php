<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
		$this->load->model('admin/Admin_model');
		$this->load->model('admin/Common_model');
		
	}
    public function dashboard()
    {
    	error_reporting(0);
		if(!$this->session->userdata('admin_details'))
		{
			redirect(site_url('admin'));
			exit;
		}
		$admin_details = $this->session->userdata('admin_details');
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$data['moshref_count'] = $this->db->get_where('users', array('user_type =' => 'moshref'))->num_rows();
		$data['leader_count'] = $this->db->get_where('users', array('user_type =' => 'leader'))->num_rows();
		$data['teacher_count'] = $this->db->get_where('users', array('user_type =' => 'teacher'))->num_rows();
		$data['contactus_count'] = $this->db->get_where('contactus')->num_rows();
		//$data['chaletss'] = $this->Admin_model->chalets();
		//$data['hotels'] = $this->Common_model->get_data('hotels');
		//$data['chalets'] = $this->Common_model->get_data('user','user_type','chalet');
		//$data['users'] = $this->Common_model->get_data('user','user_type','user');
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/admin_pages/dashboard');	
	}		
	public function login()
	{
		$result = $this->Admin_model->login();
		if(!empty($result))
		{
		$sess_array = array(
							 'admin_id' => $result['id'],
							 'username' => $result['username'],
							 'email' => $result['email'],   
                        );
       $this->session->set_userdata('admin_details', $sess_array);
	   redirect(site_url().'admin/admin/dashboard');
		}
		else
		{
			$this->session->set_flashdata('error', ' Invalid Login Details, Please Try Again!');
			redirect(site_url().'admin');
		}
	}
	public function edit_profile()
	{
		if(!$this->session->userdata('admin_details'))
		{
			redirect(site_url('admin'));
			exit;
		}
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){
		$img = $_FILES['image'];
	
		$image_name = time().'_'.$img['name'];
        if(empty($_FILES['image']['name'])){		
		$data = array(
		'username'=> $this->input->post('name'),
		'email'=> $this->input->post('email'),
		'phone'=> $this->input->post('phone'),	
		);
		}
		else{
		$data = array(
		'username'=> $this->input->post('name'),
		'email'=> $this->input->post('email'),
		'phone'=> $this->input->post('phone'),
		'image'=> $image_name
        );		
		
		$image_dir =glob("uploads/admin/");
		            foreach ($image_dir as $file) 
		            {
			            if ( is_dir($file) )
			            {
				            $dir_content = glob($file."/*");
				            foreach($dir_content as $dir_file) 
				            {
					            chmod($dir_file, DIR_WRITE_MODE);
					            @unlink($dir_file);
				            }
			            }
			            else {
				            chmod($file, DIR_WRITE_MODE);
				            @unlink($file);
			            }
			            @rmdir($file);
		            }
	    @rmdir("uploads/admin/");
		$target = mkdir('uploads/admin');	
	    $img_path = 'uploads/admin/'.$image_name;
		
		$a = move_uploaded_file($img['tmp_name'],$img_path);
		
		}
		$update = $this->Common_model->update('admin',$data,'id',$admin_details['admin_id']);
		 
		 $this->session->set_flashdata('message', 'Admin Profile Update Successfully.');
		 redirect(site_url().'admin/admin/edit_profile');
		}
		else{
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/admin_pages/edit_profile');
		}
	}
	public function change_password()
	{
		if(!$this->session->userdata('admin_details'))
		{
			redirect(site_url('admin'));
			exit;
		}
		$admin_details = $this->session->userdata('admin_details');
		$admin_name = $admin_details['username'];
		$user_id = $admin_details['admin_id'];
		if($this->input->post()){
		
		$old_password=$this->input->post('old_password');
		$new_password=$this->input->post('new_password');

		$admin_info=$this->Admin_model->chngpass($admin_name,$old_password,$user_id);
		if(empty($admin_info)){
			$this->session->set_flashdata("error", "Old Password Does't Match"); 
			redirect( site_url() . "admin/admin/change_password" );
		}else{	 
			$result=$this->Admin_model->chng_pass($admin_name,$new_password);
		
		 	if ($result) {
				$this->session->set_flashdata("message", "Password Change Successfully"); 
			}else {
				$this->session->set_flashdata("error", "Password Can't Change "); 
			}		
			redirect( site_url() . "admin/admin/change_password" );
		}
		}
		else{
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/admin_pages/change_password');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect( site_url() . "admin"); 
	}
}
