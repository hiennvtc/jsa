<?php
	$servername= "localhost";
	$username = "root";
	$password = "";
	$jsadb = "jobsafetyanalysis";
	//connect to mysql
	$conn = new mysqli($servername, $username, $password, $jsadb);
	
	//check the connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>