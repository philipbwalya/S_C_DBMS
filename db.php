<?php
// Database configuration
$host = "localhost";
$dbname = "car_rental";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set character set to utf8
$conn->set_charset("utf8");

// Success message (for testing, comment out in production)
// echo "Connected successfully";
