<head>
	 <h1>Students:</h1>
</head>
<body>
	<?php 
	if(empty($data))
	{
		echo 'No students to display';
	}
	else{ 
	?>

			<table border='1'>
				<tr>
					<th>ID #</th>
					<th>first name</th>
					<th>last name</th>
					<th>mid name</th>
					<th>class1</th>
					<th>class2</th>
					<th>class3</th>
					<th>class4</th>
				</tr>

				<?php 
				//Loop through all the users and create a row for each within the table
				foreach ($data as $d) { 
				?>
					
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
	
					<?php } 
					?>
						</table>

	<?php } 
	?>
	   <p> <?php echo $links; ?> </p>

</body>