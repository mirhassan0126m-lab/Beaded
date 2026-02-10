<?php
include '../config/database.php';

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

$customers = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
}

echo json_encode($customers);

$conn->close();
?>
