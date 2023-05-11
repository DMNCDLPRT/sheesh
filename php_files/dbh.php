<?php
	$server = "localhost";
	$dbusername = "root";
	$pwd = "";
	
	$dbName = "my_db";
	
	// Creating connection
	$conn = mysqli_connect($server, $dbusername, $pwd, $dbName);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}