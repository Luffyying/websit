<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {


	public function get_all(){
		//$this->db-> order_by('date', 'desc');//排序规则
		$this->db-> limit(4);//限制查询的条数
		return $this->db->get('t_blogs')->result();
	}
	public function delete($blog_id){
		$this->db->where('blog_id', $blog_id);
		$this->db->update('t_blogs', array(
			'is_delete' => '1'
		));
		//update t_blog_category set is_delete=1 where cate_id=4
		return $this->db -> affected_rows();
	}
	public function delete_selected($blog_ids_str){
		$blog_ids = explode(',', $blog_ids_str);
		$this->db->where_in('blog_id', $blog_ids);
		$this->db->update('t_blogs', array(
			'is_delete'=> '1'
		));
		//update t_blog_category set is_delete=1 where cate_id=4
		return $this -> db -> affected_rows();
	}
	public function get_all_blogs(){
		$this->db-> order_by('date', 'desc');//排序规则
		return $this->db->get_where('t_blogs',array('is_delete'=>0))->result();
	}
	public function get_more_all($count){
		//$this->db-> order_by('date', 'desc');
		$this->db-> limit(4);
		return $this->db->get_where('t_blogs', array('blog_id >'=>$count))-> result();
	}
	public function get_by_category($cate_id){
		$this->db->order_by('date', 'desc');//排序规则
        $this -> db -> limit(3);//限制查询的条数
		return $this->db->get_where('t_blogs', array('type'=> $cate_id))-> result();
	}
	public function  get_by_id($blog_id){
		return $this->db->get_where('t_blogs', array('blog_id'=>$blog_id))-> row();
	}
	
	public function get_more_by_category($cate_id){
		$this->db-> order_by('date', 'desc');
		$this->db-> limit(3);
		return $this->db->get_where('t_blogs', array('type'=> $cate_id))-> result();
	}
	public function get_blog_detial($id){
		$query = $this->db->get_where('t_blogs',array('blog_id'=>$id));
	 	return $query->row();
	}

}
