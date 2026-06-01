<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once "../db.php";

// Get the data sent from the frontend
$car_id         = $_POST["car_id"];
$customer_name  = $_POST["customer_name"];
$customer_email = $_POST["customer_email"];
$license_number = $_POST["license_number"];
$phone          = $_POST["phone"];
$rental_duration_days = $_POST["rental_duration_days"];
$payment_method = $_POST["payment_method"];
$total_price    = $_POST["total_price"];

// Write the SQL to insert a new booking row
$sql = "INSERT INTO bookings 
        (car_id, customer_name, customer_email, license_number, phone, rental_duration_days, payment_method, total_price) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement — this prevents SQL injection
$stmt = $conn->prepare($sql);

// Bind the variables to the ? placeholders
// "sissisis" means: string, int, string, string, string, int, string, string (one letter per variable)
$stmt->bind_param(
    "ssssisss",
    $car_id,
    $customer_name,
    $customer_email,
    $license_number,
    $phone,
    $rental_duration_days,
    $payment_method,
    $total_price
);

// Run the statement
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Booking saved!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Something went wrong."]);
}

$stmt->close();
$conn->close();
