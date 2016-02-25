<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/Prof_dashboard_up.php"); ?>

		<td id="page">
			
			<?php	
				if(isset($_SESSION['User_id']))
				{
					$user_id = mysql_escape_string($_SESSION["User_id"]);
					$user_type = mysql_escape_string($_SESSION["User_type"]); 	
				}
				else
				{
					echo "Session variables can't be retrieved";
				}
				
				//echo $myid;
				//echo $mytype;
				if(strcmp($user_type,"Student")==0){
					$sql = "SELECT * FROM student where Student_id = '$user_id' "; 
				}
				elseif (strcmp($user_type,"Professor")==0) {
					$sql = "SELECT * FROM professor where Professor_id = '$user_id' "; 
				}
				elseif (strcmp($user_type,"Parent")==0) {
					$sql = "SELECT * FROM parent where Parent_id = '$user_id' "; 
				}

				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				echo "<h2> Welcome ".$row['Firstname']."</h2>";
			?>
			
		</td>
<?php include("includes/Prof_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>
