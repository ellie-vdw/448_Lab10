<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "ellenvandewate", "raoThah7","ellenvandewate");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	$username = $_POST['username'];
	$query = "SELECT * FROM Posts WHERE author_id = '$username'";
	$result = $mysqli->query($query);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "post_id: " . $row["post_id"]. " author_id: " . $row["author_id"]. " Content " . $row["content"]. "<br>";
		}
	} 
	else {
		echo "0 results";
	}
	$mysqli->close();
?>