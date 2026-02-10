<!-- Admin-panel/edit-review.php -->

<?php
// Include the database connection file
require_once '../includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get the review ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: reviews.php');
    exit;
}

// Get the review from the database
$sql = "SELECT * FROM reviews WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
    header('Location: reviews.php');
    exit;
}
$review = $result->fetch_assoc();

// Get the products from the database
$sql = "SELECT * FROM products";
$products = $conn->query($sql);

// Get the users from the database
$sql = "SELECT * FROM users";
$users = $conn->query($sql);

// Check if the form is submitted
if (isset($_POST['edit_review'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review'];

    // Validate the input
    if (empty($product_id) || empty($user_id) || empty($rating) || empty($review_text)) {
        $error = 'Please fill in all fields';
    } else {
        // Update the review in the database
        $sql = "UPDATE reviews SET product_id = '$product_id', user_id = '$user_id', rating = '$rating', review = '$review_text' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            header('Location: reviews.php');
            exit;
        } else {
            $error = 'Error updating review: ' . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review - Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <h1>Edit Review</h1>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="" method="post">
            <label for="product_id">Product:</label>
            <select id="product_id" name="product_id">
                <?php while ($product = $products->fetch_assoc()) { ?>
                    <option value="<?php echo $product['id']; ?>" <?php if ($product['id'] == $review['product_id']) echo 'selected'; ?>><?php echo $product['name']; ?></option>
                <?php } ?>
            </select><br><br>
            <label for="user_id">User:</label>
            <select id="user_id" name="user_id">
                <?php while ($user = $users->fetch_assoc()) { ?>
                    <option value="<?php echo $user['id']; ?>" <?php if ($user['id'] == $review['user_id']) echo 'selected'; ?>><?php echo $user['name']; ?></option>
                <?php } ?>
            </select><br><br>
            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" value="<?php echo $review['rating']; ?>"><br><br>
            <label for="review">Review:</label>
            <textarea id="review" name="review"><?php echo $review['review']; ?></textarea><br><br>
            <input type="submit" name="edit_review" value="Update Review">
        </form>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->
</body>
</html>
