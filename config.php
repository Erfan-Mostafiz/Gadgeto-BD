<?php
ob_start(); //Turns on output buffering 
session_start();

$timezone = date_default_timezone_set("Asia/Dhaka");

$con = mysqli_connect("localhost", "root", "", "gadget-bd"); //Connection variable

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>