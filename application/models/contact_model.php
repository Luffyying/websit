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
    public function get_all(){
    	$this->db->order_by('date', 'desc');
    	$this->db-> limit(15);
    	return $this->db->get('t_contacts')->result();
    }
    public function delete($contact_id){
		$this->db->where('contact_id', $contact_id);
		$this->db->update('t_contacts', array(
			'is_delete' => '1'
		));
		//update t_contact_category set is_delete=1 where cate_id=4
		return $this->db -> affected_rows();
	}
	public function delete_selected($contact_ids_str){
		$contact_ids = explode(',', $contact_ids_str);
		$this->db->where_in('contact_id', $contact_ids);
		$this->db->update('t_contacts', array(
			'is_delete'=> '1'
		));
		//update t_contact_category set is_delete=1 where cate_id=4
		return $this -> db -> affected_rows();
	}
	

}