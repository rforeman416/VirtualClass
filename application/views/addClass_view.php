<html>
<head>
	<h1>Add a Class</h1>
	<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">
</head>

<body>
	
	<?php echo validation_errors(); ?>
		
	<!--Add Form-->
	<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/classController/addClass' method="post">

		<!--Title Input-->
		<label for="title" class="col-lg-3 control-label">Title: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="title" id="title"  value="<?php echo set_value('title'); ?>" size="20">
		</div>
		<br>
		
		<!--Teacher Input-->
		<label for="teacher" class="col-lg-3 control-label">Teacher: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="teacher" id="teacher"  value="<?php echo set_value('teacher'); ?>" size="20">
		</div>
		<br>
		
		<!--Room Input-->
		<label for="room" class="col-lg-3 control-label">Room: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="room" id="room"  value="<?php echo set_value('room'); ?>" size="20">
		</div>
		<br>
		
		<!--Submit Button-->
		<div class="col-lg-offset-3 col-lg-10">
		  <button type="submit" class="btn btn-success">Add</button> 
		</div>

	</form>
	<br>
	<br>

</body>
</html>