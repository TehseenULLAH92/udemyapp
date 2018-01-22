<?php

class Admin_model extends CI_Model {

  function __construct(){
	   parent::__construct();
      $this->load->database();
    }
// generic function for all
	function all($table){
		$this->db
		->select("*")
		->from($table);
		$rows	=	$this->db->get();
		if($rows->num_rows() > 0){
      return $rows->result();
		}
		else{
			return array();
		}
	}
// generic function for all
	function update($tableName,$feildId,$value,$listingData){
		$this->db
		->where($feildId, $value)
		->update($tableName, $listingData);
		return $this->db->affected_rows();
	}
  // generic function for all
	function delete($tableName,$feildId,$value){
		$this->db
		->where($feildId, $value)
		->delete($tableName);
	}
  // generic function for all
	function get_category_by_name($type,$type_id=''){
		return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row();
	}



function upload_course_image($img){

		$config['upload_path'] = './uploads/courses/images/';

		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '7680';
		$config['encrypt_name'] = true;

	$this->load->library('upload', $config);

	if ( ! $this->upload->do_upload($img)){
	return false;
	}
	else{
	$data = array('upload_data' => $this->upload->data());
		return $data;
	}
}

}
