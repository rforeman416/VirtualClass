<head>
	<link href="<?= base_url();?>assets/css/bootstrap.css" rel="stylesheet">
			
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
			
	<script>
		$(document).ready(function () {
		$('#confirm-delete').on('show.bs.modal', function(e) {
			$(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
		});});
	</script>	
</head>	
<body>
<!--Link options for student manipulation-->
<div class="container-fluid">
	<br>
	
	<!--Edit Student-->
	<div id = 'editStudent'>
		<a href="<?php echo site_url('/studentController/editStudent/'.$userId); ?>">
			Edit
		</a>
	</div>
	<br>

	<!--Delete Student-->	
	<div id = 'deleteStudent'>
		<a data-href="<?php echo site_url('/studentController/deleteStudent/'.$userId); ?>" data-toggle="modal" data-target="#confirm-delete" href='#'>Delete</a><br>
		
		<!--Alert box to confirm delete-->
		<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				
					<div class="modal-body">
						<p>Are you sure you want to delete this student?</p>
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a href="#" class="btn btn-danger danger">Delete</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	
	<!--Enroll Student-->	
	<div id = 'enrollStudent'>
		<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/studentController/enroll/<?php echo $userId?>' method="post">

			<label for="studentEnroll" class="span4">Enroll in a class: </label>
			
			<div class="row">
			<div class="col-sm-2">
				<input type="text" class="form-control" name="idclass" id="idclass" placeholder="Class Id">
			</div>
			
			<div class="col-sm-1">
			  <button type="submit" class="btn btn-success">Enroll</button> 
			</div>
			</div>
		
		</form>			
	</div>
	<br>

	<!--Un-enroll Student-->	
	<div id = 'unEnrollStudent'>
		<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/studentController/unenroll/<?php echo $userId?>' method="post">

			<label for="studentUnEnroll" class="span4">Un-enroll from a class: </label>
			
			<div class="row">
			<div class="col-sm-2">
				<input type="text" class="form-control" name="idclass" id="idclass" placeholder="Class Id">
			</div>
			
			<div class="col-sm-1">
			  <button type="submit" class="btn btn-success">Un-enroll</button> 
			</div>
			</div>
		
		</form>			
	</div>
	<br>
	<br>
</div>
</body>

		




