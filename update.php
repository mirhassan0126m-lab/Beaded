<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beadify";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update products table
$sql = "ALTER TABLE products ADD COLUMN IF NOT EXISTS stock INT NOT NULL DEFAULT 0";
if ($conn->query($sql) === TRUE) {
    echo "Table products updated successfully";
} else {
    echo "Error updating table: " . $conn->error;
}

// Update orders table
$sql = "ALTER TABLE orders ADD COLUMN IF NOT EXISTS payment_method VARCHAR(255) NOT NULL DEFAULT 'PayPal'";
if ($conn->query($sql) === TRUE) {
    echo "Table orders updated successfully";
} else {
    echo "Error updating table: " . $conn->error;
}

// Update customers table
$sql = "ALTER TABLE customers ADD COLUMN IF NOT EXISTS address TEXT NOT NULL";
if ($conn->query($sql) === TRUE) {
    echo "Table customers updated successfully";
} else {
    echo "Error updating table: " . $conn->error;
}

$conn->close();
?>
