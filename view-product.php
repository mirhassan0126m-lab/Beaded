<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get product
$id = $_GET['id'];
$product = get_product($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="view-product">
            <h1>View Product</h1>
            <p>Name: <?php echo $product['name']; ?></p>
            <p>Price: <?php echo $product['price']; ?></p>
            <p>Description: <?php echo $product['description']; ?></p>
            <img src="../uploads/<?php echo $product['image']; ?>" width="200" height="200">
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="../js/script.js"></script>
</body>
</html>
