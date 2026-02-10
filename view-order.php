<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get order
$id = $_GET['id'];
$order = get_order($id);
$customer = get_customer($order['customer_id']);
$order_items = get_order_items($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="view-order">
            <h1>View Order</h1>
            <p>Order ID: <?php echo $order['id']; ?></p>
            <p>Customer: <?php echo $customer['name']; ?></p>
            <p>Order Date: <?php echo $order['order_date']; ?></p>
            <p>Total: <?php echo $order['total']; ?></p>
            <p>Status: <?php echo $order['status']; ?></p>
            <h2>Order Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_items as $item) { ?>
                        <tr>
                            <td><?php echo get_product($item['product_id'])['name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form action="update-order-status.php" method="post">
                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
                <input type="submit" value="Update Status">
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
