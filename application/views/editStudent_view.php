<html>
<head>
	<h1>Edit Student</h1>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<script>
	//Generate name at top
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
</head>

<body>
	
	<!--Generated name-->
	Full name: 
	
	<span id="first">
	<?php echo $student->firstName;?>
	</span> 
	
	<span id="mid">
	<?php echo $student->midName;?>
	</span> 
	
	<span id="last">
	<?php echo $student->lastName;?>
	</span>

	
	<?php 
	//Sends form information to studentController method 'editStudent()'
	echo validation_errors();
	echo form_open('studentController/editStudent/'.$student->idstudents); 
	?>

	<!--Edit Form-->
	<h5>First Name</h5>
	<input type="text" name="firstName" id= "firstName" value="<?php echo $student->firstName; ?>" size="50" />

	<h5>Middle Name</h5>
	<input type="text" name="midName" id= "midName" value="<?php echo $student->midName; ?>" size="50" />

	<h5>Last Name</h5>
	<input type="text" name="lastName" id= "lastName" value="<?php echo $student->lastName; ?>" size="50" />

	<div><input type="submit" value="Submit" /></div>

	</form>

</body>
</html>