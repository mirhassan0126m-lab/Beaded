<?php
// Get products
$products = get_products();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="products">
            <h1>Our Products</h1>
            <ul>
                <?php foreach ($products as $product) { ?>
                    <li>
                        <a href="product.php?id=<?php echo $product['id']; ?>">
                            <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                            <h2><?php echo $product['name']; ?></h2>
                            <p>Rs. <?php echo $product['price']; ?></p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="js/script.js"></script>
</body>
</html>
