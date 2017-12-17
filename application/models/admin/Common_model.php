<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class COMMON_MODEL extends CI_Model {
    public function insert_data($data,$tbl_name){
		$sql = $this->db->insert($tbl_name,$data);
		return ( $this->db->insert_id() );
	}	  
   public function get_data($tbl,$field,$value,$limit=0,$limit_start=0){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		if(!empty($limit)){
			$this->db->limit($limit, $limit_start);
		}
		
		$this->db->order_by('id','DESC');
		return $this->db->get($tbl)->result_array();
	}
	
	 	
	public function update($tbl,$data,$field,$value){
		$this->db->where($field,$value);
		return $this->db->update($tbl,$data);
	}	
	public function get_rows($tbl,$field=0,$value=0)	{
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		return $this->db->get($tbl)->num_rows();
	}	
	public function get_data_by_id($tbl,$field=0,$value=0){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		return $this->db->get($tbl)->row_array();
	}	
	
	public function delete($tbl,$field=0,$value=0){
		$this->db->where($field,$value);
		return $this->db->delete($tbl);
	}
	public function count_data_with_id($tbl,$field=0,$value=0){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		return $this->db->count_all_results($tbl);
	}
  public function change_status($table, $column, $value, $uniqueNameCol, $uniqueColValue)
	{
		$query = $this->db->query("UPDATE ".$table." SET `".$column."` = '".$value."' WHERE `".$uniqueNameCol."` = '".$uniqueColValue."' ");	
		//echo $this->db->last_query();
	}
		
	public function num_data($id,$tbl) 
	{	
		$this->db->select('*');
		$this->db->order_by($id);
		$result = $this->db->get($tbl);
		return $result->num_rows();
	}
	
	public function get_b_commnt($limit , $start,$b_id ){
		$this->db->select('tbl_blog_comments.*');
		$this->db->join('tbl_blog','tbl_blog.b_id = tbl_blog_comments.b_id','left');
		$this->db->limit($limit, $start);
		$this->db->where("tbl_blog.b_id",$b_id);
		$qry = $this->db->get('tbl_blog_comments');
		// echo $this->db->last_query();
		return $qry->result_array();
	}
	
	public function num_comnt_data($b_id) 
	{	
		$this->db->select('tbl_blog_comments.*');
		$this->db->join('tbl_blog','tbl_blog.b_id = tbl_blog_comments.b_id','left');
		$this->db->where("tbl_blog.b_id",$b_id);
		$qry = $this->db->get('tbl_blog_comments');
		return $qry->num_rows();
	}
	
	public function get_faqs() {	
		$this->db->select('*');
		$this->db->order_by('id','DESC');			
		$result = $this->db->get('tbl_faqs');
		return $result->result();
	}
	public function save_faq($faq_data){
		$sql =$this->db->insert('tbl_faqs' ,$faq_data);
		return true;
	}
	public function edit_faq($faq_id){
		$this->db->select('*');
		$this->db->where('id',$faq_id);
		$result = $this->db->get('tbl_faqs');
		return $result->row();
	}		
	public function update_faq($faq_id ,$news_data){
		$this->db->where("id", $faq_id);
		$sql =$this->db->update('tbl_faqs' ,$news_data);
		return true;
	}
	public function delete_faq($faq_id){
		$query = $this->db->where('id', $faq_id);  
		$query = $this->db->delete('tbl_faqs');
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	
	public function get_images($_id)
	{
		$this->db->select('*');
		$this->db->where("gallery_id",$_id);		
		$result = $this->db->get('tbl_images');
		// echo $this->db->last_query();
		return $result->result();
	}
	 public function get_datas_search($tbl,$field,$value,$limit=0,$limit_start=0,$searh_query){
		if(!empty($field)){
			$this->db->where($field,$value);
		}
		if(!empty($searh_query))
		{
			$this->db->like('user_group', $searh_query); 
		}
		if(!empty($limit)){
			$this->db->limit($limit, $limit_start);
		}
		return $this->db->get($tbl)->result_array();
	}
		 public function get_datas_searches($tbl,$limit=0,$limit_start=0,$searh_query){
	
		if(!empty($searh_query))
		{
			$this->db->like('user_group', $searh_query); 
		}
		if(!empty($limit)){
			$this->db->limit($limit, $limit_start);
		}
		return $this->db->get($tbl)->result_array();
	}
}
