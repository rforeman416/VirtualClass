<table border='1'>
	<tr>
		<th>Students</th>
		<th>Classes</th>
	</tr>		
	<tr>
		<th>
			<a href="<?php echo site_url('/controller/addStudent'); ?>">
			Add</a>
		</th>
		<th>
			<a href="<?php echo site_url('/controller/addClass'); ?>">
			Add</a>
		</th>
	</tr>
	<tr>
		<th>Edit Student
			<?php echo form_open('controller/editStudent'); ?>
				<input type="text" name="idstudent" value="" size="8" />
				<input type="submit" value="Edit" />
			</form>
		</th>
		<th>Edit Class
			<?php echo form_open('controller/editClass'); ?>
				<input type="text" name="idclass" value="" size="8" />
				<input type="submit" value="Edit" />
			</form>
		</th>
	</tr>
	<tr>
		<th>Remove Student
			<?php echo form_open('controller/deleteStudent'); ?>
				<input type="text" name="idstudent" value="" size="8" />
				<input type="submit" value="Delete" />
			</form>
		</th>
		<th>Remove Class
			<?php echo form_open('controller/deleteClass'); ?>
				<input type="text" name="idclass" value="" size="8" />
				<input type="submit" value="Delete" />
			</form>
		</th>
	</tr>
	<tr>
		<th>
			<a href="<?php echo site_url('/controller/displayAll/s'); ?>">
			Display all
		</a>
		</th>
		<th>
			<a href="<?php echo site_url('/controller/displayAll/c'); ?>">
			Display all</a>
		</th>
	</tr>
		<th>Enroll</th>

	
</table>

	