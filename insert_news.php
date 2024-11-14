<?php
session_start();
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $title = $_POST['news-title'];
    $content = $_POST['news-content'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO berita (judul, isi) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New news article added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

// Redirect back to the dashboard (optional)
header("Location: AdminDashboard.php");
exit();
?>