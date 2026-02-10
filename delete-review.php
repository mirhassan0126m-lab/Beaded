<!-- Admin-panel/delete-review.php -->

<?php
// Include the database connection file
require_once '../includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get the review ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: reviews.php');
    exit;
}

// Delete the review from the database
$sql = "DELETE FROM reviews WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header('Location: reviews.php');
    exit;
} else {
    echo 'Error deleting review: ' . $conn->error;
}

?>

