<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

	public function save($data){
		$this->db->insert('t_contacts',$data);
		$row = $this->db->affected_rows();
		if($row){
			return true;
		}else{
			return fasle;
		}	
	}
    public function get_by_id($id){
    	$this->db->order_by('date', 'desc');//排序规则
		return $this->db->get_where('t_comments', array('blog_id'=> $id))->result();
    }
    public function addcomment($data){
    	$this->db->insert('t_comments',$data);
		$row = $this->db->affected_rows();
		if($row){
			return true;
		}
		return fasle;
    }
	

}