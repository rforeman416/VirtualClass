<table border='1'>
	<tr>
		<th>Students</th>
		<th>Classes</th>
	</tr>		
	<tr>
		<th><a href="<?php echo site_url('/students/addStudent'); ?>">Add</a></th>
		<th>Add</th>
	</tr>
	<tr>
		<th>
		<!--<a href="<?php echo site_url('/students/findStudentById'); ?>">-->
		Edit
		<?php echo form_open('students/findStudentById'); ?>
		<input type="text" name="idstudent" value="" size="8" />
		<input type="submit" value="Edit" />
		</form>
		</th>
		<th>Edit</th>
	</tr>
	<tr>
		<th>Remove</th>
		<th>Remove</th>
	</tr>
	<tr>
		<th>Display</th>
		<th>Display</th>
	</tr>
		<th>Enroll</th>

	
</table>

	