<?php
$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password
$dbname = "perpani"; // Database name

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch images from the event table
$sql = "SELECT gambar FROM event";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    // Store images in an array
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['gambar'];
    }
}

$conn->close();

// Return images as JSON
echo json_encode($images);
?>