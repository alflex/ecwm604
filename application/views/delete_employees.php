<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php $this->load->view('header');?>
	<meta charset="utf-8">
	<title>delete employees</title>

</head>
<body>


<div>	
<form action="deleteValues" method="POST">
	ID: <input type="text" name="emp_no" id="emp_no"/>
	<input type="submit" value="Submit">
	
</form>
</br>
</br>
</br>
<a id="logout" href='<?php echo site_url()."/login/do_logout"?>'>Logout</a>

</div>



</html>  