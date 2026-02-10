function get_products() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}
function add_to_cart($id, $quantity) {
    global $conn;
    $sql = "INSERT INTO cart (product_id, quantity) VALUES ($id, $quantity)";
    $conn->query($sql);
}

function get_cart_products() {
    global $conn;
    $sql = "SELECT p.name, c.quantity, p.price, (c.quantity * p.price) AS total FROM cart c JOIN products p ON c.product_id = p.id";
    $result = $conn->query($sql);
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

function get_cart_total() {
    global $conn;
    $sql = "SELECT SUM(c.quantity * p.price) AS total FROM cart c JOIN products p ON c.product_id = p.id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}
function place_order($name, $email, $address) {
    global $conn;
    $sql = "INSERT INTO orders (name, email, address, total) VALUES ('$name', '$email', '$address', " . get_cart_total() . ")";
    $conn->query($sql);
    $order_id = $conn->insert_id;
    foreach (get_cart_products() as $product) {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, " . $product['product_id'] . ", " . $product['quantity'] . ", " . $product['price'] . ")";
        $conn->query($sql);
    }
    $sql = "DELETE FROM cart";
    $conn->query($sql);
}
function send_message($name, $email, $message) {
    global $conn;
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    $conn->query($sql);
}
function get_products() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}
