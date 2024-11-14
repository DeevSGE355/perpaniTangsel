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
    $name = $_POST['sponsor-name'];
    
    // Handle file upload
    if (isset($_FILES['sponsor-logo']) && $_FILES['sponsor-logo']['error'] == 0) {
        $target_dir = "Image/"; // Directory to save the uploaded image
        $target_file = $target_dir . basename($_FILES["sponsor-logo"]["name"]);
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["sponsor-logo"]["tmp_name"], $target_file)) {
            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO sponsors (name, logo_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $target_file); // "ss" means two string parameters

            // Execute the statement
            if ($stmt->execute()) {
                echo "New sponsor added successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Close the connection
$conn->close();

// Redirect back to the dashboard (optional)
header("Location: AdminDashboard.php");
exit();
?>