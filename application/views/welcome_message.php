<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<style>
*{
	font-family:Arial;
	font-size: 12px;
}
	table{
		border-collapse:collapse
	}
	td,th
	{
		border:1px solid #666666;
		padding: 4px;
	}
</style>
<body>
	
<div>
	Found <?php echo $num_results; ?> welcome
</div>
<center>
<table>
	<thead>
	<th>ID</th>
	<th>birth_date</th>
	<th>first_name</th>
	<th>last_name</th>
	<th>gender</th>
	<th>hire_date</th>
	</thead>
	<tbody>
		<?php foreach($staff as $welcome_message): ?>
			<tr>
			
				<td><?php echo $welcome_message->emp_no; ?></td>
				<td><?php echo $welcome_message->birth_date; ?></td>
				<td><?php echo $welcome_message->first_name; ?></td>
				<td><?php echo $welcome_message->last_name; ?></td>
				<td><?php echo $welcome_message->gender; ?></td>
				<td><?php echo $welcome_message->hire_date; ?></td>
			</tr>
			<?php endforeach; ?>
	</tbody>
</table>
</center>



</body>
</html>