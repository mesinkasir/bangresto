<?php
	require("config.php");
	$sqlconnection = new mysqli($servername, $username, $password,$dbname);
	if ($sqlconnection->connect_error) {
    	die("Connection failed: " . $sqlconnection->connect_error);
	}
	
?>