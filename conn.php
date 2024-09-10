<?php
$host="localhost";
$username="root";
$password="";  // Your server password
$dbname="libDB";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
