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

				if (strcmp($user_type,"Professor")==0) 
				{
					$sql = "SELECT * FROM professor where Professor_id = '$user_id' "; 
				}

				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				echo "<h2> Welcome ".$row['Firstname']."</h2>";
			?>

			<?php
				if(isset($_GET['notify']))
				{
					include("includes/notify_prof.php");
				}
				elseif(isset($_GET['upload_lec']))
				{
					include("includes/select_lec.php");
				}
				elseif(isset($_GET['upload_assign']))
				{
					include("includes/select_assign.php");
				}
				elseif(isset($_GET['design']))
				{
					include("includes/design_course.php");
				}
				elseif(isset($_GET['success']))
				{
					?>
			        <label>File Uploaded Successfully...  </label>
			        <?php
				}
				elseif(isset($_GET['fail']))
				{
					?>
			        <label>Problem While File Uploading !</label>
			        <?php
				}
			?>
			
		</td>
<?php include("includes/Prof_dashboard_down.php"); ?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>
