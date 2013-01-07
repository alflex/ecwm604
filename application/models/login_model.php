<?php
class Login_model extends CI_Model{
	
		public function __construct()
	{
		parent::__construct();
	}


	public function validate(){
		
		$username =$this->security->xss_clean($this->input->post('username'));
		$password =$this->security->xss_clean($this->input->post('password')); 
		$pass = md5($password);
			
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
			$query = $this->db->get('users');
			
			if($query->num_rows == 1)
	{
		$row = $query->row();
		$data = array(
		
		'username' => $row->Username,
		'validated' => true
		);
		
		$this->session->set_userdata($data);
		redirect('staff/searchEmployee');
	}
	
	return false;
	
	}
}
	