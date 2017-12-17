<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schools extends CI_Controller 
{
	public function __construct()
    {
    	//error_reporting(0);
		parent::__construct();
		$this->load->model('admin/Admin_model');
		$this->load->model('admin/Common_model');
		$this->load->library('pagination');
		if(!$this->session->userdata('admin_details'))
		{
			redirect(site_url('admin'));
			exit;
		}
	}
    public function index()
    {
    	
       	$extraparams = "&" . $_SERVER["QUERY_STRING"];
		$extraparams = explode("&", $extraparams);
		foreach( $extraparams as $key => $pp ) {
			$temp = explode("=", $pp);
			if ($temp[0] == "page") {
			  unset($extraparams[$key]);
			}
		}
		$extraparams = implode($extraparams, "&");
		$limit_start = $this->uri->segment(2);
		$page = isset( $_GET["page"] ) ? $_GET["page"] : 1;
		if (empty($limit_start)) {
		$limit_start = 0;
		}
		
		if(isset($_GET['group']) && $_GET['group']!="")
		{
			$searh_query = $_GET['group'];
			
		}else{
			$searh_query = "";
		}
		//$app_name = $this->uri->segment(4);
		$data['datas'] =$this->Admin_model->fetch_data('10',($page - 1)*'10');
	
		$tot_count= $this->db->get_where('schools')->num_rows();
		$data["total_rows"] = $tot_count;
		$data["url"] = base_url() ."admin/schools/";
		$data["limit"] ='10';
		$data["page"] = $page;
		$data["extraparams"] = $extraparams;




		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Schools';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/schools/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('schools','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'School Delete Successfully.');
		}
		redirect(site_url('admin/schools'));
	}
    public function edit()
    {
		
		if($this->input->post())
		{
            $data = array(
            	'name' => trim($this->input->post('name')), 
            	'city' => trim($this->input->post('city')),
        	    'level' => trim($this->input->post('level')),
        	    'gender' => trim($this->input->post('gender')),        	
            );
            if(!empty($_FILES["image"]["name"]))
    		{
		    	$name= time().'_'.$_FILES["image"]["name"];
		        $tmp_name=$_FILES["image"]["tmp_name"];
		        $error=$_FILES["image"]["error"];

	        	$path='uploads/schools/'.$name;
		        move_uploaded_file($tmp_name,$path);
		        $data['image'] = $name;
	    	}

		    $update = $this->Common_model->update('schools',$data,'id',$this->input->post('id'));
		    if($update)
		    {
		    	$this->session->set_flashdata('message', 'School Update Successfully.');
		    	redirect(site_url('admin/schools'));
		    }
		}
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Edit School Details';
			$data['data'] = $this->Common_model->get_data_by_id('schools','id',$id);
		
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/schools/edit');	
	    }
	}
	public function add()
    {
		if($this->input->post())
		{
			
	            $data = array(
	            	'name' => trim($this->input->post('name')),
	            	'city' => trim($this->input->post('city')),
            	    'level' => trim($this->input->post('level')),
            	    'gender' => trim($this->input->post('gender')),
	            	'created'=>date('Y-m-d h:i:s')
	              	);
	            if(isset($_FILES["image"]))
	    		{
			    	$name= time().'_'.$_FILES["image"]["name"];
			        $tmp_name=$_FILES["image"]["tmp_name"];
			        $error=$_FILES["image"]["error"];

		        	$path='uploads/schools/'.$name;
			        move_uploaded_file($tmp_name,$path);
			        $data['image'] = $name;
		    	}

			    $update = $this->Common_model->insert_data($data,'schools');
			    if($update)
			    {
			    	$this->session->set_flashdata('message', 'School Add Successfully.');
			    	redirect(site_url('admin/schools'));
			    }
		   }
		
		else
		{
			$id = $this->uri->segment('4');
			$admin_details = $this->session->userdata('admin_details');
			$data['title']  = 'Add School Details';
			$data['data'] = $this->Common_model->get_data_by_id('schools','id',$id);
			
			$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
			$this->load->view('admin/includes/header',$data);
			$this->load->view('admin/schools/add');	
	    }

    }
}
