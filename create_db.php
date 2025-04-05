<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS classified_db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db("classified_db");

// Create users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully<br>";
} else {
    echo "Error creating 'users' table: " . $conn->error;
}

// Create ads table
$sql = "CREATE TABLE IF NOT EXISTS ads (
    ad_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT DEFAULT NULL,
    category VARCHAR(100) DEFAULT NULL,
    image_url VARCHAR(255) DEFAULT NULL,
    status ENUM('active', 'inactive', 'pending') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    price DECIMAL(10,2) DEFAULT 0.00,
    location VARCHAR(255) DEFAULT NULL,
    contact_info VARCHAR(255) DEFAULT NULL,
    views INT(11) DEFAULT 0,
    expiry_date DATETIME DEFAULT NULL,
    is_featured TINYINT(1) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'ads' created successfully<br>";
} else {
    echo "Error creating 'ads' table: " . $conn->error;
}

$conn->close();
?>
