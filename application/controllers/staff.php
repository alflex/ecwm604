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
	
	
	
		
   public function search ($offset = 0){
	
	

	
	$limit =20;		

	$results = $this->staff_model->search($limit, $offset);
	$data['staff'] = $results['rows'];
	$data['num_results'] = $results['num_rows'];
	
	
	
	
	$this->load->view('welcome_message', $data);
	
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

	}
	
    function delete(){
    	 
		$this->load->view('delete_employees');
		
    }
    
    function deleteValues(){
		$emp_no = $this->input->post('emp_no');
		
	$this->load->model('staff_model');
	$this->staff_model->delete($emp_no);

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
		$this->load->view('view name');
		
		
		
		
	}
	}
	