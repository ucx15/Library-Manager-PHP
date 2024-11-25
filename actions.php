<?php

// Submit Add Form
if (isset($_GET['addForm'])) {
	include 'conn.php';

	$formType = $_GET['addForm'];

	if ($formType == "add-book") {
		$bookTitle     = $_GET['name'];
		$bookAuthor    = $_GET['author'];
		$bookPublisher = $_GET['publisher'];
		$bookYear      = $_GET['year'];

		$sql = "INSERT INTO Books (title, author, publisher, year) VALUES ('$bookTitle', '$bookAuthor', '$bookPublisher', '$bookYear')";

	} else if ($formType == "add-member") {
		$memberName    = $_GET['name'];
		$memberEmail   = $_GET['email'];
		$memberPhone   = $_GET['phone'];
		$memberAddress = $_GET['address'];
		$memberIssues = "0";

		$sql = "INSERT INTO Members (name, email, phone, address, issues) VALUES ('$memberName', '$memberEmail', '$memberPhone', '$memberAddress', '$memberIssues')";
	}

	if (! $conn->query($sql)) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

// LOGOUT
if (isset($_GET["logout"])) {
	session_destroy();
	echo 1;            // What ??
}

// APP
if (isset($_GET["initApp"])) {
include 'conn.php';

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS libDB";

	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Error creating database: " . $conn->error;
	}

	$conn->query("USE libDB");


	// Create Table - Members
	$sql = "CREATE TABLE IF NOT EXISTS Members (
		id INT AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		email VARCHAR(50) NOT NULL,
		phone VARCHAR(15) NOT NULL,
		address VARCHAR(250) NOT NULL,
		issues VARCHAR(30) NOT NULL
	)";

	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Error creating table: " . $conn->error;
	}

	// Create Table - Books
	$sql = "CREATE TABLE IF NOT EXISTS Books (
		id INT AUTO_INCREMENT PRIMARY KEY,
		title VARCHAR(50) NOT NULL,
		author VARCHAR(30) NOT NULL,
		publisher VARCHAR(30) NOT NULL,
		year VARCHAR(8) NOT NULL
	)";

	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Error creating table: " . $conn->error;
	}

	$conn->close();
	echo "DataBase initialized";
}

// Fetch Tables from DB
if (isset($_GET["fetchTable"])) {
	include 'conn.php';

	$queryFetchTable = "SELECT * FROM members ORDER BY id DESC";

	if ($_GET["fetchTable"] == "table-books") {
		$queryFetchTable = "SELECT * FROM books ORDER BY id DESC";
	}

	$fetchedObj = $conn->query($queryFetchTable);
	$table = $fetchedObj->fetch_all(MYSQLI_ASSOC);

	if (!$table) {
		echo "{}";
	} else {
		echo json_encode($table);
	}
}
