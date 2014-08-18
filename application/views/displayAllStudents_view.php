<body>
  <h1>Students</h1>
<?php
echo <<<HTML

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

HTML;

			//Loop through all the users and create a row for each within the table
			foreach ($data as $d) {
				echo <<<HTML

					<tr>
						<td>{$d->idstudents}</td>
						<td>{$d->firstName}</td>
						<td>{$d->lastName}</td>
						<td>{$d->midName}</td>
						<td>{$d->class1}</td>
						<td>{$d->class2}</td>
						<td>{$d->class3}</td>
						<td>{$d->class4}</td>
					</tr>
HTML;
				}?>
					</table>


   <p><?php echo $links; ?></p>

</body>