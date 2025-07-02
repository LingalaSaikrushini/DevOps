<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "event_registration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$event_date = $_POST['event-date'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO registrations (name, email, phone, event_date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $event_date);

// Execute the statement
if ($stmt->execute()) {
    echo "🎉 Registration successful! We look forward to seeing you at the event.";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
