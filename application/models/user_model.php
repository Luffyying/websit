<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function check($name,$password){
		return $this->db->get_where('t_users', array('name'=> $name,'password'=>$password))->result();
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
}