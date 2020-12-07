<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "ellenvandewate", "raoThah7","ellenvandewate");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$username = $_POST["username"];
	$query = "SELECT user_id FROM Users WHERE user_id = '$username'";
	$results = $mysqli->query($query);
	if($username == ""){ echo "Please enter a username<br>";}
	else if($results->num_rows > 0){
		echo "Username already taken. Please try again";
		$results->free();
	}
	else
	{
		$query = "INSERT INTO Users (user_id) VALUES ('$username')";
		if($mysqli->query($query) === TRUE){
			echo "New record created successfully";
		}
		else {
			echo "Error: " . $query . "<br>" . $mysqli->error;
		}
	}
	$mysqli->close();
?>	