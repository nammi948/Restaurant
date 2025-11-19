<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
echo "<h2>Order placed successfully!</h2>";
echo "<p>Your Order ID: " . $_GET['order_id'] . "</p>";
?>
  <a href="place.php" class="btn btn-warning w-100 fw-bold">
            return
        </a>
</body>
</html>