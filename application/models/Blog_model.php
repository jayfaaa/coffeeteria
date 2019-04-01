<?php

	class Blog_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}

		public function save($data){
			$this->db->insert('blogs_t',$data);
			return $this->db->affected_rows();

		}

		public function update($id,$data){
			 
  			 
			$result    =  $this->db->get('blogs_t');
			//$this->db->set($todo);
			$this->db->where('id',$id);		
			$this->db->update('blogs_t', $data);
			return $result;

		}

		public function delete($id){
			$this->db->where('id',$id);
			$result = $this->db->delete('comments_t');
			return $result;
		}

		public function deletep($id){
			$this->db->where('id',$id);
			$result = $this->db->delete('blogs_t');
			return $result;
		}

		public function save_comment($data){
			$this->db->insert('comments_t',$data);
			return $this->db->affected_rows();

		}

		public function getAll() {
			$result = $this->db->get('blogs_t');
			return $result->result_array();
		}

		public function getPost($id) {
			$this->db->select('id,title,body,image');
			$this->db->where('id',$id);
			$result =  $this->db->get('blogs_t');
			return $result->result_array();
		}

		public function getComment($blog_id) {
			$this->db->select('id,blog_id,email,comment,date');
			$this->db->where('blog_id',$blog_id);
			$result =  $this->db->get('comments_t');
			return $result->result_array();
		}
		
	}