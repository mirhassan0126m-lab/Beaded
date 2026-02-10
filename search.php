<?php
// Get search query
$query = $_GET['query'];

// Get search results
$results = search_products($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Handmade Bracelets by Beadify</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="search-results">
            <h1>Search Results for "<?php echo $query; ?>"</h1>
            <ul>
                <?php foreach ($results as $product) { ?>
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
