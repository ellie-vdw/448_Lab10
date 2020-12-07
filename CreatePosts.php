<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "ellenvandewate", "raoThah7","ellenvandewate");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$username = $_POST["username"];	
	$content = $_POST["content"];
	$query = "SELECT user_id FROM Users WHERE user_id = '$username'";
	$results = $mysqli->query($query);
	if($username == ""){ echo "Please enter a username<br>";}
	else if($results->num_rows == 0){
		echo "Username not found, please try again or create an account";
		$results->free();
	}
	else
	{
		if($content == ""){ echo "Post box is empty please type something and then submit";}
		else{
			$query = "INSERT INTO Posts (content, author_id) VALUES ('$content','$username')";
			if($mysqli->query($query) === TRUE){
				echo "New record created successfully";
			}
			else {
				echo "Error: " . $query . "<br>" . $mysqli->error;
			}
		}
	}
	$mysqli->close();
?>	