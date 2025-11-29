<?php
session_start();
include 'connect.php';

// ----------------------------
// 1. CHECK USER LOGIN
// ----------------------------
if (!isset($_SESSION['id'])) {
    die("User not logged in!");
}

$user_id = $_SESSION['id'];  // USE THIS – safe & correct


// ----------------------------
// 2. FETCH ORDERS
// ----------------------------
$sql = "SELECT * FROM order_items WHERE user_id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$orders = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   
<header class="sticky-top shadow-sm">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">

            <a class="navbar-brand px-3 d-flex align-items-center" href="#">
                <img src="assets/images/logo1.jpg" class="img-fluid rounded-circle me-2"
                    style="width:65px; height:65px;" alt="Logo">
                <span class="fw-bold fs-4">Royal Restaurant</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="#" style="font-size: 19px;">Welcome to Our Restaurant</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#" style="font-size: 19px;">Enjoy Our Services</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#" style="font-size: 19px;">Taste Our Dishes</a></li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="place.php" class="btn btn-danger d-flex align-items-center gap-2">
                            Logout
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>
<section>   
<main>
    <div class="container mt-5">
    <h2 class="mb-4">My Orders</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>User ID</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Created</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                 while ($order = $orders->fetch_assoc()): ?>
                    <tr>
                        <td><?= $order['item_id']; ?></td>
                        <td><?= $order['item_name']; ?></td>
                        <td><?= $order['user_id']; ?></td>
                        <td><?= $order['price']; ?></td>
                        <td><?= $order['qty']; ?></td>
                        <td><?= $order['total']; ?></td>
                        <td><?= $order['created_at']; ?></td>
                        
                        <td>
                            <?php
                            $sql1 = "SELECT * FROM orders WHERE item_id = ? && user_id = ?";
                            $stmt = $con->prepare($sql1);
                            $stmt->bind_param("ii",$order['item_id'], $order['user_id']);
                            $stmt->execute();
                            $order = $stmt->get_result();
                              while ($row = $order->fetch_assoc()): ?>
                          <?= $row['status']; ?></td> 
                          <?php endwhile; ?>    
                    </tr>
                     <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>