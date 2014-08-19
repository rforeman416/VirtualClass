<html>
<head>
	 <h1>Student Info:</h1>
	 <br>
	 <br>
	<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">	
</head>
<body>
<div class="container-fluid">
<div>
	<?php 
	if(empty($data))
	{
		echo 'No students to display';
	}
	else{ 
	?>

		<table>
			<tr>
				<th>ID #</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Middle Name</th>
				<th>Class 1</th>
				<th>Class 2</th>
				<th>Class 3</th>
				<th>Class 4</th>
			</tr>

			<?php 
			//Loop through all the users and create a row for each within the table
			foreach ($data as $d) { ?>
				
					<tr>
						<td><?php echo $d->idstudents ?></td>
						<td><?php echo $d->firstName ?></td>
						<td><?php echo $d->lastName ?></td>
						<td><?php echo $d->midName ?></td>
						<td><?php echo $d->class1 ?></td>
						<td><?php echo $d->class2 ?></td>
						<td><?php echo $d->class3 ?></td>
						<td><?php echo $d->class4 ?></td>
					</tr>

				<?php } ?>
		</table>

	<?php } ?>
	<p> <?php echo $links; ?> </p>
</div>
</div>
</body>
</html>