<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once "../db.php";

$username = $_POST["username"];
$email    = $_POST["email"];
$password = $_POST["password"];

// Hash the password before saving
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashed_password);

if ($stmt->execute()) {
  echo json_encode(["status" => "success", "message" => "Account created!"]);
} else {
  echo json_encode(["status" => "error", "message" => "User already exists."]);
}

$stmt->close();
$conn->close();
