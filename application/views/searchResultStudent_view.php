<!--Link options for student manipulation-->
<div id = 'studentLinkOptions'>

	<a href="<?php echo site_url('/studentController/editStudent/'.$userId); ?>">
		Edit
	</a>
	<br>

	<a href="<?php echo site_url('/studentController/deleteStudent/'.$userId); ?>">
		Delete
	</a>
	<br>
	
	<p>Enroll in a class</p>
	<?php echo form_open('studentController/enroll/'.$userId); ?>
		<input type="text" name="idclass" value="" size="8" />
		<input type="submit" value="search" />
	</form>
	<br>
	
	<p>Un-enroll from a class</p>
	<?php echo form_open('studentController/unenroll/'.$userId); ?>
		<input type="text" name="idclass" value="" size="8" />
		<input type="submit" value="search" />
	</form>
</div>

				




