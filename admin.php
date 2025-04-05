<?php
// Start session (if needed)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include database connection file
include 'db_connect.php'; 

// Hash the password
$admin_password = password_hash("Admin@123", PASSWORD_DEFAULT);

// SQL query to insert admin details
$sql = "INSERT INTO users (name, email, password, phone, role) 
        VALUES ('Admin', 'admin@gmail.com', ?, '7416463622', 'admin')";

// Prepare the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $admin_password);

// Execute the query
if ($stmt->execute()) {
    echo "Admin account created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
