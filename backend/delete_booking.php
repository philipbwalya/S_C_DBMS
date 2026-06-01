<?php
require_once '../db.php';
session_start();

header('Content-Type: application/json');

$id = intval($_POST['id'] ?? 0);

if ($id <= 0) {
  echo json_encode(['status' => 'error', 'message' => 'Invalid booking ID.']);
  exit;
}

$stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo json_encode(['status' => 'success', 'message' => 'Booking deleted successfully.']);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Failed to delete booking.']);
}
