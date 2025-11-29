<?php
session_start();
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// ✅ Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// print_r($_SESSION['user_data']);

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
$user = $_SESSION['user_data'];
$id   = $_SESSION['id'];

$query = "SELECT * FROM register WHERE id='$id'";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    echo "<script>alert('No user found'); window.location='login.php';</script>";
    exit();
}

$row = mysqli_fetch_assoc($result); // Fetch user data
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <style>
 @media (max-width: 567px) {

    .col-md-4 {
        width: 100% !important;      /* Full screen width */
        padding: 0 10px;             /* Small padding */
    }

    .col-md-4 .card {
        width: 100% !important;
    }

    table {
        font-size: 12px;             /* Make table text smaller */
    }

    table th, table td {
        padding: 4px;                /* Reduce spacing */
    }

    .btn {
        padding: 4px 6px !important; /* Smaller buttons */
        font-size: 12px !important;
    }
}


  </style>
</head>
<body>
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
                    <a href="cart.php" class="btn btn-outline-danger btn-sm m-3">Return</a>
                </div>
            </div>
            </div>
             </div>
        </nav>
     
    </header>
<main>
<section class="d-flex justify-content-center mt-4">
<div class="col-md-6">
    <div class="card shadow-sm p-3">

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

        <hr>

        <h5 class="fw-bold mb-3">PRICE DETAILS</h5>

    <div class="d-flex justify-content-between mb-2">
        <span>Price (items)</span>
        <span>₹<?= number_format($grandTotal, 2) ?></span>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <span>Discount</span>
        <span class="text-success">− ₹0</span>
    </div>

    <div class="d-flex justify-content-between mb-2">
        <span>Delivery Fee</span>
        <span>₹25</span>
    </div>

    <hr>

    <div class="d-flex justify-content-between fw-bold mb-3">
        <span>Total Amount</span>
        <span>₹<?= number_format($grandTotal + 25, 2) ?></span>
    </div>


        <hr>
 <div class="d-flex justify-content-between fw-bold mb-3 gap-4">
         <h6 class="mb-2">
                    <strong>Name:</strong> 
                    <?= $row['name']; ?>
                </h6>
     
  <p class="mb-1">
                        <strong>Address:</strong><br>
                          <?= $row['house']; ?>,
                        <?= $row['street']; ?>,
                        <?= $row['city']; ?>,
                        <?= $row['state']; ?>.<br>
                        Pincode:<?= $row['pincode']; ?>
                    </p>

                    <p class="mt-2">
                        <strong>Phone:</strong> 
                       <?= $row['phone']; ?>
                       <?= $row['email']; ?>
                    </p>
                    
    </div>
        <hr>
        <h6 class="fw-bold mb-2">PAY USING</h6>

        <!-- UPI Payment Buttons (Flipkart Style) -->
        <div class="d-grid gap-2">

            <a href="upi://pay?pa=yourupi@oksbi&pn=FoodOrder&am=<?= $grandTotal ?>&cu=INR&tn=Order Payment"
               class="btn btn-outline-success">
                💳 UPI (GPay / PhonePe / Paytm / BHIM)
            </a>

            <a href="#"
               class="btn btn-outline-primary">
                🔵 GPay
            </a>

            <a href="#"
               class="btn btn-outline-info">
                🟣 PhonePe
            </a>

            <a href="#"
               class="btn btn-outline-dark">
                🟡 Amazon Pay
            </a>

            <a href="#"
               class="btn btn-outline-warning">
                💠 Paytm UPI
            </a>

        </div>

        <hr>

        <!-- Place Order -->
        <a href="placeorder.php" class="btn btn-warning w-100 fw-bold">
            PLACE ORDER
        </a>

    </div>
</div>
</section>
<footer class="sticky">
 <section class="bg-dark text-white py-3">
      <div class="container">
         <div class="text-white text-center  mt-0">
    <p class="mb-0 fw-bold">© Copyright MyWebsite All Rights Reserved</p>
  </div>
      </div>
    </section>
</footer>
 </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>