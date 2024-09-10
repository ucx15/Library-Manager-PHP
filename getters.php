<?php


// get current username
if (isset($_GET['getuname'])) {
	echo $_SESSION['uname'];
}

// Get current ID of selected table
if (isset($_GET["getCurrentID"])) {
	$table = ($_GET["geteCurrentID"]);
	$queryGetCurrentID = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
	$result = $conn->query($queryGetCurrentID);
	$row = $result->fetch_assoc();

	if (!$row) {
		echo 0;
	} else {
		echo $row['id'];
	}
}
