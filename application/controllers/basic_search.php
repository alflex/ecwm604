<?php
class Basic_search extends  CI_Controller{
	
		public function __construct()
	{
		parent::__construct();
	$this->load->model('basic_model');
	}

	function searchEmployee(){

		$limit =100;
		$emp_no = $this->input->post('emp_no');
		$last_name = $this->input->post('last_name');
		$title =$this->input->post('title');
		$dept_no =$this->input->post ('dept_no');
		
		$this->load->model('basic_model');
		
		if (empty($emp_no) && empty($last_name) && empty($title) && empty($dept_no)) {
			$data = ('');
		} else {
		$data['query'] = $this->basic_model->searchEmployee($emp_no,$last_name,$title,$dept_no,$limit);
		}
		$this->load->view('basic_search', $data);
	}

}

	
	
	