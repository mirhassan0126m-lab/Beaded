<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Update settings
$site_title = $_POST['site_title'];
$site_description = $_POST['site_description'];
update_setting('site_title', $site_title);
update_setting('site_description', $site_description);
header('Location: settings.php');
exit;
?>
