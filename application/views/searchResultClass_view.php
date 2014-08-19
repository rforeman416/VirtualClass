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

<!--Link options for class manipulation-->
<div class="container-fluid">
	<br>
	
	<!--Edit Class-->
	<div id = 'editClass'>
		<a href="<?php echo site_url('/classController/editClass/'.$userId); ?>">
			Edit
		</a>
	</div>
	<br>

	<!--Delete Class-->	
	<div id = 'deleteClass'>
		<a data-href="<?php echo site_url('/classController/deleteClass/'.$userId); ?>" data-toggle="modal"  data-target="#confirm-delete" href='#'>Delete</a><br>
		
		<!--Alert box to confirm delete-->
		<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				
					<div class="modal-body">
						<p>Are you sure you want to delete this class?</p>
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
	
	<!--Display all students in class-->
	<div id = 'allStudentsInClass'>
		<a href="<?php echo site_url('/classController/listAllStudents/'.$userId); ?>">
			Diplay all enrolled classes
		</a>
	</div>
	<br>

	<br>
	<br>
</div>
</body>



