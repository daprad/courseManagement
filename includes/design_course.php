<h4>Design a New Course!!!</h4>
<form action="upload_course.php" method="post" enctype="multipart/form-data">
<table>
		<div class="form-group">
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
		    	<label for="exampleInputdob1">Start Date</label>
		    	</td>
		    	
		    	<td>
		    	<input type="Date" name="startdate" class="form-control" id="exampleInputdob1" placeholder="startdate" required>
		    	</td>
		    </tr>
			
		</div>
		
		
		<div class="form-group">
			<tr>
				<td width="40%">
		    	<label for="exampleInputdob1">Duration (weeks)</label>
		    	</td>
		    	
		    	<td>
		    	<input type="Date" name="duration" class="form-control" id="exampleInputdob1" placeholder="duration" required>
		    	</td>
		    </tr>
			
		</div>
		
		
		<div class="form-group">
			<tr>
				<td width="40%">
			    <label for="exampleInputlname1">Department</label>
			    </td>
			    
			    <td>
			    <input type="text" name="dept" class="form-control" id="exampleInputlname1" placeholder="dept" required>
			    </td>
			</tr>
			
		</div>
		
		<tr>
			<td width="40%">
			<br>
			<label for="exampleInputlname1">Syllabus</label>
			</td>

			<td>
			<br>
			<input type="file" name="file" id="exampleInputlname1" placeholder="file"/>
			</td>
		</tr>
	</br>
	
</table>
<button type="submit" name="btn-submit">Submit</button>
</form>
<?php

?>