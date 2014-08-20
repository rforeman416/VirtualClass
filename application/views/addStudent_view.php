<html>
<head>
	<h1>Add a Student</h1>
	<br>
	<br>
	<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<div class="container-fluid">	
	<?php echo validation_errors(); ?>
	<table><td class='noCenter'>
		
	<!--Add Form-->
	<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/studentController/addStudent' method="post">
		
		
		<!--First Name Input-->
		<div class="row">
			<label for="firstName" class="col-lg-2 control-label">First Name: </label>
			<div class="col-lg-6 ">
				<input type="text" class="form-control" name="firstName" id="firstName"  value="<?php echo set_value('firstName'); ?>" size="20">
			</div>
		</div>
		<br>
		
		<!--Middle Name Input-->
		<div class="row">
		<label for="midName" class="col-lg-2 control-label">Middle Name: </label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="midName" id="midName"  value="<?php echo set_value('midName'); ?>" size="20">
			</div>
		</div>
		<br>
		
		<!--Last Name Input-->
		<div class="row">
			<label for="lastName" class="col-lg-2 control-label">Last Name: </label>
			<div class="col-lg-6">
				<input type="text" class="form-control" name="lastName" id="lastName"  value="<?php echo set_value('lastName'); ?>" size="20">
			</div>
		</div>
		<br>
		
		<!--Submit Button-->
		<div class="row">
			<div class="col-lg-offset-6 col-lg-10">
			  <button type="submit" class="btn btn-success">Add Student</button> 
			</div>
		</div>

	</form>

</table>
	<br>
	<br>
</div>
</body>
</html>