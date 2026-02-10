<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get customer
$id = $_GET['id'];
$customer = get_customer($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customer - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="view-customer">
            <h1>View Customer</h1>
            <p>Name: <?php echo $customer['name']; ?></p>
            <p>Email: <?php echo $customer['email']; ?></p>
            <p>Phone: <?php echo $customer['phone']; ?></p>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="../js/script.js"></script>
</body>
</html>
