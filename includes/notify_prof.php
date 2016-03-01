<h4>Enter the notification</h4>
<form action="notify.php" method="post" enctype="multipart/form-data">
	<table>
		<div class="form-group">
			<tr>
				<td width="40%">
			    <label for="cname">Course Name</label>
			    </td>

			    <td>
			    <input type="text" name="course_name" class="form-control" id="cname" placeholder="course_name" required>
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