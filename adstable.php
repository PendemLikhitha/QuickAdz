<?php
$host = "localhost";
$user = "root"; // Change if needed
$pass = ""; // Change if you have a password
$dbname = "classified_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create the `ads` table
$sql = "CREATE TABLE IF NOT EXISTS ads (
    ad_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    image_url VARCHAR(255),
    status ENUM('active', 'inactive', 'pending') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    price DECIMAL(10,2) DEFAULT 0.00,
    location VARCHAR(255),
    contact_info VARCHAR(255),
    views INT DEFAULT 0,
    expiry_date DATETIME,
    is_featured TINYINT(1) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'ads' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
