<?php
require_once '../db.php';
session_start();

header('Content-Type: application/json');

$id = $_GET['id'];

if (!$id) {
  echo json_encode(['success' => false, 'message' => 'Id is required.']);
  exit;
}

$stmt = $conn->prepare("SELECT id, name, location, price_per_day FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$car = $result->fetch_assoc();

echo json_encode($car ?: []);
