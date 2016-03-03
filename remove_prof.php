<form action="remove_record.php?user_type=Professor" method="post">
		
	<div class="form-group">
	    <label for="exampleusertype1">Select your category </label></br>
	    <?php
	    $sql = "SELECT * FROM professor";
	    $result = mysql_query($sql,$conn);
	    while($row = mysql_fetch_array($result,MYSQL_ASSOC))
	    {
	    	?>
	    	<input type="radio" name="user_id" value=<?php echo $row['Professor_id']; ?> > <?php echo $row['Firstname']." ".$row['Lastname'];?> <br>
	    	<?php
	    }
	    	
		?>
	</div>

	<button type="submit" class="btn btn-success" name="LOGIN"> Remove Professor</button>
</form>
