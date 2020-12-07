<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "ellenvandewate", "raoThah7","ellenvandewate");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	if(!empty($_POST['box'])){
		foreach($_POST['box'] as $box){
			echo "post_id: $box";
			$query = "DELETE FROM Posts WHERE post_id='$box'";
			if($mysqli->query($query) === TRUE){
				echo " Record deleted successfully<br>";
			}
			else {
				echo "Error: " . $query . "<br>" . $mysqli->error;
			}
		}
	}
	else
	{
		echo "Nothing was selected";
	}
	$mysqli->close();
?>