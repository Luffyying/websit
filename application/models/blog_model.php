<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {


	public function get_all(){
		//$this->db-> order_by('date', 'desc');//排序规则
		$this->db-> limit(4);//限制查询的条数
		return $this->db->get('t_blogs')->result();
	}
	public function get_counts($title){
		$this->db->select('blog.*');
		$this->db->from('t_blogs blog');
		$this->db-> where('blog.is_delete', 0);
		if($title){
			$this -> db -> like('blog.title', $title);
		}
		return $this->db->count_all_results();
	}
	public function update($flag,$title, $clicked, $content, $img){
		$this->db->where('blog_id', $flag);
		$this->db->update('t_blogs', array(
			'title' => $title,
			'clicked' => $clicked,
			'content' => $content,
			'img' => $img
		));
		return $this -> db -> affected_rows();
	}
	public function save($title, $clicked, $content, $img){
		$this->db->insert('t_blogs', array(
			'title' => $title,
			'clicked' => $clicked,
			'content' => $content,
			'img' => $img
		));
		return $this -> db -> affected_rows();
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
	public function get_blogs_by_page($title, $limit=6, $offset=0){
		$this ->db -> select('blog.*');
		$this -> db -> from('t_blogs blog');
		$this -> db -> where('blog.is_delete', 0);
		if($title){
			$this->db->like('blog.title', $title);
		}
		$this -> db -> order_by('blog.blog_id', 'desc');
		$this -> db -> limit($limit, $offset);
		return $this -> db -> get()-> result();
	}
	public function get_more_all($count){
		$this->db->select('blog.*');
		$this->db->from('t_blogs blog');
		$this->db-> order_by('date', 'desc');
		$this->db-> limit(4,$count);
		return $this -> db -> get()-> result();
		//return $this->db->get_where('t_blogs', array('blog_id >'=>$count))-> result();
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
