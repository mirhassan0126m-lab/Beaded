<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Delete customer
$id = $_GET['id'];
$sql = "DELETE FROM customers WHERE id = $id";
$conn->query($sql);
header('Location: customers.php');
exit;
?>
