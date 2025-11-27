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
/* ----------------------------------------------------
   1️⃣ Save ORDER in orders table
---------------------------------------------------- */
$sql = "INSERT INTO orders (item_id,item_name,user_name, phone, house, street, city, pincode, total_amount, delivery_fee, grand_total)
        VALUES (? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);
$stmt->bind_param(
    "isssssssddd",
    $item['id'],
    $item['name'],
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

if (!$stmt->execute()) {
    die("Order save failed: " . $stmt->error);
}

/* ----------------------------------------------------
   Save ITEMS directly into order_items table 
   (NO order_id required)
---------------------------------------------------- */

foreach ($cart as $item) {

    $sql = "INSERT INTO order_items (item_id, item_name,user_id, price, qty, total)
            VALUES (?, ?, ?,?, ?, ?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param(
        "isiddd",
        $item['id'],
        $item['name'],
        $user['id'],
        $item['price'],
        $item['qty'],
        $item['total']
    );

    if (!$stmt->execute()) {
        die("Failed to save item: " . $stmt->error);
    }
}

/* ----------------------------------------------------
   Clear Cart
---------------------------------------------------- */
unset($_SESSION['cart']);

/* ----------------------------------------------------
   Success Message
---------------------------------------------------- */
echo "
<script>
alert('🎉 Order Placed Successfully!');
window.location = 'success.php';
</script>
";

?>
