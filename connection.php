<?php 
$dbhost="testserverino.mysql.database.azure.com";
$dbuser="groot";
$dbpass="Rooterino123";
$dbname="quiz";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}