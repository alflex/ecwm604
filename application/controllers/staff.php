<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');
		$this->check_isvalidated();
	}
	
	public function index()
	{
		
	redirect('staff/search');
	
	}
	
	
	public function check_isvalidated(){
	if(! $this->session->userdata('validated')){
		
		redirect('login');
	}
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
		$data['query'] = $this->staff_model->searchEmployee($emp_no,$last_name,$title,$dept_no,$limit);
		}

		$this->load->view('advanced_search', $data);
	}
	
	
		
   
	
	 function insert(){
		
		$this->load->view('add_employees');
		
	}
	
	function insertValues(){
		$emp_no = $this->input->post('emp_no');
		$birth_date = $this->input->post('birth_date');
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$gender = $this->input->post('gender');
		$hire_date = $this->input->post('hire_date');
	
	$this->load->model('staff_model');
	$this->staff_model->insert1($emp_no,$birth_date,$first_name,$last_name,$gender,$hire_date);
	$this->load->view('success');
	}
	
    function delete(){
    	 
		$this->load->view('delete_employees');
		
    }
    
    function deleteValues(){
		$emp_no = $this->input->post('emp_no');
		
	$this->load->model('staff_model');
	$this->staff_model->delete($emp_no);
$this->load->view('success');
	}

    function update(){
    	$this->load->view('update_employees');
		
	}
	
	function updateEmployees(){
		
		
		$emp_no = $this->input->post('emp_no');
		$salary = $this->input->post('salary');
		//$title = $this->input->post('title');
		$this->load->model('staff_model');
		$this->staff_model->update($emp_no,$salary);
		$this->load->view('update_success');
		
		}
	
	function jobChange(){
		$this->load->view('change_job');
		
	}
	
	function updateJob(){
	$title = $this->input->post('title');
	$emp_no = $this->input->post('emp_no');
	
	$this->load->model('staff_model');
		$this->staff_model->updateJob($emp_no,$title);
		$this->load->view('update_jobtitle');
		 
	}
	
	function promoteToManager(){
		$this->load->view('manager_promotion');
		
	}
	
	function promotion(){
		
		
		
		$emp_no = $this->input->post('emp_no');
		$dept_no = $this->input->post('dept_no');

		
		$this->load->model('staff_model');
		$this->staff_model->managerPromotion($dept_no, $emp_no);
		$this->load->view('promoted_manager'); 
		
	}
	
	function demotionToEmployee(){
		
		$this->load->view('demotion_employee');
		
		}
	
	function demotion(){
		
		$emp_no = $this->input->post('emp_no');
				
		
		$this->load->model('staff_model');
		$this->staff_model->managerdemotion($emp_no);
		$this->load->view('employee_demoted');
		
	}
	
	function movedepartment(){
		$this ->load->view('moving_department');
		
	}
	
	function changedepartment(){
		
		$emp_no =$this->input->post('emp_no');
		$dept_no =$this->input->post('dept_no');
		
		$this->load->model('staff_model');
		$this->staff_model->moveDepartment($emp_no,$dept_no);
		$this->load->view('department_changed');
		
	}
	
	}
	