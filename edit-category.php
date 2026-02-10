<!-- Admin-panel/edit-category.php -->

<?php
// Include the database connection file
require_once '../includes/db.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get the category ID from the URL
$id = $_GET['id'];

// Get the category from the database
$sql = "SELECT * FROM categories WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Check if the form is submitted
if (isset($_POST['edit_category'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Validate the input
    if (empty($name)) {
        $error = 'Please enter a category name';
    } else {
        // Update the category in the database
        $sql = "UPDATE categories SET name = '$name', description = '$description' WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            header('Location: categories.php');
            exit;
        } else {
            $error = 'Error updating category: ' . $conn->error;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <h1>Edit Category</h1>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $row['description']; ?></textarea><br><br>
            <input type="submit" name="edit_category" value="Update Category">
        </form>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->
</body>
</html>
