<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add employees</title>

</head>
<body>

<div>
	
<form action="insertValues" method="POST">
	ID: <input type="text" name="emp_no" id="emp_no"/>
	Birth date: <input type="text" name="birth_date" id="birth_date"/>
	First name: <input type="text" name="first_name" id="first_name"/>
	Last name: <input type="text" name="last_name" id="last_name"/>
	Gender: <input type="text"  name="gender" id="gender"/>
	Hire Date: <input type="text" name="hire_date" if="hire_date"/>
	<input type="submit" value="Submit">
	
</form>


</div>


</html>  