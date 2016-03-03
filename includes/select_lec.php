<?php require_once("includes/connection.php"); ?>
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
			    <?php //<input type="text" name="course_name" class="form-control" id="exampleInputlname1" placeholder="course_name" required>?>
			    <?php
			    	echo "<select name='course_name'>";
			    	$query = "SELECT Course_name FROM course WHERE Course_id IN (SELECT Course_id FROM teaches WHERE Professor_id = '$user_id') ";
			    	$result = mysql_query($query,$conn);
			    	while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
						echo "hello";
					    echo "<option value={$row['Course_name']}> {$row['Course_name']} </option> ";
					}
					echo "</select>";
			    ?>
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