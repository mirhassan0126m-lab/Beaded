<?php
// Get cart products
$cart_products = get_cart_products();

// Get cart total
$cart_total = get_cart_total();

// Place order
if (isset($_POST['place_order'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    place_order($name, $email, $address);
    header('Location: thank-you.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="checkout">
            <h1>Checkout</h1>
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>
                <label for="address">Address:</label>
                <textarea id="address" name="address"></textarea><br><br>
                <h2>Order Summary</h2>
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
                <p>Total: Rs. <?php echo $cart_total; ?></p>
                <input type="submit" name="place_order" value="Place Order">
            </form>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="js/script.js"></script>
</body>
</html>
