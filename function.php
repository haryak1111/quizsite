<?php

function check_login($con)
{
	if(isset($_SESSION['user_id']))
	{
		$id = $_SESSION['user_id'];
		$query = "select * from login where user_id = '$id' limit 1";
		$result = mysqli_query($con,$query);

		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: main.php");
	die;
}

function random_num($length = 5)
{
	$text = "";
	if ($length < 5)
	{
		//making sure that this will never be less than 5 
		$length = 5;
	}

	$len = rand(4,$length);

	//forloop
	for ($i=0; $i < $len; $i++) { 
		// code...
		if ($i == 0) {
			$text .= rand(1,9);
		}
		else {
			$text .= rand(0,9);
		}
	}
	return $text;
}