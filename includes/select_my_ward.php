<?php
	if(isset($_GET['view_performance']))
	{
		?>
		<h4> Enter details...to see your Ward's Performance!!!</h4>
		<form action="view_performance_result.php" method = "POST">	
		<?php
	}
	elseif(isset($_GET['view_enrollments']))
	{
		?>
		<h4> Enter details...to see your Ward's Enrollments!!!</h4>
		<form action="view_enrollment_result.php" method = "POST">	
		<?php
	}
?>

	</br>
	<div class="form-group">
	    <label for="exampleInputfname1">Firstname</label>
	    <input type="text" name="fname" class="form-control" id="exampleInputfname1" placeholder="fname" required>
	</div>

	</br>
	<div class="form-group">
		    <label for="exampleInputlname1">Lastname</label>
		    <input type="text" name="lname" class="form-control" id="exampleInputlname1" placeholder="lname" required>
	</div>
	
	</br>
	<div class="form-group">
	    <label for="exampleInputdob1">D.O.B.</label>
	    <input type="Date" name="dob" class="form-control" id="exampleInputdob1" placeholder="dob" required>
	</div>
  	</br>
	
	<button type="submit" class="btn btn-info" name="submit" >Submit</button>

</form>
