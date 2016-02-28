<h4>Enter the notification</h4>
<form action="notify.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		    <label for="cname">Course Name</label>
		    <input type="text" name="course_name" class="form-control" id="cname" placeholder="course_name" required>
	</div>
	</br>
	<div class="form-group">
		    <label for="cid">Course Id</label>
		    <input type="text" name="course_id" class="form-control" id="cid" placeholder="course_id" required>
	</div>	
	</br>
	<div class="form-group">
	    <label for="notify">Notification</label>
	    <input type="text" name="notification" class="form-control" id="notify" placeholder="notification" required>
	</div>
  	</br>
</br>
<button type="submit" name="btn-notify">Notify</button>
</form>
<?php

?>