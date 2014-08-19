<html>
<head>
	<h1>Add a Class</h1>
</head>
<body>

	<?php 
	//Sends for information to classController method 'addClass()'
	echo validation_errors();
	echo form_open('classController/addClass'); 
	?>

	<!--Add form-->
	<h5>Class Title</h5>
	<input type="text" name="title" value="<?php echo set_value('title'); ?>" size="50" />

	<h5>Teacher</h5>
	<input type="text" name="teacher" value="<?php echo set_value('teacher'); ?>" size="50" />

	<h5>Room</h5>
	<input type="text" name="room" value="<?php echo set_value('room'); ?>" size="50" />


	<div><input type="submit" value="Submit" /></div>

	</form>

</body>
</html>