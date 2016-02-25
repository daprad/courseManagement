<h4>Enter lecture details...</h4>
<form action="upload2.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<div class="form-group">
		    <label for="exampleInputlname1">Course Name</label>
		    <input type="text" name="course_name" class="form-control" id="exampleInputlname1" placeholder="course_name" required>
	</div>
	</br>
	<div class="form-group">
	    <label for="exampleInputdob1">Lecture name</label>
	    <input type="text" name="lec_name" class="form-control" id="exampleInputdob1" placeholder="lec Name" required>
	</div>
  	</br>
</br>
<button type="submit" name="btn-upload">upload</button>
</form>

<?php
	if(isset($_GET['success']))
	{
		?>
        <label>File Uploaded Successfully...  </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While File Uploading !</label>
        <?php
	}
	else
	{
		?>
        <label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        <?php
	}
?>