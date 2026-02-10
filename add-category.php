<!-- Admin-panel/add-category.php -->

<?php
// Include the database connection file
require_once '../includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Check if the form is submitted
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Validate the input
    if (empty($name)) {
        $error = 'Please enter a category name';
    } else {
        // Insert the category into the database
        $sql = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
        if ($conn->query($sql) === TRUE) {
            header('Location: categories.php');
            exit;
        } else {
            $error = 'Error adding category: ' . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category - Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <h1>Add Category</h1>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea><br><br>
            <input type="submit" name="add_category" value="Add Category">
        </form>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->
</body>
</html>
