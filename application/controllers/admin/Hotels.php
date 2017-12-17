<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotels extends CI_Controller 
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
		$data['hotels'] = $this->Common_model->get_data('hotels');
		$admin_details = $this->session->userdata('admin_details');
		$data['title']  = 'Manage Hotels';
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/hotels/manage');	
	}	
    public function delete($id)
    {
		$delete = $this->Common_model->delete('hotels','id',$id);
		if($delete)
		{
			 $this->session->set_flashdata('message', 'Hotel Delete Successfully.');
		}
		redirect(site_url('admin/hotels'));
	}
    public function edit()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){
		$ame = $this->input->post('ameneties');
		$img = $_FILES['image'];
	
		$image_name = time().'_'.$img['name'];
        if(empty($_FILES['image']['name']) and empty($ame))
        {		
			$data = array(
			'chalet_id'=> $this->input->post('chalet_id'),
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'city'=> $this->input->post('city'),
			'city1'=> trim($this->input->post('city1')),
			'no_of_nights'=> $this->input->post('no_of_nights'),
			'price'=> $this->input->post('price'),
			'chalet_type'=> $this->input->post('type'),
			'description'=> $this->input->post('description'),
			'chalet_type1'=> trim($this->input->post('type1')),
			'description1'=> trim($this->input->post('description1')),
			);
		}
		else if(!empty($_FILES['image']['name']) and empty($ame))
		{
			$data = array(
			'chalet_id'=> $this->input->post('chalet_id'),
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'city'=> $this->input->post('city'),
			'city1'=> trim($this->input->post('city1')),
			'no_of_nights'=> $this->input->post('no_of_nights'),
			'price'=> $this->input->post('price'),
			'chalet_type'=> $this->input->post('type'),
			'description'=> $this->input->post('description'),
			'chalet_type1'=> trim($this->input->post('type1')),
			'description1'=> trim($this->input->post('description1')),
			'image'=> $image_name
			);	
		    $img_path = 'uploads/hotels/'.$image_name;		
			$a = move_uploaded_file($img['tmp_name'],$img_path);		
		}
		else if(empty($_FILES['image']['name']) and !empty($ame))
		{
          $data = array(
			'chalet_id'=> $this->input->post('chalet_id'),
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'city'=> $this->input->post('city'),
			'city1'=> trim($this->input->post('city1')),
			'no_of_nights'=> $this->input->post('no_of_nights'),
			'price'=> $this->input->post('price'),
			'chalet_type'=> $this->input->post('type'),
			'description'=> $this->input->post('description'),
			'chalet_type1'=> trim($this->input->post('type1')),
			'description1'=> trim($this->input->post('description1')),
			);
        foreach($ame as $am)
		{
			$hotel_id = $this->input->post('id'); 
			$query =  $this->db->query ("SELECT * from  hotel_amenties where hotel_id = '$hotel_id' and amenety_id = '$am'");
			//echo $this->db->last_query();
             $check = $query->row_array();
			$hotel_amenties = array(
			'hotel_id'=> $this->input->post('id'),
			'amenety_id'=> $am,
			);
			if(empty($check['amenety_id']))
			{
			    $this->Common_model->insert_data($hotel_amenties,'hotel_amenties');
			}				
		}
		}
		else
		{
			$data = array(
			'chalet_id'=> $this->input->post('chalet_id'),
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'city'=> $this->input->post('city'),
			'city1'=> trim($this->input->post('city1')),
			'no_of_nights'=> $this->input->post('no_of_nights'),
			'price'=> $this->input->post('price'),
			'chalet_type'=> $this->input->post('type'),
			'description'=> $this->input->post('description'),
			'chalet_type1'=> trim($this->input->post('type1')),
			'description1'=> trim($this->input->post('description1')),
			'image'=> $image_name
			);	
		    $img_path = 'uploads/hotels/'.$image_name;		
			$a = move_uploaded_file($img['tmp_name'],$img_path);
	    foreach($ame as $am)
		{
			$hotel_id = $this->input->post('id'); 
			$query =  $this->db->query ("SELECT * from  hotel_amenties where hotel_id = '$hotel_id' and amenety_id = '$am'");
             $check = $query->row_array();
			$hotel_amenties = array(
			'hotel_id'=> $this->input->post('id'),
			'amenety_id'=> $am,
			);
			if(empty($check['amenety_id']))
			{
			    $this->Common_model->insert_data($hotel_amenties,'hotel_amenties');
			}			
		}
		}

		if(!empty($this->input->post('event_date')))
		{
			foreach($this->input->post('event_date') as $key => $event)
			{
				
					$event_price = array(
					'hotel_id'=> $this->input->post('id'),
					'event_date'=> $event,
					'event_price'=> $this->input->post('event_price')[$key],
					'created'=> date('y-m-d'),
					);

					$update = $this->Common_model->update('hotel_event_price',$event_price,'id',$this->input->post('event_id')[$key]);			
			}
	    }
		if(!empty($this->input->post('event_dates')))
		{
			foreach($this->input->post('event_dates') as $key => $events)
			{
				if(!empty($events))
				{
				$event_prices = array(
				'hotel_id'=> $this->input->post('id'),
				'event_date'=> $events,
				'event_price'=> $this->input->post('event_prices')[$key],
				'created'=> date('y-m-d'),
				);
				$this->Common_model->insert_data($event_prices,'hotel_event_price');
			}
				//$this->Common_model->insert_data($event_prices,'hotel_event_price');			
			}
	    }
		//print_r($data);die;
		$update = $this->Common_model->update('hotels',$data,'id',$this->input->post('id'));
		 
		 $this->session->set_flashdata('message', 'Hotel Update Successfully.');
		 redirect(site_url().'admin/hotels');
		}
		else
		{
		 $data['title']  = 'Edit Hotel';
         $id = $this->uri->segment('4');
         $data['amenety'] = $this->Common_model->get_data('amenties');
         $data['events'] = $this->Common_model->get_data(' hotel_event_price','hotel_id',$id);
         $data['citys'] = $this->Common_model->get_data('city');
        $data['datas'] = $this->Admin_model->get_chalets();
		$data['result'] = $this->Common_model->get_data_by_id('hotels','id',$id);	
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/hotels/edit');
		}	
	}
    public function add()
    {
		$admin_details = $this->session->userdata('admin_details');
		if($this->input->post()){

		$ame = $this->input->post('ameneties');
		 $event_date = $this->input->post('event_date');
	
		$image_name = time().'_'.$img['name'];
        if(empty($_FILES['image']['name']))
        {		
			$data = array(
			'chalet_id'=> $this->input->post('chalet_id'),
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'city'=> $this->input->post('city'),
			'city1'=> trim($this->input->post('city1')),
			'no_of_nights'=> $this->input->post('no_of_nights'),
			'price'=> $this->input->post('price'),
			'chalet_type'=> $this->input->post('type'),
			'description'=> $this->input->post('description'),
			'chalet_type1'=> trim($this->input->post('type1')),
			'description1'=> trim($this->input->post('description1')),
			'created'=> date('y-m-d'),
			);
		}
		else
		{
			$data = array(
			'chalet_id'=> $this->input->post('chalet_id'),
			'name'=> $this->input->post('name'),
			'name1'=> trim($this->input->post('name1')),
			'city'=> $this->input->post('city'),
			'city1'=> trim($this->input->post('city1')),
			'no_of_nights'=> $this->input->post('no_of_nights'),
			'price'=> $this->input->post('price'),
			'chalet_type'=> $this->input->post('type'),
			'description'=> $this->input->post('description'),
			'chalet_type1'=> trim($this->input->post('type1')),
			'description1'=> trim($this->input->post('description1')),
			'image'=> $image_name,
			'created'=> date('y-m-d'),
	        );			
		    $img_path = 'uploads/hotels/'.$image_name;		
			$a = move_uploaded_file($img['tmp_name'],$img_path);		
		}
		$this->Common_model->insert_data($data,'hotels');
		$insert_id = $this->db->insert_id();
		foreach($ame as $am)
		{
			$hotel_amenties = array(
			'hotel_id'=> $insert_id,
			'amenety_id'=> $am,
			);
			$this->Common_model->insert_data($hotel_amenties,'hotel_amenties');			
		}
		if(!empty($event_date))
		{
			foreach($event_date as $key => $event)
			{
				if(!empty($event))
				{
				$event_price = array(
				'hotel_id'=> $insert_id,
				'event_date'=> $event,
				'event_price'=> $this->input->post('event_price')[$key],
				'created'=> date('y-m-d'),
				);
				$this->Common_model->insert_data($event_price,'hotel_event_price');
				}			
			}
	    }
		 $this->session->set_flashdata('message', 'Hotel Add Successfully.');
		 redirect(site_url().'admin/hotels');
		}
		else
		{
		$data['title']  = 'Add Hotels';
		$data['citys'] = $this->Common_model->get_data('city');
		$data['amenety'] = $this->Common_model->get_data('amenties');
		$data['datas'] = $this->Admin_model->get_chalets();
		$data['admin'] = $this->Common_model->get_data_by_id('admin','id',$admin_details['admin_id']);	
		$this->load->view('admin/includes/header',$data);
		$this->load->view('admin/hotels/add');
		}
		
	}
	
}
