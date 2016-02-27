<h4>Design a New Course!!!</h4>
<form action="upload_course.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		    <label for="exampleInputlname1">Course Name</label>
		    <input type="text" name="course_name" class="form-control" id="exampleInputlname1" placeholder="course_name" required>
	</div>
	</br>
	<div class="form-group">
	    <label for="exampleInputdob1">Start Date</label>
	    <input type="Date" name="startdate" class="form-control" id="exampleInputdob1" placeholder="startdate" required>
	</div>
	</br>
	<div class="form-group">
	    <label for="exampleInputdob1">End Date</label>
	    <input type="Date" name="enddate" class="form-control" id="exampleInputdob1" placeholder="enddate" required>
	</div>
	</br>
	<div class="form-group">
		    <label for="exampleInputlname1">Department</label>
		    <input type="text" name="dept" class="form-control" id="exampleInputlname1" placeholder="dept" required>
	</div>
	</br>
	<label for="exampleInputlname1">Syllabus</label>
  	<input type="file" name="file" id="exampleInputlname1" placeholder="file"/>
  	</br>
</br>
<button type="submit" name="btn-submit">Submit</button>
</form>
<?php

?>