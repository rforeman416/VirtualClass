<table border='1'>
	<tr>
		<th>Students</th>
		<th>Classes</th>
	</tr>		
	<tr>
		<th>
			<a href="<?php echo site_url('/students/addStudent'); ?>">
			Add
			</a>
		</th>
		<th>Add</th>
	</tr>
	<tr>
		<th>Edit
			<?php echo form_open('students/editStudent'); ?>
				<input type="text" name="idstudent" value="" size="8" />
				<input type="submit" value="Edit" />
			</form>
		</th>
		<th>Edit</th>
	</tr>
	<tr>
		<th>Remove
			<?php echo form_open('students/deleteStudent'); ?>
				<input type="text" name="idstudent" value="" size="8" />
				<input type="submit" value="Delete" />
			</form>
		</th>
		<th>Remove</th>
	</tr>
	<tr>
		<th>
		<a href="<?php echo site_url('/students/displayAll'); ?>">
		Display all
		</a>
		</th>
		<th>Display all</th>
	</tr>
		<th>Enroll</th>

	
</table>

	