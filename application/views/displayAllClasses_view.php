<html>
<head>
	 <h1>Class Info:</h1>
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
		echo 'No classes to display';
	}
	else{ ?>

		<table>
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
						<td>
							<!--Links to more info-->
							<a href="<?php echo site_url('/classController/searchClass/'.$d->idclasses); ?>">
								<?php echo $d->idclasses ?>
							</a></td>
						<td><?php echo $d->title ?></td>
						<td><?php echo $d->teacher ?></td>
						<td><?php echo $d->room ?></td>
					</tr>

				<?php } ?>
		</table>

	<?php } ?>
	<p> <?php echo $links; ?> </p>
</div>
</div>
</body>
</html>