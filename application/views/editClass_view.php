<html>
<head>

	<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<script>
	//Generate name at top using jQuery
	  $(document).ready(function () {
		$('#title').keyup(function(){
		  $('#titleChange').html($(this).val());
		});
	  });
	</script>
	
	<h1>Edit: 
	<!--Title generated here-->
		<span id="titleChange">
		<?php echo $class->title;?>
		</span> 
	</h1>
</head>

<body>

	<?php echo validation_errors(); ?>
		
	<!--Edit Form-->
	<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/classController/editClass/<?php echo $class->idclasses?>' method="post">

		<!--Title Input-->
		<label for="title" class="col-lg-3 control-label">Title: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="title" id="title"  value="<?php echo $class->title; ?>" size="20">
		</div>
		<br>

		<!--Teacher Input-->		
		<label for="teacher" class="col-lg-3 control-label">Teacher: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="teacher" id="teacher"  value="<?php echo $class->teacher; ?>" size="20">
		</div>
		<br>

		<!--Room Input-->		
		<label for="room" class="col-lg-3 control-label">Room: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="room" id="room"  value="<?php echo $class->room; ?>" size="20">
		</div>
		<br>

		<!--Submit Button-->		
		<div class="col-lg-offset-3 col-lg-10">
		  <button type="submit" class="btn btn-success">Edit</button> 
		</div>

	</form>
	<br>
	<br>


</body>
</html>