<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('students/editStudent'); ?>

<h5>First Name</h5>
<input type="text" name="firstName" value="<?php echo $student->getFirstName(); ?>" size="50" />

<h5>Middle Name</h5>
<input type="text" name="midName" value="<?php echo $student->getMidName(); ?>" size="50" />

<h5>Last Name</h5>
<input type="text" name="lastName" value="<?php echo $student->getLastName(); ?>" size="50" />


<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>