<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* ADD ITEM */
/* ADD ITEM */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart.php'])) {

    $id     = $_POST['item_id'];
    $name   = $_POST['item_name'];
    $price  = (float)$_POST['price'];
    $qty    = (int)$_POST['qty'];
    $total  = $price * $qty;

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['qty'] += $qty;
        $_SESSION['cart'][$id]['total'] =
            $_SESSION['cart'][$id]['qty'] * $price;
    } else {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => $price,
            'qty' => $qty,
            'total' => $total
        ];
    }
}

/* Increase / Decrease */
if (isset($_GET['action']) && isset($_GET['id'])) {

    $id = $_GET['id'];

    if ($_GET['action'] === 'increase') {

        $_SESSION['cart'][$id]['qty']++;
        $_SESSION['cart'][$id]['total'] =
            $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];

    } elseif ($_GET['action'] === 'decrease') {

        if ($_SESSION['cart'][$id]['qty'] > 1) {
            $_SESSION['cart'][$id]['qty']--;
            $_SESSION['cart'][$id]['total'] =
                $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        } else {
            unset($_SESSION['cart'][$id]);
        }
    }

    header("Location: cart.php");
    exit;
}

/* Remove */
if (isset($_GET['remove'])) {
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location: cart.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Your Cart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container-fluid mt-4">
     <header class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-body-secondary">
       <div class="container-fluid">
             <a class="navbar-brand px-5 d-flex align-items-center" href="#">
                <img class="navbar-logo img-fluid rounded-circle me-2" src="assets/images/logo1.jpg" alt="Logo"
                    style="width:80px; height:80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#" style="font-size: 20px;">Welcome to Our
                            Restaurant</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="font-size: 20px;">Enjoy Our Services</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#" style="font-size: 20px;">Taste Our Dishes</a></li>
                    <a href="cart.php" class="btn btn-warning gap-2">
                        🛒 Cart <span id="cartCount">
                            <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
                        </span>
                    </a>
                </ul>
                <div class="button">
                    <a href="place.php" class="btn btn-outline-danger btn-sm m-3">Return</a>
                </div>
            </div>
            </div>
       </div>
        </nav>
    </header>
<main>
    <section class="mt-2">

        <h2 class="fw-bold mb-3 text-success">🛒 Your Cart</h2>

        <table class="table table-bordered table-striped align-middle table-sm">
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

        <!-- Delivery Address Section -->
        <section class="py-5">
            <div class="card shadow-sm p-3" style="width:350px;">

                <h4 class="card-title mb-3">Deliver To:</h4>

                <?php if (isset($_SESSION['user_data'])): ?>

                    <h6><strong>Name:</strong> <?= $_SESSION['user_data']['name']; ?></h6>

                    <p class="mb-1">
                        <strong>Address:</strong><br>
                        <?= $_SESSION['user_data']['house'] ?>,
                        <?= $_SESSION['user_data']['street'] ?>,
                        <?= $_SESSION['user_data']['city'] ?><br>
                        Pincode: <?= $_SESSION['user_data']['pincode'] ?>
                    </p>

                    <p><strong>Phone:</strong> <?= $_SESSION['user_data']['phone']; ?></p>

                <?php else: ?>
                    <p class="text-danger">User address missing!</p>
                <?php endif; ?>

            </div>
        </section>

        <!-- Buttons -->
        <div class="text-end mb-3">
            <a href="place.php" class="btn btn-outline-primary">⬅ Back to Menu</a>

            <?php if (!empty($_SESSION['cart'])): ?>
                <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
            <?php endif; ?>
        </div>

    </section>
</main>
<footer class="sticky">
 <section class="bg-dark text-white py-3">
      <div class="container">
         <div class="text-white text-center  mt-0">
    <p class="mb-0 fw-bold">© Copyright MyWebsite All Rights Reserved</p>
  </div>
      </div>
    </section>
</footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
