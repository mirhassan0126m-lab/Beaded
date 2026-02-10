<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get product
$id = $_GET['id'];
$product = get_product($id);

// Update product
if (isset($_POST['update_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    if ($image) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        $image = $product['image'];
    }
    update_product($id, $name, $price, $description, $image);
    header('Location: products.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="edit-product">
            <h1>Edit Product</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>"><br><br>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br><br>
                <label for="description">Description:</label>
                <textarea id="description" name="description"><?php echo $product['description']; ?></textarea><br><br>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image"><br><br>
                <img src="../uploads/<?php echo $product['image']; ?>" width="100" height="100"><br><br>
                <input type="submit" name="update_product" value="Update Product">
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
