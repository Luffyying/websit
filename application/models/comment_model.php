<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {

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
    public function get_all_comments(){
    	$this->db->order_by('date','desc');
    	return $this->db->get_where('t_comments',array('is_delete'=>0))->result();
    }
    public function delete($comm_id){
    	$this->db->where('comment_id', $comm_id);
		$this->db->update('t_comments', array(
			'is_delete' => '1'
		));
		return $this->db -> affected_rows();
    }
    public function delete_selected($comm_ids_str){
    	$comm_ids = explode(',', $comm_ids_str);
		$this->db->where_in('comment_id', $comm_ids);
		$this->db->update('t_comments', array(
			'is_delete'=> '1'
		));
		return $this->db->affected_rows();
    }
	

}