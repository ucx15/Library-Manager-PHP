<?php
$uname = $_POST['uname'];
$psw = $_POST['psw'];

$newLocation = "Location: index.html";

if ($uname == "uc" && $psw == "uc") {
	$_SESSION['logged_in'] = true;
	$_SESSION['uname'] = $uname;

	$newLocation = "Location: interface.html";
}
header($newLocation);
