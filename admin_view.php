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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <title>Admin_view</title>
</head>
<body>
      <?php require 'partials/_nav.php'; ?>
     
  <main>
    <section class="mt-5">
 <div class="content">
<section>
    <div class="container">
          <h2 class="mb-4 text-center fw-bold">Order Details</h2>
        <div class="table-responsive shadow-lg bg-white p-3 rounded">
<table id="ordersTable" class="table table-bordered table-striped table-sm align-middle text-center">
    <thead class="table-dark">
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
    </thead>
    <tbody>
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
            <td><?= htmlspecialchars($order['item_id']) ?>, <?= htmlspecialchars($order['item_name']) ?></td>
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
    </tbody>
</table>
</div>
    </div>
</section>

 </div>
</section>
</main>
<script>
$(document).ready(function () {
    $('#ordersTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50, 100],
        "scrollX": true,          // Horizontal scroll for small screens
        "columnDefs": [
            { "orderable": false, "targets": 9 } // Disable sorting on Actions column
        ]
    });
});
</script>

</body>
</html>
