<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Cart is empty!");
}

if (!isset($_SESSION['user_data'])) {
    die("User address missing!");
}

$user = $_SESSION['user_data'];
$cart = $_SESSION['cart'];

$priceTotal = 0;
foreach ($cart as $item) {
    $priceTotal += $item['total'];
}
$deliveryFee = 25;
$grandTotal = $priceTotal + $deliveryFee;

/* ----------------------------------------------------
   1️⃣ Save ORDER in orders table
---------------------------------------------------- */
$sql = "INSERT INTO orders (user_name, phone, house, street, city, pincode, total_amount, delivery_fee, grand_total)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);
$stmt->bind_param(
    "ssssssddd",
    $user['name'],
    $user['phone'],
    $user['house'],
    $user['street'],
    $user['city'],
    $user['pincode'],
    $priceTotal,
    $deliveryFee,
    $grandTotal
);

if ($stmt->execute()) {
    $orderId = $stmt->insert_id; // 📌 New Order ID
} else {
    die("Order save failed: " . $stmt->error);
}

/* ----------------------------------------------------
   2️⃣ Save ITEMS into order_items table
---------------------------------------------------- */
foreach ($cart as $item) {
    $sql2 = "INSERT INTO order_items (order_id, item_id, item_name, price, qty, total)
             VALUES (?, ?, ?, ?, ?, ?)";

    $stmt2 = $con->prepare($sql2);
    $stmt2->bind_param(
        "iisddd",
        $orderId,
        $item['id'],
        $item['name'],
        $item['price'],
        $item['qty'],
        $item['total']
    );
    $stmt2->execute();
}

/* ----------------------------------------------------
   3️⃣ Clear Cart after successful order
---------------------------------------------------- */
unset($_SESSION['cart']);

echo "
<script>
alert('🎉 Order Placed Successfully! Order ID: $orderId');
window.location='success.php?order_id=$orderId';
</script>
";

?>
