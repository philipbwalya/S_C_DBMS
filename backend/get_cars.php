<?php
// Allow requests from frontend (important for local dev)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
 
// Bring in the database connection
require_once "../db.php";
 
// Query all cars from the database
$sql = "SELECT id, name, image_url, location, price_per_day FROM cars";
$result = $conn->query($sql);
 
// Build an array of cars
$cars = [];
 
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
}
 
// Return as JSON
echo json_encode($cars);
 
$conn->close();
?>
 