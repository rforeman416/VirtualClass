<head>	
		<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">

</head>	
<body>
	<div class="container-fluid">
		<!--<div class="col-lg-10">-->
			<legend>Select an Option:</legend> 

			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li class="active"><a href="#studentTabs" role="tab" data-toggle="tab"><strong>Students</strong></a></li>
			  <li><a href="#classTabs" role="tab" data-toggle="tab"><strong>Classes</strong></a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane fade in active" id="studentTabs">
					<br><br>
					<!--Add a Student-->
					<a href="<?= base_url();?>index.php/studentController/addStudent" class="btn btn-success">
						Add Student</a>
						<br>
						<br>
					
					<!--Display All Students-->
					<a href="<?= base_url();?>index.php/studentController/displayAllStudents" class="btn btn-success">
						List all Students</a> 
						<br>
						<br>
						
					<!--Search Student-->
					
					<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/studentController/searchStudent' method="post">
							
							<label for="idstudent" class="span4">Search for student: </label>
							
							<div class="row">
								<div  class="col-sm-2">
									<input type="text" class="form-control" name="idstudent" id="idstudent" placeholder="Student Id">
								</div>
								
								<div class="col-sm-1">
								  <button type="submit" class="btn btn-success">Search</button> 
								</div>
							</div>
					
					</form>
					
				</div>
			  
			  
				 <div class="tab-pane fade" id="classTabs">
					<br><br>
					<!--Add a Class-->
					<a href="<?= base_url();?>index.php/classController/addClass" class="btn btn-success">
						Add Class</a>
						<br>
						<br>
					<!--Display All Classes-->
					<a href="<?= base_url();?>index.php/classController/displayAllClasses" class="btn btn-success">
						List all Classes</a> 
						<br>
						<br>
					
					<!--Search Class-->
					<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/classController/searchClass' method="post">

							<label for="idclass" class="span4">Search for class: </label>
							
							<div class="row">
								<div  class="col-sm-2">
									<input type="text" class="form-control" name="idclass" id="idclass" placeholder="Class Id">
								</div>
								
								<div class="col-sm-1">
								  <button type="submit" class="btn btn-success">Search</button> 
								</div>
							</div>
					
					</form>
				  </div>
			</div>
				
				
		</div>
	<!--</div>-->

	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"> </script>
</body>
	