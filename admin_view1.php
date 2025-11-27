<?php
session_start();
include 'connect.php';


// Handle accept/reject
if (isset($_GET['action'], $_GET['id'])) {
    $action = $_GET['action'];
    $id = intval($_GET['id']);

    if (in_array($action, ['accepted', 'rejected'])) {
        $stmt = $con->prepare("UPDATE orders SET status=? WHERE order_id=?");
        $stmt->bind_param("si", $action, $id);
        $stmt->execute();
    }
}

// Fetch all orders
$orders = $con->query("SELECT * FROM orders ORDER BY created_at DESC");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Responsive Sidebar + Navbar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* DESKTOP SIDEBAR */
.sidebar {
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    width: 25%;     /* = col-3 */
    background-color: #0d3f86;
    /* padding-top: 80px; */
    color: white;
}

/* MAIN CONTENT */
.main-content {
    margin-left: 25%;   /* matches sidebar width */
    padding: 20px;
}

/* TOP NAVBAR */
.navbar-fixed {
    position: fixed;
    top: 0;
    left: 25%; /* align with sidebar */
    width: 75%;
    z-index: 1000;
}

/* MOBILE VIEW */
@media (max-width: 768px) {

    .sidebar {
        position: relative !important;
        width: 100% !important;
        height: auto !important;
        padding-top: 20px;
    }

    .navbar-fixed {
        position: relative;
        width: 100%;
        left: 0;
        margin-top: 0;
    }

    .main-content {
        margin-left: 0 !important;
        padding: 10px;
    }
}
table {
    font-size: 14px;
    white-space: nowrap;
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <ul class="nav flex-column px-3">
        <li class="nav-item mb-3">
            <a class="nav-link text-light fw-bold" href="#">
                <i class="fa-solid fa-house me-2"></i> Home
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-light" href="table.php">
                <i class="fa-solid fa-user-plus me-2"></i> Registration
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-light" href="#order">
                <i class="fa-solid fa-cart-shopping me-2"></i> Order
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-light" href="event.php">
                <i class="fa-solid fa-calendar-days me-2"></i> Event
            </a>
        </li>

        <li class="nav-item mb-2">
            <a class="nav-link text-light" href="#book-table">
                <i class="fa-solid fa-utensils me-2"></i> Book a Table
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-danger fw-bold" href="index.php">
                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </a>
        </li>
    </ul>
</div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-info bg-info navbar-dark navbar-fixed">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-shop"></i> Food Dashboard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link fw-bold" href="#">Welcome to Our Restaurant</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Enjoy Our Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Taste Our Dishes</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="main-content mt-5 pt-4">
 <h1>Admin Orders</h1>

<div class="table-responsive">
<table class="table table-sm table-striped table-bordered align-middle">
<tr>
    <th>Order ID</th>
    <th>User Name</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Items</th>
    <th>Total</th>
    <th>Delivery Fee</th>
    <th>Grand Total</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php while($order = $orders->fetch_assoc()): ?>
<tr>
    <td><?= $order['order_id'] ?></td>
    <td><?= htmlspecialchars($order['user_name']) ?></td>
    <td><?= htmlspecialchars($order['phone']) ?></td>
    <td>
        <?= htmlspecialchars($order['house']) ?>,
        <?= htmlspecialchars($order['street']) ?>,
        <?= htmlspecialchars($order['city']) ?> -
        <?= htmlspecialchars($order['pincode']) ?>
    </td>
    <td><?= htmlspecialchars($order['item_id']) ?> ,
        <?= htmlspecialchars($order['item_name']) ?>
    </td>

    <td><?= $order['total_amount'] ?></td>
    <td><?= $order['delivery_fee'] ?></td>
    <td><?= $order['grand_total'] ?></td>

    <td><?= $order['status'] ? ucfirst($order['status']) : 'Pending' ?></td>

    <td>
        <?php if(!$order['status'] || $order['status'] == 'pending'): ?>
            <a href="?action=accepted&id=<?= $order['order_id'] ?>">Accept</a> |
            <a href="?action=rejected&id=<?= $order['order_id'] ?>">Reject</a>
        <?php else: ?>
            -
        <?php endif; ?>
    </td>
</tr>
<?php endwhile; ?>
</table>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
