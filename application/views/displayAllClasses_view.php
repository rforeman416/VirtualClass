<body>
  <h1>Students</h1>
<?php
echo <<<HTML

		<table border='1'>
			<tr>
				<th>ID #</th>
				<th>Title</th>
				<th>Teacher</th>
				<th>Room</th>
			</tr>

HTML;

			//Loop through all the users and create a row for each within the table
			foreach ($data as $d) {
				echo <<<HTML

					<tr>
						<td>{$d->idclasses}</td>
						<td>{$d->title}</td>
						<td>{$d->teacher}</td>
						<td>{$d->room}</td>
					</tr>
HTML;
				}?>
					</table>


   <p><?php echo $links; ?></p>

</body>