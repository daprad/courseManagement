<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/parent_dashboard_up.php"); ?>

		<td id="page">
			
			<?php	
				if(isset($_SESSION['User_id']))
				{
					$user_id = mysql_escape_string($_SESSION["User_id"]);
					$user_type = mysql_escape_string($_SESSION["User_type"]); 	
				}
				else
				{
					//echo "Session variables can't be retrieved";
					header('Location: login.php');
				}

				if (strcmp($user_type,"Parent")==0) 
				{
					$sql = "SELECT * FROM parent where Parent_id = '$user_id' "; 
				}

				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				echo "<h2> Welcome ".$row['Firstname']."</h2>";
			?>
			
			<?php
				if(isset($_GET['view_performance'])||isset($_GET['view_enrollments']))
				{
					include("includes/select_my_ward.php");
				}
			?>
		</td>
<?php include("includes/parent_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>
