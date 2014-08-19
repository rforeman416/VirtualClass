<html>
<head>
	
	<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<script>
	//Generate name at top using jQuery
	  $(document).ready(function () {
		$('#firstName').keyup(function(){
		  $('#first').html($(this).val());
		});
		
		$('#midName').keyup(function(){
		  $('#mid').html($(this).val());
		});
		
		$('#lastName').keyup(function(){
		  $('#last').html($(this).val());
		});
		
	  });
	</script>
	
	<h1>Edit: 	
	<!--Name generated here-->
	<span id="first">
	<?php echo $student->firstName;?>
	</span> 
	
	<span id="mid">
	<?php echo $student->midName;?>
	</span> 
	
	<span id="last">
	<?php echo $student->lastName;?>
	</span></h1>

</head>

<body>
<br>
	<?php echo validation_errors(); ?>
		
	<!--Edit Form-->
	<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/studentController/editStudent/<?php echo $student->idstudents?>' method="post">

		<!--First Name Input-->
		<label for="firstName" class="col-lg-3 control-label">First Name: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="firstName" id="firstName"  value="<?php echo $student->firstName; ?>" size="20">
		</div>
		<br>

		<!--Middle Name Input-->		
		<label for="midName" class="col-lg-3 control-label">Middle Name: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="midName" id="midName"  value="<?php echo $student->midName; ?>" size="20">
		</div>
		<br>

		<!--Last Name Input-->		
		<label for="lastName" class="col-lg-3 control-label">Last Name: </label>
		<div class="col-lg-6">
			<input type="text" class="form-control" name="lastName" id="lastName"  value="<?php echo $student->lastName; ?>" size="20">
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