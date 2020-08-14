<?php

	$servername = "localhost"; //
	$username = "root"; //id10868417_makna
	$password = ""; //makna
	$database = "ks_pctracker";//id10868417_ks_pctracker

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
?>
