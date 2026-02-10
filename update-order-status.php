<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Update order status
$id = $_POST['id'];
$status = $_POST['status'];
update_order_status($id, $status);
header('Location: orders.php');
exit;
?>
