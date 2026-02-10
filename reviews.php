<!-- Admin-panel/reviews.php -->

<?php
// Include the database connection file
require_once '../includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get the reviews from the database
$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name
