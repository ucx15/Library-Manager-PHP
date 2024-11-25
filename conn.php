<?php

$ENV = parse_ini_file(".env");

$host="localhost";
$username="root";
$password=$ENV["SQL_PASS"];  // Your server password
$dbname="libDB";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
