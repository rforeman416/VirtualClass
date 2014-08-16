<?php

//Check to see if users could be found
	if ($classes !== FALSE) {

		//Create the HTML table header
		echo <<<HTML

		<table border='1'>
			<tr>
				<th>ID #</th>
				<th>Title</th>
				<th>Teacher</th>
				<th>Room</th>
			</tr>

HTML;
		//Do we have an array of users or just a single user object?
		if (is_array($classes) && count($classes)) {
			//Loop through all the users and create a row for each within the table
			foreach ($classes as $class) {
				echo <<<HTML

					<tr>
						<td>{$class->getId()}</td>
						<td>{$class->getTitle()}</td>
						<td>{$class->getTeacher()}</td>
						<td>{$class->getRoom()}</td>
					</tr>

HTML;
			}

		} else {
			//Only a single user object so just create one row within the table
			echo <<<HTML

					<tr>
						<td>{$classes->getId()}</td>
						<td>{$classes->getTitle()}</td>
						<td>{$classes->getTeacher()}</td>
						<td>{$classes->getRoom()}</td>
					</tr>

HTML;
		}
		//Close the table HTML
		echo <<<HTML
		</table>
HTML;

	} else {
		//Now user could be found so display an error messsage to the user
		echo <<<HTML

			<p>A user could not be found with the specified user ID#, please try again.</p>	

HTML;
	}