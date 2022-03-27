<?php
session_start();
	include("connection.php");
	include("function.php");

	$user_data = check_login($con);
?>
<!Doctype html>
<head>
	<title>Quiz</title>
	<link rel="stylesheet" href="./main.css">
</head>
<body>

	<div class="bar-top">
		<div class="minititle"><h2 style="margin: 0">Mini-title</h2></div>
		<div class="logout-display"><a href="logout.php"><h3 style="margin: 0">Logout</h3></a></div>
	</div>
	
	<h1>Main Page</h1>
	<br>
	Welcome, Mr/Ms <?php echo $user_data['username']; ?>

	<hr>

	<div>
		<div></div>
		<div></div>
	</div>
</body>