<?php
require_once 'db.php';
session_start();

header('Content-Type: application/json');

$id = intval($_POST['id'] ?? 0);

if ($id <= 0) {
  echo json_encode(['status' => 'error', 'message' => 'Invalid car ID.']);
  exit;
}

// Delete associated bookings first to avoid foreign key errors
$stmt = $conn->prepare("DELETE FROM bookings WHERE car_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Now delete the car
$stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo json_encode(['status' => 'success', 'message' => 'Car deleted successfully.']);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to delete car.']);
}
