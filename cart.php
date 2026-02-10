<?php
// Add product to cart
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    add_to_cart($id, $quantity);
}

// Get cart products
$cart_products = get_cart_products();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="cart">
            <h1>Your Cart</h1>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_products as $product) { ?>
                        <tr>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td>Rs. <?php echo $product['price']; ?></td>
                            <td>Rs. <?php echo $product['total']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p>Total: Rs. <?php echo get_cart_total(); ?></p>
            <a href="checkout.php">Proceed to Checkout</a>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="js/script.js"></script>
</body>
</html>
