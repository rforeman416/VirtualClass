<html>
<head>
<title>My Form</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
/*
$(document).ready(function(){
  $("button").click(function(){
    $("div").text($("form").serialize());
  });
});
*/


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

<?php echo validation_errors(); ?>
Full name: 
<span id="first">
<?php echo $student->getFirstName();?>
</span> 
<span id="mid">
<?php echo $student->getMidName();?>
</span> 
<span id="last">
<?php echo $student->getLastName();?>
</span>

<?php echo form_open('controller/editStudent/'.$student->getId()); ?>

<h5>First Name</h5>
<input type="text" name="firstName" id= "firstName" value="<?php echo $student->getFirstName(); ?>" size="50" />

<h5>Middle Name</h5>
<input type="text" name="midName" id= "midName" value="<?php echo $student->getMidName(); ?>" size="50" />

<h5>Last Name</h5>
<input type="text" name="lastName" id= "lastName" value="<?php echo $student->getLastName(); ?>" size="50" />


<div><input type="submit" value="Submit" /></div>

</form>


</body>
</html>