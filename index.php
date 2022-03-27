<?php
	session_start();
	include("connection.php"); //check server connectivity
	include("function.php"); //import functionalities

	if ($_SERVER['REQUEST_METHOD'] == "POST") //Check if post called
	{
		$Debugmode = true;
		$username = $_POST['username']; 
		$password = $_POST['password']; 
		//Grab user details off $_POST
	
		if(!empty($username) && !empty($password) && !is_numeric($username)) //check if user details are complete
		{
			//read from the database
			$query = "select * from login where username = '$username' limit 1";
			$preppedq = $con->prepare("select * from login where username = ? limit 1");
			$preppedq->bind_param("s", $username);
			$preppedq->execute();
			$preppedq->store_result();
			$result = $preppedq->bind_result($out_id, $out_userid, $out_username, $out_password, $out_date);
			$preppedq->fetch();

			if ($Debugmode) echo "<script>console.log('result: ",$result,"');</script>";
			if ($Debugmode) echo "<script>console.log('rows: ",$preppedq->num_rows(),"');</script>";
			
			if ($Debugmode) echo "<script>console.log('out_id: ",$out_id,"');</script>";
			if ($Debugmode) echo "<script>console.log('out_userid: ",$out_userid,"');</script>";
			if ($Debugmode) echo "<script>console.log('out_username: ", $out_username,"');</script>";
			if ($Debugmode) echo "<script>console.log('out_password: ",$out_password,"');</script>";
			if ($Debugmode) echo "<script>console.log('out_date: ",$out_date,"');</script>";

			if($result && $preppedq->num_rows() > 0)
			{
				if($out_password == $password)
				{
					$_SESSION['user_id'] = $out_userid;
					header("Location: main.php");
					die;
				}
			}
			echo "you've enter a wrong password or username"; //Emergency meeting. Sus.
		}
		else { //complain that the user details aren't complete
			echo "please Enter some valid Information!";
		}
	}
?>

<!Doctype html>
<html>

<head>
	<title>Login</title>
</head>

<body>
	<style type="text/css">
		#text {
			height: 25px;
			border-radius: 5px;
			padding: 4px;
			border: solid thin #aaa;
			width: 100%;
		}

		#button {
			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
		}

		#box {
			background-color: grey;
			margin: auto;
			width: 300px;
			padding: 20px;
		}
	</style>
	<div class="fullscreen">
		<div id="box">

			<form method="post">
				<div>Log-In</div>
				<p>Username<input id="text" type="text" name="username"><br><br></p>
				<p>Password<input id="text" type="password" name="password"><br><br></p>

				<input id="button" type="submit" value="Login"><br><br>

				<a href="signup.php" style="font-weight: bold;">Click to Signup</a><br><br>
			</form>
		</div>
</body>