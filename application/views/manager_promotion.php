<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header');?>
	<meta charset="utf-8">
	<title>Promotion To Manager</title>

</head>
<body>

<div>
	
<form action="promotion" method="POST">
	emp_no: <input type="text" name="emp_no" id="emp_no"/>
	Department change: <input type="text" name="dept_no" id="dept_no"/>

	
	<input type="submit" value="Submit">
	
</form>

</br>
</br>
</br>

<a id="logout" href='<?php echo site_url()."/login/do_logout"?>'>Logout</a>


</div>


</html>  