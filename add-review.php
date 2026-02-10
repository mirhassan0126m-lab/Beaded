<!-- Admin-panel/add-review.php -->

<?php
// Include the database connection file
require_once '../includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get the products from the database
$sql = "SELECT * FROM products";
$products = $conn->query($sql);

// Get the users from the database
$sql = "SELECT * FROM users";
$users = $conn->query($sql);

// Check if the form is submitted
if (isset($_POST['add_review'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Validate the input
    if (empty($product_id) || empty($user_id) || empty($rating) || empty($review)) {
        $error = 'Please fill in all fields';
    } else {
        // Insert the review into the database
        $sql = "INSERT INTO reviews (product_id, user_id, rating, review) VALUES ('$product_id', '$user_id', '$rating', '$review')";
        if ($conn->query($sql) === TRUE) {
            header('Location: reviews.php');
            exit;
        } else {
            $error = 'Error adding review: ' . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Review - Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <h1>Add Review</h1>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="" method="post">
            <label for="product_id">Product:</label>
            <select id="product_id" name="product_id">
                <?php while ($product = $products->fetch_assoc()) { ?>
                    <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
                <?php } ?>
            </select><br><br>
            <label for="user_id">User:</label>
            <select id="user_id" name="user_id">
                <?php while ($user = $users->fetch_assoc()) { ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                <?php } ?>
            </select><br><br>
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5"><br><br>
            <label for="review">Review:</label>
            <textarea id="review" name="review"></textarea><br><br>
            <input type="submit" name="add_review" value="Add Review">
        </form>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->
</body>
</html>
