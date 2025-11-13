<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ✅ Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ✅ When Add to Cart is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['item_id'];
    $name = $_POST['item_name'];
    $price = (float)$_POST['price'];
    $qty = (int)$_POST['qty'];
    $total = (float)$_POST['total'];

    // ✅ If item already exists, update quantity
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
        $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['qty'] * $price;
    } else {
        // ✅ Add new item
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
            'total' => $total
        ];
    }

    echo "<script>alert('✅ Item added to cart!');</script>";
     header("Location: cart.php");
}
?>