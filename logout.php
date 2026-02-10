<?php
// Check if user is logged in
if (isset($_SESSION['admin_id'])) {
    unset($_SESSION['admin_id']);
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
