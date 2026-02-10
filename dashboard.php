<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get dashboard data
$orders_count = get_orders_count();
$products_count = get_products_count();
$customers_count = get_customers_count();
$sales_today = get_sales_today();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="dashboard">
            <h1>Dashboard</h1>
            <div class="stats">
                <div class="stat">
                    <h2>Orders</h2>
                    <p><?php echo $orders_count; ?></p>
                </div>
                <div class="stat">
                    <h2>Products</h2>
                    <p><?php echo $products_count; ?></p>
                </div>
                <div class="stat">
                    <h2>Customers</h2>
                    <p><?php echo $customers_count; ?></p>
                </div>
                <div class="stat">
                    <h2>Sales Today</h2>
                    <p><?php echo $sales_today; ?></p>
                </div>
            </div>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="../js/script.js"></script>
</body>
</html>
