<h4>Enter lecture details...</h4>
<form action="upload2.php" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<input type="file" name="file" />
		</tr>

		<div class="form-group">
		<br>
		<tr>
			<td width="40%">
			    <label for="exampleInputlname1">Course Name</label>
			</td>

			<td>
			    <input type="text" name="course_name" class="form-control" id="exampleInputlname1" placeholder="course_name" required>
			</td>
		</tr>
		</div>
		
		<div class="form-group">
		<tr>
			<td width="40%">
		    	<label for="exampleInputdob1">Lecture name</label>
		    </td>

		    <td>	
		    	<input type="text" name="lec_name" class="form-control" id="exampleInputdob1" placeholder="lec Name" required>
		    </td>
		</tr>
		</div>

	</table>
<button type="submit" name="btn-upload">upload</button>
</form>
<?php

?>