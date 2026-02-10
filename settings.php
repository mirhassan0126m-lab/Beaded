<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get settings
$settings = get_settings();

// Update settings
if (isset($_POST['update_settings'])) {
    $site_title = $_POST['site_title'];
    $site_description = $_POST['site_description'];
    update_setting('site_title', $site_title);
    update_setting('site_description', $site_description);
    header('Location: settings.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="settings">
            <h1>Settings</h1>
            <form action="" method="post">
                <label for="site_title">Site Title:</label>
                <input type="text" id="site_title" name="site_title" value="<?php echo $settings['site_title']; ?>"><br><br>
                <label for="site_description">Site Description:</label>
                <textarea id="site_description" name="site_description"><?php echo $settings['site_description']; ?></textarea><br><br>
                <input type="submit" name="update_settings" value="Update Settings">
            </form>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="../js/script.js"></script>
</body>
</html>
