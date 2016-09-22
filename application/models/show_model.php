<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show_model extends CI_Model {


	public function get_all(){
		$this->db-> order_by('date', 'desc');//排序规则
		$this->db-> limit(3,0);//限制查询的条数
		return $this->db->get('t_shows')->result();
	}
	public function get_by_category($cate_id){
		$this->db->order_by('date', 'desc');//排序规则
        $this -> db -> limit(3,0);//限制查询的条数
		return $this->db->get_where('t_shows', array('type'=> $cate_id))-> result();
	}
	public function  get_by_id($show_id){
		return $this->db->get_where('t_shows', array('show_id'=>$show_id))-> row();
	}
	public function get_more_all($offset){
		$this->db-> order_by('date', 'desc');
		$this->db-> limit(3,$offset);
		return $this->db->get('t_shows')->result();
		//return $this->db->get_where('t_shows', array('show_id >'=>$count))-> result();
	}
	public function get_more_by_category($cate_id,$offset){
		$this->db-> order_by('date', 'desc');
		$this->db-> limit(3,$offset);
		return $this->db->get_where('t_shows', array('type'=> $cate_id))-> result();
	}

}
