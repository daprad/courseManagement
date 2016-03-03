<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<?php
	if(!isset($_SESSION['user']))
	{
		header('Location: admin.php');
	}
?>
<table id="structure">
	<tr>
		<td id="navigation">
			<ul>
			  <li><a class="active" href="admin_dashboard.php">Home</a></li>
			  <li><a href="admin_dashboard.php?prof">Professor Login</a></li>
			  <li><a href="admin_dashboard.php?student">Student Login</a></li>
			  <li><a href="admin_dashboard.php?rem_std">Remove Student</a></li>
			  <li><a href="admin_dashboard.php?rem_prof">Remove Professor</a></li>
			  <li><a href="admin_dashboard.php?rem_par">Remove Parent</a></li>
			  <li><a href="admin_dashboard.php?rem_course">Remove Course</a></li>
			  <li><a href="logout.php">Logout</a></li>
			</ul>
		</td>

		<td id="page">
			
			<?php	

				echo "<h2> Welcome ADMIN </h2>";
			?>

			<?php
				if(isset($_GET['prof']))
				{
					include('show_prof.php');
				}
				elseif(isset($_GET['student']))
				{
					include('show_student.php');
				}
				elseif(isset($_GET['rem_std']))
				{
					include('remove_std.php');
				}
				elseif(isset($_GET['rem_prof']))
				{
					include('remove_prof.php');
				}
				elseif(isset($_GET['rem_par']))
				{
					include('remove_parent.php');
				}
				elseif(isset($_GET['rem_course']))
				{
					include('remove_course.php');
				}
			?>
			
		</td>

	<?php 
		if(isset($conn))
		{
			mysql_close($conn);	
		}
	?>

		
	</tr>
</table>
<?php include("includes/footer.php"); ?>