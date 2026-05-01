<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once "../db.php";

// Get the data sent from the frontend
$email   = $_POST["email"];
$message = $_POST["message"];

// Write the SQL to insert a new message row
$sql = "INSERT INTO contact_messages (email, message) VALUES (?, ?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the variables — "ss" means both are strings
$stmt->bind_param("ss", $email, $message);

// Run the statement
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Message sent!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Something went wrong."]);
}

$stmt->close();
$conn->close();
?>