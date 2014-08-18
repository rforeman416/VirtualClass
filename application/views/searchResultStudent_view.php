
<a href="<?php echo site_url('/controller/editStudent/'.$userId); ?>">Edit</a>
<br>
<a href="<?php echo site_url('/controller/deleteStudent/'.$userId); ?>">Delete</a>
<br>
Enroll in a class
<?php echo form_open('controller/enroll/'.$userId); ?>
				<input type="text" name="idclass" value="" size="8" />
				<input type="submit" value="search" />
			</form>
<br>
Un-enroll from a class
<?php echo form_open('controller/unenroll/'.$userId); ?>
				<input type="text" name="idclass" value="" size="8" />
				<input type="submit" value="search" />
			</form>




