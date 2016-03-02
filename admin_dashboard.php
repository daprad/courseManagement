<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php include("includes/header.php"); ?>
<table id="structure">
	<tr>
		<td id="navigation">
			<ul>
			  <li><a class="active" href="admin_dashboard.php">Home</a></li>
			  <li><a href="admin_dashboard.php?prof">Proffesor</a></li>
			  <li><a href="admin_dashboard.php?student">Student</a></li>
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