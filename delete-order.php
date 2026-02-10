<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Delete order
$id = $_GET['id'];
$sql = "DELETE FROM orders WHERE id = $id";
$conn->query($sql);
header('Location: orders.php');
exit;
?>
