<?php

//Check to see if users could be found
	if ($students !== FALSE) {

		//Create the HTML table header
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
		//Do we have an array of users or just a single user object?
		if (is_array($students) && count($students)) {
			//Loop through all the users and create a row for each within the table
			foreach ($students as $student) {
				echo <<<HTML

					<tr>
						<td>{$student->getId()}</td>
						<td>{$student->getFirstName()}</td>
						<td>{$student->getLastName()}</td>
						<td>{$student->getMidName()}</td>
						<td>{$student->getClass1()}</td>
						<td>{$student->getClass2()}</td>
						<td>{$student->getClass3()}</td>
						<td>{$student->getClass4()}</td>
					</tr>

HTML;
			}

		} else {
			//Only a single user object so just create one row within the table
			echo <<<HTML

					<tr>
						<td>{$students->getId()}</td>
						<td>{$students->getFirstName()}</td>
						<td>{$students->getLastName()}</td>
						<td>{$students->getMidName()}</td>
						<td>{$students->getClass1()}</td>
						<td>{$students->getClass2()}</td>
						<td>{$students->getClass3()}</td>
						<td>{$students->getClass4()}</td>

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