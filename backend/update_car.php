<?php
require_once '../db.php';
session_start();

header('Content-Type: application/json');

$id  = $_POST['id'];
$name = $_POST['name'];
$location = $_POST['location'];
$price_per_day = $_POST['price_per_day'];

if ($id <= 0 || !$name || !$location || $price_per_day <= 0) {
  echo json_encode(['status' => 'error', 'message' => 'Invalid input.']);
  exit;
}

$stmt = $conn->prepare("UPDATE cars SET name = ?, location = ?, price_per_day = ? WHERE id = ?");
$stmt->bind_param("ssdi", $name, $location, $price_per_day, $id);

if ($stmt->execute()) {
  echo json_encode(['status' => 'success', 'message' => 'Car updated successfully!']);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to update car.']);
}
