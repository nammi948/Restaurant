<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* ----------------------------------------------------
   0️⃣ CHECK USER LOGIN
---------------------------------------------------- */
if (!isset($_SESSION['id']) || !isset($_SESSION['user_data'])) {
    die("❌ User not logged in!");
}

$id = $_SESSION['id'];

/* ----------------------------------------------------
   1️⃣ FETCH USER DATA FROM DB
---------------------------------------------------- */

$query = "SELECT * FROM register WHERE id='$id'";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("❌ User not found in database");
}

$user = mysqli_fetch_assoc($result);

/* ----------------------------------------------------
   2️⃣ CHECK CART
---------------------------------------------------- */
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("❌ Cart is empty!");
}

$cart = $_SESSION['cart'];

/* ----------------------------------------------------
   3️⃣ CALCULATE TOTALS
---------------------------------------------------- */
$priceTotal = 0;

foreach ($cart as $item) {
    $priceTotal += $item['total'];
}

$deliveryFee = 25;
$grandTotal  = $priceTotal + $deliveryFee;

/* ----------------------------------------------------
   4️⃣ INSERT MAIN ORDER INTO orders TABLE
---------------------------------------------------- */

$firstItem = reset($cart); // first cart item

$sql = "INSERT INTO orders 
(item_id, item_name,user_id, user_name,email, phone, house, street, city, pincode, total_amount, delivery_fee, grand_total)
VALUES (?, ?, ?, ?, ?,?,?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);

$stmt->bind_param(
    "isissssssssdd",
    $firstItem['id'],
    $firstItem['name'],
    $user['id'],
    $user['name'],
    $user['email'],
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
    die("❌ ORDER INSERT FAILED: " . $stmt->error);
}

$orderId = $stmt->insert_id;

/* ----------------------------------------------------
   5️⃣ INSERT ALL ITEMS INTO order_items TABLE
---------------------------------------------------- */

foreach ($cart as $item) {

    $sql = "INSERT INTO order_items 
            (item_id, item_name, user_id, price, qty, total)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    $stmt->bind_param(
        "isiddd",
        $item['id'],
        $item['name'],
        $user['id'],   // user_id corrected
        $item['price'],
        $item['qty'],
        $item['total']
    );

    if (!$stmt->execute()) {
        die("❌ ORDER ITEM FAILED: " . $stmt->error);
    }
}

/* ----------------------------------------------------
   6️⃣ CLEAR CART
---------------------------------------------------- */
unset($_SESSION['cart']);

/* ----------------------------------------------------
   7️⃣ REDIRECT TO SUCCESS PAGE
---------------------------------------------------- */
echo "
<script>
alert('🎉 Order Placed Successfully!');
window.location = 'place.php';
</script>
";

?>
