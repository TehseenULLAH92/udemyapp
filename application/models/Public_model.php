<?php

class Public_model extends CI_Model {

  function __construct(){
	   parent::__construct();
      $this->load->database();
    }

	function all($table){
		$this->db
		->select("*")
    ->limit(4)
    ->order_by('short_title', 'DESC')
		->from($table);
		$rows	=	$this->db->get();
		if($rows->num_rows() > 0){
      return $rows->result();
		}
		else{
			return array();
		}
	}
  function best_seller($table){
		$this->db
		->select("*")
    ->limit(4)
    ->order_by('short_title', 'ASC')
		->from($table);
		$rows	=	$this->db->get();
		if($rows->num_rows() > 0){
      return $rows->result();
		}
		else{
			return array();
		}
	}
  public function single_course_details($id){
    $this->db
    ->select("*")
    ->from("course")
    ->where("slug",$id);
		$rows	=	$this->db->get();
		if($rows->num_rows() > 0){
			return $rows->row();
		}
		else{
			return array();
		}
  }
}
