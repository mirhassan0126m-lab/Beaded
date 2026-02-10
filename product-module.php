<?php
class ProductModule {
    public function getProduct($id) {
        // Get product from database
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $conn->query($sql);
        $product = $result->fetch_assoc();
        return $product;
    }

    public function getProducts() {
        // Get all products from database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        $products = array();
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }
}
?>
