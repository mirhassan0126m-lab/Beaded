<!-- Admin-panel/delete-category.php -->

<?php
// Include the database connection file
require_once '../includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get the category ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: categories.php');
    exit;
}

// Delete the category from the database
$sql = "DELETE FROM categories WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    header('Location: categories.php');
    exit;
} else {
    echo 'Error deleting category: ' . $conn->error;
}

?>

