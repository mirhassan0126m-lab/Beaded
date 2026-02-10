<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get sales report
$sales_report = get_sales_report();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Handmade Bracelets by Beadlet by Beadify</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Main Content -->
    <main>
        <section class="reports">
            <h1>Reports</h1>
            <h2>Sales Report</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sales_report as $report) { ?>
                        <tr>
                            <td><?php echo $report['date']; ?></td>
                            <td><?php echo $report['total_sales']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="export-report.php">Export to CSV</a>
        </section>
    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    <!-- End Footer -->

    <script src="../js/script.js"></script>
</body>
</html>
