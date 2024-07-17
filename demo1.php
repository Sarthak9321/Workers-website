<?php

// Connect to the database
$conn = new mysqli("localhost", "root", "", "sedatabase4");

// Fetch the user's area
$sql = "SELECT area FROM users1 ";
$result = $conn->query($sql);

// Get the user's area
$area = $result->fetch_assoc()["area"];

// Get the latitude and longitude coordinates of the area
$url = "https://api.openstreetmap.org/api/geocode/json?address=" . urlencode($area);
$response = file_get_contents($url);
$data = json_decode($response);

$latitude = $data["results"][0]["lat"];
$longitude = $data["results"][0]["lon"];

?>
