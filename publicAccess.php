<?php

// is logged in
if (isset($_GET["isLoggedIn"])) {
	if (isset($_SESSION['logged_in'])) {
		echo $_SESSION['logged_in'];
	} else {
		echo 0;
	}
}
?>
