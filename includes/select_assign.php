<h4>Enter Assignment details...</h4>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<div class="form-group">
		    <label for="exampleInputlname1">Course Name</label>
		    <input type="text" name="course_name" class="form-control" id="exampleInputlname1" placeholder="course_name" required>
	</div>
	</br>
	<div class="form-group">
	    <label for="exampleInputdob1">Deadline</label>
	    <input type="Date" name="deadline" class="form-control" id="exampleInputdob1" placeholder="deadline" required>
	</div>
  	</br>
</br>
<button type="submit" name="btn-upload">upload</button>
</form>

<?php

?>