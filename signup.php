<?php
session_start();
	include("connection.php");
	include("function.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		if(!empty($username) && !empty($password) && !is_numeric($username))
		{
			//save to database
			$user_id = random_num(20);
			$query = "insert into login (user_id,username,password) values ('$user_id','$username','$password')";
			mysqli_query($con, $query);

			header("Location: login.php");
			die;

		}else
		{
			echo "please Enter some valid Information!";
		}
	}

?>

<!Doctype html>
	<html>
	<head>
		<title>Signup</title>
	</head>
	<body>
		<style type="text/css">
			#text{
				height: 25px;
				border-radius: 5px;
				padding: 4px;
				border: solid thin #aaa;
				width: 100%;
			}
			#button{
				padding: 10px;
				width: 100px;
				color: white;
				background-color: lightblue;
				border: none;
			}
			#box{
				background-color: grey;
				margin: auto;
				width: 300px;
				padding: 20px;
			}
		</style>
		<div id="box">

			<form method="post">
				<div>Signup</div>
				<p>Username<input id="text" type="text" name="username"><br><br></p>
				<p>Password<input id="text" type="password" name="password"><br><br></p>

				<input id="button" type="submit" value="Signup"><br><br>

				<a href="login.php"><b>Click to Login</b></a><br><br>
			</form>
		</div>
	</body>