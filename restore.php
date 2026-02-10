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

// Restore database
$restore_file = "backups/backup_2023-01-01_00-00-00.sql";
$command = "mysql -h $servername -u $username -p$password $dbname < $restore_file";
system($command, $output);

if ($output == 0) {
    echo "Database restored successfully";
} else {
    echo "Error restoring database: " . $output;
}

$conn->close();
?>
