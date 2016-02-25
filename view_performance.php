<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/parent_dashboard_up.php"); ?>

		<td id="page">
		<form action="view_performance_result.php" method = "POST">
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
		<?php 
			
	       
		?>
		</td>

<?php include("includes/parent_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>
