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
<br>
</head>

<body>
<div class="container-fluid">
	<?php echo validation_errors(); ?>
	<table><td class='noCenter'>
		
	<!--Edit Form-->
	<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/studentController/editStudent/<?php echo $student->idstudents?>' method="post">

		<!--First Name Input-->
		<div class="row">
			<label for="firstName" class="col-lg-2 control-label">First Name: </label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="firstName" id="firstName"  value="<?php echo $student->firstName; ?>" size="20">
			</div>
		</div>
		<br>

		<!--Middle Name Input-->
		<div class="row">
			<label for="midName" class="col-lg-2 control-label">Middle Name: </label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="midName" id="midName"  value="<?php echo $student->midName; ?>" size="20">
			</div>
		</div>
		<br>

		<!--Last Name Input-->	
		<div class="row">
			<label for="lastName" class="col-lg-2 control-label">Last Name: </label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="lastName" id="lastName"  value="<?php echo $student->lastName; ?>" size="20">
			</div>
		</div>
		<br>

		<!--Submit Button-->
		<div class="row">		
			<div class="col-lg-offset-6 col-lg-10">
			  <button type="submit" class="btn btn-success">Edit Student</button> 
			</div>
		</div>

	</form>
	<br>
	<br>
</table>
</div>
</body>
</html>