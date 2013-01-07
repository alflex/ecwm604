<?php
class Staff_model extends CI_Model{
	
		public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function searchEmployee($emp_no,$last_name,$title,$dept_no,$limit){

		$this->db->select('*');
		$this->db->from('employees');
			$this->db->join('dept_emp','employees.emp_no = dept_emp.emp_no');
			$this->db->join('titles','dept_emp.emp_no = titles.emp_no');
			$this->db->join('salaries', 'dept_emp.emp_no = salaries.emp_no');
			$this->db->join('departments', 'dept_emp.dept_no = departments.dept_no');
				$this->db->where('titles.to_date', '9999-01-01' );
				$this->db->where('salaries.to_date', '9999-01-01' );
				$this->db->limit($limit);
				
	
			if(!empty($emp_no))
			
			{
				
				$this->db->where('employees.emp_no',$emp_no);
				
			}
			
			if(!empty($last_name))
			
			{
				
				$this->db->where('employees.last_name',$last_name);
				
			}
			
			
			if(!empty($title))
			
			{
				
				$this->db->where('titles.title',$title);
				
			}
			
			
			if(!empty($dept_no))
			
			{
				
				$this->db->where('dept_emp.dept_no',$dept_no);
				
			}
			
			
			$query = $this->db->get();
			return $query->result();
			
	
	}
	
	function insert1($emp_no,$birth_date,$first_name,$last_name,$gender,$hire_date){
		
		$this->db->set('emp_no', $emp_no);
		$this->db->set('birth_date', $birth_date);
		$this->db->set('first_name', $first_name);
		$this->db->set('last_name', $last_name);
		$this->db->set('gender', $gender);
		$this->db->set('hire_date', $hire_date);
		
		
	$query=	$this->db->insert('employees');
		
		
	}
	function update($emp_no,$salary){
		
		$data = array(
		'emp_no' => $emp_no,
		'salary' => $salary
		);
		
		$this->db->where('emp_no', $emp_no);
        $this->db->update('salaries', $data);
		
		
		
	}
	
	
	function updateJob($emp_no,$title){
		
		$data = array(
		'emp_no' => $emp_no,
		'title' => $title
		);
		
		$this->db->where('emp_no', $emp_no);
        $this->db->update('titles', $data);
		
		
		
	}

    function managerPromotion($emp_no,$dept_no){
		
		$today = date('Y-m-d');
		
		 $this->db->set('dept_no', $dept_no);
		$this->db->set('emp_no', $emp_no);
		$this->db->set('from_date', $today);
		$this->db->set('to_date', '9999-01-01');
	
		
		
	$query=	$this->db->insert('dept_manager');
		
	}
	
	function managerdemotion($emp_no,$dept_no)
	{
		
		$today = date('Y-m-d');
		
		$q = $this->db->where('emp_no' , $emp_no)
					->where('to_date', '9999-01-01')
		->from('dept_manager');
		
		$row = $q->get()->result();
		
		 foreach($row as $arow)
		 {
				$emp_no = $arow->emp_no;
				$dept_no = $arow->dept_no;
				$from_date = $arow->from_date;
				$to_date = $arow->to_date;
				
		 }
		
		
		 $data = array(
		 'dept_no' => $dept_no,
		'emp_no' => $emp_no,
		'from_date' => $from_date ,
		'to_date' => $today);
	    
		$this->db->where('emp_no' , $emp_no)
					->where('to_date', '9999-01-01')
		->from('dept_manager AS m')
		;
		//->join('department d', 'd.dept_no = m.dept_no')
		$this->db->update('dept_manager', $data);
		
		
	
	
	}
	
	function delete($emp_no){
		
		$this->db->set('emp_no', $emp_no);
		$this->db->delete('employees', array('emp_no' => $emp_no));
	}
	
	
	
	
}
