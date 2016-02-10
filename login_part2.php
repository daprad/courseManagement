<!DOCTYPE html>
<html>
<head>
	<title>PHP simple login</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
    rel="stylesheet">
  

</head>
<body>
<?php 
	$result=mysql_connect( "localhost","root","")or die("cannot connect");
	if (!$result) {
		return false;
	}
	if (!mysql_select_db('coursemng',$result)){
		return false;
	}
	$conn= $result;

	if(isset($_POST['register'])){
		// clean strings and escape unwanted charecter by mysql_escape_string 
		echo "flag1";
		$email_id = mysql_escape_string($_POST['email']); 
		$password1 = mysql_real_escape_string($_POST['pass1']);
		$password2 = mysql_real_escape_string($_POST['pass2']);
		$username = mysql_real_escape_string($_POST['username']);
		$fname = mysql_real_escape_string($_POST['fname']);
		$lname  = mysql_real_escape_string($_POST['lname']);
		$dob = mysql_real_escape_string($_POST['dob']);
		$user_type = $_POST['user_type'];

		echo "flag2\n";
		print $email_id;
		print $password1;
		print $username;
		print $fname;
		print $lname;
		print $dob;
		print $user_type;

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

		echo "flag3";

		$result = mysql_query($sql,$conn);
		$rowcount=mysql_num_rows($result);
		echo $rowcount;
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
			print $result;
		}
		echo "flag4";
	}
	echo "hello2";
	

	if(isset($_POST['LOGIN']))
	{

		echo "hello";
		$username = mysql_escape_string($_POST['username']); 
		$pass = mysql_real_escape_string($_POST['password']);
		$user_type = $_POST['user_type'];

		print $username;
		print $pass;
		print $user_type;

		$msg = "";
		//$sql = "SELECT * FROM user where username = '$username' and password = '$pass' "; 

		if(strcmp($user_type,"Student")==0){
			$sql = "SELECT * FROM `student` where username = '$username' and password = '$pass' "; 
		}
		elseif (strcmp($user_type,"Professor")==0) {
			$sql = "SELECT * FROM `professor` where username = '$username' and password = '$pass' "; 
		}

		elseif (strcmp($user_type,"Parent")==0) {
			$sql = "SELECT * FROM `parent` where username = '$username' and password = '$pass' "; 
		}

		if($result = mysql_query($sql,$conn)){
			$msg = "USER registered succesfully";
		}

		// check email and password are correct or not
		$result = mysql_query($sql,$conn);
		$rowcount=mysql_num_rows($result);
		if($rowcount == 0){
			// means either email does not exist or password is wrong  
			$msg = "Invalid credentials";
			 
		}else{
			// Start the session
			session_start();
			echo "hello";	
			// Set session variables
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			$_SESSION["Student_id"] = $row['Student_id'];

			//echo $_SESSION["email"];
			// go to protected success page
			header('Location: success.php');
		}

	}
?>

<div class="container">
	<div class="row">
		<h2 class="bg-info">
			<?php if(isset($msg)){
				echo $msg;
				} ?>
		</h2>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			<h1> Login  Here </h1>
			<form action="" method="post">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1" name="pass">Password</label>
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			  </div>
				
				<div class="form-group">
			    <label for="exampleusertype1">Select your category </label>
			     <input type="radio" name="user_type" value="Student" checked> Student<br>
				 <input type="radio" name="user_type" value="Professor"> Professor<br>
				 <input type="radio" name="user_type" value="Parent"> Parent
			    </div>

			  <button type="submit" class="btn btn-success" name="LOGIN">Login</button>
			</form>
		</div>
		<div class="col-sm-6">
			<h1> Register  Here </h1>
			<form action="" method="post">
				<div class="form-group">
			    <label for="exampleInputusername1">Username</label>
			    <input type="text" name="username" class="form-control" id="exampleInputusername1" placeholder="username" required>
		  		</div>

		  		<div class="form-group">
			    <label for="exampleInputfname1">Firstname</label>
			    <input type="text" name="fname" class="form-control" id="exampleInputfname1" placeholder="fname" required>
			  </div>

			  	<div class="form-group">
			    <label for="exampleInputlname1">Lastname</label>
			    <input type="text" name="lname" class="form-control" id="exampleInputlname1" placeholder="lname" required>
			  </div>

			  	<div class="form-group">
			    <label for="exampleInputdob1">Date of Birth</label>
			    <input type="Date" name="dob" class="form-control" id="exampleInputdob1" placeholder="dob" required>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="pass1" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			  </div>

			   <div class="form-group">
			    <label for="exampleInputPassword1">Re-enter Password</label>
			    <input type="password" name="pass2" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			  </div>
				
				<div class="form-group">
			    <label for="exampleusertype1">Register As</label>
			     <input type="radio" name="user_type" value="Student" checked> Student<br>
				 <input type="radio" name="user_type" value="Professor"> Professor<br>
				 <input type="radio" name="user_type" value="Parent"> Parent
			    </div>

			  <button type="submit" class="btn btn-info" name="register">Register</button>
			</form>
		</div>
	</div>


</div>


</body>
</html>

