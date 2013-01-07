<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header');?>
	<meta charset="utf-8">
	<title>Update employees</title>

</head>
<body>

<div>
	
<form action="updateJob" method="POST">
	emp_no: <input type="text" name="emp_no" id="emp_no"/>
	Change of title: <input type="text" name="title" id="title"/>
	
	<input type="submit" value="Submit">
	
	
</form>
</br>
</br>
</br>
<a id="logout" href='<?php echo site_url()."/login/do_logout"?>'>Logout</a>

</div>


</html>  