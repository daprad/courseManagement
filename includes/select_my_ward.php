<?php
	if(isset($_GET['view_performance']))
	{
		?>
		<h4> Enter details...to see your Ward's Performance!!!</h4>
		<form action="view_performance_result.php" method = "POST">	
		<table>
		<?php
	}
	elseif(isset($_GET['view_enrollments']))
	{
		?>
		<h4> Enter details...to see your Ward's Enrollments!!!</h4>
		<form action="view_enrollment_result.php" method = "POST">	
		<table>
		<?php
	}
?>

	
	<div class="form-group">
	<tr>
		<td width="40%">
	    <label for="exampleInputfname1">Firstname</label>
	    </td>

	    <td>
	    <input type="text" name="fname" class="form-control" id="exampleInputfname1" placeholder="fname" required>
	    </td>
	</tr>
	</div>

	
	<div class="form-group">
	<tr>
		<td width="40%">
	    <label for="exampleInputlname1">Lastname</label>
	    </td>

	    <td>
	    <input type="text" name="lname" class="form-control" id="exampleInputlname1" placeholder="lname" required>
	    </td>
	</tr>
	</div>
	
	
	<div class="form-group">
	<tr>
		<td width="40%">
	    <label for="exampleInputdob1">D.O.B.</label>
	    </td>

	    <td>
	    <input type="Date" name="dob" class="form-control" id="exampleInputdob1" placeholder="dob" required>
	    </td>
	</tr>
	</div>
  	
	</table>
	<button type="submit" class="btn btn-info" name="submit" >Submit</button>

</form>
