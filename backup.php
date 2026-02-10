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

// Backup database
$backup_file = "backups/backup_" . date("Y-m-d_H-i-s") . ".sql";
$command = "mysqldump -h $servername -u $username -p$password $dbname > $backup_file";
system($command, $output);

if ($output == 0) {
    echo "Database backed up successfully";
} else {
    echo "Error backing up database: " . $output;
}

$conn->close();
?>
