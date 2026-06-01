<?php
require_once '../db.php';
session_start();

header('Content-Type: application/json');

$result = $conn->query("
    SELECT 
        b.id,
        c.name AS car_name,
        b.customer_name,
        b.customer_email,
        b.phone,
        b.rental_duration_days,
        b.total_price
    FROM bookings b
    JOIN cars c ON b.car_id = c.id
    ORDER BY b.id DESC
");

$bookings = [];
while ($row = $result->fetch_assoc()) {
  $bookings[] = $row;
}

echo json_encode($bookings);
