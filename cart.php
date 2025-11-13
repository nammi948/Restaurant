<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ✅ Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* ✅ Add Item to Cart */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax_cart.php'])) {
    $id     = $_POST['item_id'];
    $name   = $_POST['item_name'];
    $price  = (float) $_POST['price'];
    $qty    = (int) $_POST['qty'];
    $total  = $price * $qty;

    // ✅ If already exists, increase qty
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
        $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['qty'] * $price;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
            'total' => $total
        ];
    }

    echo "<script>alert('✅ Item added to cart successfully!');</script>";
}

/* ✅ Increase / Decrease Quantity */
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_GET['action'] === 'increase') {
        $_SESSION['cart'][$id]['qty']++;
        $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
    } elseif ($_GET['action'] === 'decrease') {
        if ($_SESSION['cart'][$id]['qty'] > 1) {
            $_SESSION['cart'][$id]['qty']--;
            $_SESSION['cart'][$id]['total'] = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }
    header("Location: cart.php");
    exit;
}

/* ✅ Remove Item */
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
    header("Location: cart.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">
    <h2 class="fw-bold mb-3 text-success">🛒 Your Cart</h2>

    <table class="table table-bordered table-striped align-middle  table-sm">
        <thead class="table-success">
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Price (₹)</th>
                <th>Qty</th>
                <th>Total (₹)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $grandTotal = 0;
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $grandTotal += $item['total'];
                    echo "
                    <tr>
                        <td>{$item['id']}</td>
                        <td>{$item['name']}</td>
                        <td>₹{$item['price']}</td>
                        <td>
                            <a href='cart.php?action=decrease&id={$item['id']}' class='btn btn-sm btn-outline-danger'>-</a>
                            <span class='mx-2'>{$item['qty']}</span>
                            <a href='cart.php?action=increase&id={$item['id']}' class='btn btn-sm btn-outline-success'>+</a>
                        </td>
                        <td>₹{$item['total']}</td>
                        <td>
                            <a href='cart.php?remove={$item['id']}' class='btn btn-sm btn-danger'>Remove</a>
                        </td>
                    </tr>";
                }
                echo "
                <tr class='fw-bold'>
                    <td colspan='4' class='text-end'>Grand Total:</td>
                    <td colspan='2'>₹" . number_format($grandTotal, 2) . "</td>
                </tr>";
            } else {
                echo "<tr><td colspan='6' class='text-center text-muted'>No items in your cart</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="text-end">
        <a href="place.php" class="btn btn-outline-primary">⬅ Back to Menu</a>
        <?php if (!empty($_SESSION['cart'])): ?>
            <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
        <?php endif; ?>
    </div>

</body>
</html>
