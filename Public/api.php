<?php
session_start();


// LOGIN
if (isset($_POST["loginSubmit"])) {
	include "../login.php"; 
}


include "../publicAccess.php";


if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
	// GETTERS
	include "../getters.php";

	// ACTIONS
	include "../actions.php";
}


else {
	header("HTTP/1.1 403 Forbidden");
	echo "Login to access the API";
}