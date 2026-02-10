<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Delete product
$id = $_GET['id'];
delete_product($id);
header('Location: products.php');
exit;
?>
