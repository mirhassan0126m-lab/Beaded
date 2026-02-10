<?php
// Check if user is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Get sales report
$sales_report = get_sales_report();

// Export report to CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="sales_report.csv"');
$output = fopen('php:                
fputcsv($output, array('Date', 'Total Sales'));
foreach ($sales_report as $report) {
    fputcsv($output, array($report['date'], $report['total_sales']));
}
fclose($output);
exit;
?>
