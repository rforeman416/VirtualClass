<!--Link options for class manipulation-->

<div id = 'classLinkOptions'>
	<a href="<?php echo site_url('/classController/editClass/'.$userId); ?>">
		Edit class
	</a>
	<br>

	<a href="<?php echo site_url('/classController/deleteClass/'.$userId); ?>">
		Delete class
	</a>
	<br>

	<a href="<?php echo site_url('/classController/listAllStudents/'.$userId); ?>">
		Diplay all enrolled students
	</a>
</div>
