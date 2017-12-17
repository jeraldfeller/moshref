<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function login($phone) 
	{
	    
		$sql =  $this->db->query ("SELECT * from users where phone = '$phone'");	   
		return $sql->row_array();
	}
	public function get_cities() 
	{
	    
		$sql =  $this->db->query ("SELECT id,city from schools group by city");	   
		return $sql->result_array();
	}
	public function get_genders() 
	{
	    
		$sql =  $this->db->query ("SELECT id,gender from schools group by gender");	   
		return $sql->result_array();
	}
	public function get_levels() 
	{
	    
		$sql =  $this->db->query ("SELECT id,level from schools group by level");	   
		return $sql->result_array();
	}
  
	public function match_verifaction_token($id,$token) 
	{	
		$sql =  $this->db->query ("SELECT * from users where id = '$id' and otp = '$token'");
		return $sql->row_array();
	}
    public function post_list($start_from,$limit) 
	{	
		$sql =  $this->db->query ("SELECT p.*,u.name as user_name,u.image as user_image from posts as p left join users as u on u.id=p.user_id  group by p.id order by p.id desc limit $start_from,$limit");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	public function post_comments($post_id)
	{
		$sql =  $this->db->query ("SELECT c.*,u.name as comment_user_name,u.image as comment_user_image from post_comments as c left join users as u on u.id=c.user_id where c.post_id = $post_id group by c.id");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	public function comment_replies($comment_id)
	{
		$sql =  $this->db->query ("SELECT c.*,u.name as reply_user_name,u.image as reply_user_image from comment_replies as c left join users as u on u.id=c.user_id where c.comment_id = $comment_id group by c.id");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	public function user_timeline($id,$start_from,$limit) 
	{	
		$sql =  $this->db->query ("SELECT p.*,u.name as user_name,u.image as user_image from posts as p left join users as u on u.id=p.user_id where p.user_id = $id  group by p.id order by p.id desc limit $start_from,$limit");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	public function group_list($user_id) 
	{	
		$sql =  $this->db->query ("select g.id as group_id,l.name as leader_name,s.name as school_name from groups as g left join users as l on l.id = g.leader_id left join schools as s on s.id = g.school_id where g.user_id = $user_id group by g.id");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	public function member_list($group_id) 
	{	
		$sql =  $this->db->query ("select m.id as member_id, u.name as member_name,u.id,u.image,u.reg_id from group_members as m left join users as u on u.id = m.member_id where m.group_id = $group_id group by m.id");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	public function check_inbox($group_id)
	{
		$sql =  $this->db->query ("SELECT * from inbox where group_id = $group_id");
		//echo $this->db->last_query();die;
		return $sql->row_array();
	}
	public function inbox_list($user_id)
	{
		$sql =  $this->db->query ("SELECT i.*,u.name,s.name as school_name,g.group_name,s.image as school_image from inbox as i left join users as u on u.id=i.user_id left join groups as g on g.id=i.group_id left join group_members as m on m.group_id = g.id left join schools as s on s.id = g.school_id where (g.leader_id = $user_id) or (m.member_id = $user_id) or (g.user_id = $user_id) group by i.id order by i.id desc");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	public function conversation_list($group_id)
	{
		$sql =  $this->db->query ("SELECT c.*,u.name,s.name as school_name,g.group_name from conversation as c left join users as u on u.id=c.user_id left join groups as g on g.id=c.group_id left join group_members as m on m.group_id = g.id left join schools as s on s.id = g.school_id where m.group_id = $group_id group by c.id");
		//echo $this->db->last_query();die;
		return $sql->result_array();
	}
	
	
}
