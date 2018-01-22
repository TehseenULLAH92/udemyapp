<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
				$this->load->model('Admin_model');
    }
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}
	function courses($param1 = NULL, $param2 = NULL  ){
		$data	=	'';
		switch($param1){
			case 'add':
				if(isset($_POST['submit'])){

					$this->load->library('form_validation');
					$this->form_validation->set_rules('short_title', 'Short Title', 'required');
					$this->form_validation->set_rules('long_title', 'long_title', 'required');
					$this->form_validation->set_rules('short_description', 'Short Description', 'required');
					$this->form_validation->set_rules('long_description', 'Long Description', 'required');
					$this->form_validation->set_rules('course_price', 'Course Price', 'required');
					$this->form_validation->set_rules('course_descount_price', 'Course Descount Price', 'required');
					if ($this->form_validation->run() == FALSE) {
						redirect('admin/courses/add');
					} else {
						$updateimage =$this->Admin_model->upload_course_image('feature_image');
						$data = array(
							'categories_id' 		=> $this->input->post('categories_id'),
							'sub_categories_id' => $this->input->post('sub_categories_id'),
							'short_title' 			=> $this->input->post('short_title'),
							'slug' 							=> url_title($this->input->post('short_title','underscore',TRUE)),
							'long_title' 				=> $this->input->post('long_title'),
							'short_description' => $this->input->post('short_description'),
							'long_description' 	=> $this->input->post('long_description'),
							'created_date' 			=> date("Y-m-d"),
							'feature_image'			=> $updateimage['upload_data']['file_name'],
							'feature_video' 		=> $this->input->post('feature_video'),
							'course_price' 			=> $this->input->post('course_price'),
							'course_descount_price' => $this->input->post('course_descount_price'),
						);
				}
				$this->db->insert('course',$data);
					redirect('admin/courses/');
				}
			$categories	=	$this->Admin_model->all("categories");
			$sub_categories =	$this->Admin_model->all("sub_categories");
			$view = 'add';
			break;

			case 'edit':
			$row	=	$this->db->get_where('course',array('course_id'=>$param2))->row();

			$data = array(
			'categories_id'			=>	$row->categories_id,
			'sub_categories_id'	=>	$row->sub_categories_id,
			'short_title'				=>	$row->short_title,
 			'long_title'				=>	$row->long_title,
 			'short_description'	=>	$row->short_description,
 			'long_description'	=>	$row->long_description,
 			'feature_image'			=>	$row->feature_image,
 			'feature_video'			=>	$row->feature_video,
 			'course_price'			=>	$row->course_price,
 			'course_descount_price'	=>	$row->course_descount_price,
			);
				if($this->input->post('submit')){
					$updateimage =$this->Admin_model->upload_course_image('feature_image');
					$update = array(
						'categories_id' 		=> $this->input->post('categories_id'),
						'sub_categories_id' => $this->input->post('sub_categories_id'),
						'short_title' 			=> $this->input->post('short_title'),
						'slug' 							=> url_title($this->input->post('short_title','underscore',TRUE)),
						'long_title' 				=> $this->input->post('long_title'),
						'short_description' => $this->input->post('short_description'),
						'long_description' 	=> $this->input->post('long_description'),
						'created_date' 			=> date("Y-m-d"),
						'feature_image'			=> $updateimage['upload_data']['file_name'],
						'feature_video' 		=> $this->input->post('feature_video'),
						'course_price' 			=> $this->input->post('course_price'),
						'course_descount_price' => $this->input->post('course_descount_price'),
					);
				$this->Admin_model->update('course','course_id', $param2, $update);
						redirect('admin/courses/');
				}
				$categories	=	$this->Admin_model->all("categories");
				$sub_categories =	$this->Admin_model->all("sub_categories");
			$view = "edit";
			break;

			case 'delete':
				$this->Admin_model->delete('course','course_id', $param2);
						redirect('admin/courses/list');
			$view = "list";
			break;

			case 'list':
				$data	=	$this->Admin_model->all("course");
			$view = "list";
			break;

			default:
				$data	=	$this->Admin_model->all("course");
			$view = "list";
			break;

		}
      $this->load->view('admin/header',array('rows'=>$data,'cat'=>$categories,'sub'=>$sub_categories));
      $this->load->view('admin/courses/'.$view);
      $this->load->view('admin/footer');
	}
	function categories($param1 = NULL, $param2 = NULL  ){
		$data	=	'';
		switch($param1){
			case 'add':
				if(isset($_POST['submit'])){

					$this->load->library('form_validation');
					$this->form_validation->set_rules('categories_name', 'Category', 'required');
					$this->form_validation->set_rules('description', 'Description', 'required');
					if ($this->form_validation->run() == FALSE) {
						redirect('admin/categories/add');
					} else {
						$data = array(
							'categories_name' 			=> $this->input->post('categories_name'),
							'description' => $this->input->post('description'),
						);
				}
				$this->db->insert('categories',$data);
					redirect('admin/categories/');
				}
			$view = 'add';
			break;

			case 'edit':
			$row	=	$this->db->get_where('categories',array('categories_id'=>$param2))->row();

			$data = array(
			'categories_name'				=>	$row->categories_name,
 			'description'	=>	$row->description,
			);
				if($this->input->post('submit')){
					$update = array(
						'categories_name' 			=> $this->input->post('categories_name'),
						'description' 	=> $this->input->post('description'),
					);
				$this->Admin_model->update('categories','categories_id', $param2, $update);
						redirect('admin/categories/');
				}
			$view = "edit";
			break;

			case 'delete':
				$this->Admin_model->delete('categories','categories_id', $param2);
						redirect('admin/categories/list');
			$view = "list";
			break;

			case 'list':
				$data	=	$this->Admin_model->all("categories");
			$view = "list";
			break;

			default:
				$data	=	$this->Admin_model->all("categories");
			$view = "list";
			break;

		}
      $this->load->view('admin/header',array('rows'=>$data));
      $this->load->view('admin/categories/'.$view);
      $this->load->view('admin/footer');
	}
	function sub_categories($param1 = NULL, $param2 = NULL  ){
		$data	=	'';
		switch($param1){
			case 'add':
				if(isset($_POST['submit'])){

					$this->load->library('form_validation');
					$this->form_validation->set_rules('categories_id', 'Select Category', 'required');
					$this->form_validation->set_rules('sub_cat_name', 'Sub Category', 'required');
					$this->form_validation->set_rules('description', 'Description', 'required');
					if ($this->form_validation->run() == FALSE) {
						redirect('admin/sub_categories/add');
					} else {
						$data = array(
							'categories_id' 			=> $this->input->post('categories_id'),
							'sub_cat_name' 			=> $this->input->post('sub_cat_name'),
							'description' => $this->input->post('description'),
						);
				}
				$this->db->insert('sub_categories',$data);
					redirect('admin/sub_categories/');
				}
				$data	=	$this->Admin_model->all("categories");

			$view = 'add';
			break;

			case 'edit':
			$row	=	$this->db->get_where('sub_categories',array('sub_categories_id'=>$param2))->row();
			$fields = array(
			'categories_id'				=>	$row->categories_id,
			'sub_cat_name'				=>	$row->sub_cat_name,
 			'description'	=>	$row->description,
			);

			if($this->input->post('submit')){
				$update = array(
					'categories_id' 			=> $this->input->post('categories_id'),
					'sub_cat_name' 			=> $this->input->post('sub_cat_name'),
					'description' 	=> $this->input->post('description'),
				);
				$this->Admin_model->update('sub_categories','sub_categories_id', $param2, $update);
						redirect('admin/sub_categories/');
				}
			$data	=	$this->Admin_model->all("categories");

			$view = "edit";
			break;

			case 'delete':
				$this->Admin_model->delete('sub_categories','sub_categories_id', $param2);
						redirect('admin/sub_categories/list');
			$view = "list";
			break;

			case 'list':
				$data	=	$this->Admin_model->all("sub_categories");
			$view = "list";
			break;

			default:
				$data	=	$this->Admin_model->all("sub_categories");
			$view = "list";
			break;

		}
      $this->load->view('admin/header',array('rows'=>$data, 'fields'=> $fields));
      $this->load->view('admin/sub_categories/'.$view);
      $this->load->view('admin/footer');
	}
	public function users()
	{
		$data	=	$this->Admin_model->all("users");
		$this->load->view('admin/header',array('rows'=>$data));
		$this->load->view('admin/users/list');
		$this->load->view('admin/footer');
	}

}
