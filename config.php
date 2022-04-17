<?php

$hostname = "localhost";
$username = "root"; // change username and password if working with live database. 
$password = "";
$database = ""; // enter name of php database to store in.

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection error")
?>