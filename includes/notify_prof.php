<h4>Enter the notification</h4>
<form action="notify.php" method="post" enctype="multipart/form-data">
	<table>
		<div class="form-group">
			<tr>
				<td width="40%">
			    <label for="cname">Course Name</label>
			    </td>

			    <td>
			    <?php //<input type="text" name="course_name" class="form-control" id="cname" placeholder="course_name" required>?>
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
			    <label for="cid">Course Id</label>
			    </td>

			    <td>
			    <input type="text" name="course_id" class="form-control" id="cid" placeholder="course_id" required>
			    </td>
			</tr>
		</div>	

		<div class="form-group">
			<tr>
				<td width="40%">
			    <label for="notify">Notification</label>
			    </td>

			    <td>
			    <input type="text" name="notification" class="form-control" id="notify" placeholder="notification" required>
			    </td>
			</tr>
		</div>

	</table>
<button type="submit" name="btn-notify">Notify</button>
</form>
<?php

?>