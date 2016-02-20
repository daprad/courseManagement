<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>

<?php 

	if(isset($_POST['register'])){
		// clean strings and escape unwanted charecter by mysql_escape_string 
		$email_id = mysql_escape_string($_POST['email']); 
		$password1 = mysql_real_escape_string($_POST['pass1']);
		$password2 = mysql_real_escape_string($_POST['pass2']);
		$username = mysql_real_escape_string($_POST['username']);
		$fname = mysql_real_escape_string($_POST['fname']);
		$lname  = mysql_real_escape_string($_POST['lname']);
		$dob = mysql_real_escape_string($_POST['dob']);
		$user_type = $_POST['user_type'];

		$msg = '';
		$flag = 0;
		if(strcmp($password1, $password2)){
			$msg = "Passwords does not match";
			$flag = 1; // set flag = 1; if password does not match 
		}

		//$sql = "SELECT * FROM user where username = '$username' "; // check username exists or not

		if(strcmp($user_type,"Student")==0){
			$sql = "SELECT * FROM student where username = '$username' "; 
		}
		elseif (strcmp($user_type,"Professor")==0) {
			$sql = "SELECT * FROM professor where username = '$username' "; 
		}
		elseif (strcmp($user_type,"Parent")==0) {
			$sql = "SELECT * FROM parent where username = '$username' "; 
		}

		//echo "flag3";

		$result = mysql_query($sql,$conn);
		$rowcount=mysql_num_rows($result);
		//echo $rowcount;
		if($rowcount >= 1){
			// means there is an entry in database with same email.
			$msg = "username alredy exists";
			$flag = 1; // set flag = 1 , if user already exits 
		}
		if($flag == 0){
			// means password matches and email doesnot exist in database 
			// make a new entry in database 
			if(strcmp($user_type,"Student")==0){
				$sql = "INSERT INTO `student`(`Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`) VALUES ('$fname','$lname','$email_id','$username','$password1','$dob')";
			}
			elseif (strcmp($user_type,"Professor")==0) {
				$sql = "INSERT INTO `professor`(`Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`) VALUES ('$fname','$lname','$email_id','$username','$password1','$dob')";
			}

			elseif (strcmp($user_type,"Parent")==0) {
				$sql = "INSERT INTO `parent`(`Firstname`, `Lastname`, `email_id`, `username`, `password`, `DOB`) VALUES ('$fname','$lname','$email_id','$username','$password1','$dob')";
			}

			if($result = mysql_query($sql,$conn)){
				$msg = "USER registered succesfully";
			}
			//print $result;
		}
		//echo "flag4";
		$_SESSION['message'] = $msg;
		header('Location: reg_success.php');
		//echo $msg;
	}

	if(isset($_POST['LOGIN']))
	{

		//echo "hello";
		$username = mysql_escape_string($_POST['username']); 
		$pass = mysql_real_escape_string($_POST['password']);
		$user_type = $_POST['user_type'];

		$msg = "";
		$id_type = "";

		if(strcmp($user_type,"Student")==0){
			$id_type = 'Student_id';
			$sql = "SELECT * FROM `student` where username = '$username' and password = '$pass' "; 
		}
		elseif (strcmp($user_type,"Professor")==0) {
			$id_type = 'Professor_id';
			$sql = "SELECT * FROM `professor` where username = '$username' and password = '$pass' "; 
		}
		elseif (strcmp($user_type,"Parent")==0) {
			$id_type = 'Parent_id';
			$sql = "SELECT * FROM `parent` where username = '$username' and password = '$pass' "; 
		}

		if($result = mysql_query($sql,$conn)){
			$msg = "LOGIN SUCCESSFUL";
		}

		// check email and password are correct or not
		$result = mysql_query($sql,$conn);
		$rowcount=mysql_num_rows($result);
		if($rowcount == 0)
		{
			// means either email does not exist or password is wrong  
			$msg = "Invalid credentials";
			header('Location: error.php');
			//echo $msg;
			 
		}
		else
		{
			// Start the session
			
				
			// Set session variables
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			//echo "Hello User ".$row['Student_id']."</br>";

			$_SESSION["User_id"] = $row[$id_type];
			$_SESSION["User_type"] = $user_type;

			header('Location: dashboard.php');
			// echo $_SESSION['User_id'];
			// echo $_SESSION['User_type'];
		}

	}

?>

<?php 
	if(isset($conn))
	{
		mysql_close($conn);	
	}
?>