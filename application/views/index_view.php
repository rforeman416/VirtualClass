<table border='1'>
	<tr>
		<th>Students</th>
		<th>Classes</th>
	</tr>		
	<tr>
		<th>
			<a href="<?php echo site_url('/studentController/addStudent'); ?>">
			Add</a>
		</th>
		<th>
			<a href="<?php echo site_url('/classController/addClass'); ?>">
			Add</a>
		</th>
	</tr>
	<tr>
		<th>Search Student
			<?php echo form_open('studentController/searchStudent'); ?>
				<input type="text" name="idstudent" value="" size="8" />
				<input type="submit" value="search" />
			</form>
		</th>
		<th>Search Class
			<?php echo form_open('classController/searchClass'); ?>
				<input type="text" name="idclass" value="" size="8" />
				<input type="submit" value="search" />
			</form>
		</th>
	</tr>
	<tr>
		<th>
			<a href="<?php echo site_url('/studentController/displayAllStudents/'); ?>">
			Display all
		</a>
		</th>
		<th>
			<a href="<?php echo site_url('/classController/displayAllClasses'); ?>">
			Display all</a>
		</th>
	</tr>


	
</table>

	