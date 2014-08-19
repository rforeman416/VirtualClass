<html>
<head>
	<h1>Add a Student</h1>
</head>

<body>

	<?php 
	//Sends for information to studentController method 'addStudent()'
	echo validation_errors();
	echo form_open('studentController/addStudent'); 
	?>

	<!--Add form-->
	<h5>First Name</h5>
	<input type="text" name="firstName" value="<?php echo set_value('firstName'); ?>" size="50" />

	<h5>Middle Name</h5>
	<input type="text" name="midName" value="<?php echo set_value('midName'); ?>" size="50" />

	<h5>Last Name</h5>
	<input type="text" name="lastName" value="<?php echo set_value('lastName'); ?>" size="50" />


	<div><input type="submit" value="Submit" /></div>

	</form>

</body>
</html>