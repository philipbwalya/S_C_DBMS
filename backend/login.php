<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

session_start();

require_once "../db.php";

$email    = $_POST["email"];
$password = $_POST["password"];

// Find the user by email
$sql  = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user   = $result->fetch_assoc();

// Check if user exists and password matches
if ($user && password_verify($password, $user["password"])) {
  $_SESSION["user_id"]  = $user["id"];
  $_SESSION["username"] = $user["username"];
  echo json_encode(["status" => "success", "message" => "Login successful!"]);
} else {
  echo json_encode(["status" => "error", "message" => "Invalid email or password."]);
}

$stmt->close();
$conn->close();
