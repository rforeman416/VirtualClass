<html>
<head>
<title>My Form</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('controller/editClass/'.$class->getId()); ?>

<h5>Class Title</h5>
<input type="text" name="title" value="<?php echo $class->getTitle(); ?>" size="50" />

<h5>Teacher</h5>
<input type="text" name="teacher" value="<?php echo $class->getTeacher(); ?>" size="50" />

<h5>Room</h5>
<input type="text" name="room" value="<?php echo $class->getRoom(); ?>" size="50" />


<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>