<?php
$host = "localhost";
$user = "root"; // Change this if you have a different MySQL username
$pass = ""; // Change this if you have a password
$dbname = "classified_db";

// Create connection
$conn = new mysqli($host, $user, $pass);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist (without echoing anything)
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql); // No echo

// Select the database
$conn->select_db($dbname);
?>
