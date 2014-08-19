<head>
	 <h1>Classes:</h1>
</head>
<body>
	<?php 
	if(empty($data))
	{
		echo 'No classes to display';
	}
	else{ 
	?>

			<table border='1'>
				<tr>
					<th>ID #</th>
					<th>Title</th>
					<th>Teacher</th>
					<th>Room</th>
				</tr>

				<?php 
				//Loop through all the users and create a row for each within the table
				foreach ($data as $d) { 
				?>
					
						<tr>
							<td><?php echo $d->idclasses ?></td>
							<td><?php echo $d->title ?></td>
							<td><?php echo $d->teacher ?></td>
							<td><?php echo $d->room ?></td>
						</tr>
	
					<?php } 
					?>
						</table>

	<?php } 
	?>
	   <p> <?php echo $links; ?> </p>

</body>