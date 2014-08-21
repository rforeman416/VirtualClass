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

			</tr>

			<?php 
			//Loop through all the users and create a row for each within the table
			foreach ($data as $d) { ?>
				
					<tr>
						<td>
							<!--Links to more info-->
							<a href="<?php echo site_url('/studentController/searchStudent/'.$d->idstudents); ?>">
								<?php echo $d->idstudents ?>
							</a></td>
						<td><?php echo $d->firstName ?></td>
						<td><?php echo $d->lastName ?></td>
						<td><?php echo $d->midName ?></td>
					</tr>

				<?php } ?>
		</table>


	<?php } ?>
	<p> <?php echo $links; ?> </p>
</div>
</div>
</body>
</html>