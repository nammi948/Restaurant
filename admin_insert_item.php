<?php
include "connect.php";
$id      = $_POST['order_id'];
$name     = $_POST['order_name'];
$price    = $_POST['order_price'];
$category = $_POST['category'];

$file = $_FILES['item_photo'];

$filename = time() . "_" . basename($file['name']);
$path = "uploads/" . $filename;

/* Create uploads folder if missing */
if (!is_dir("uploads")) {
    mkdir("uploads", 0777, true);
}

/* Move file */
if (!move_uploaded_file($file['tmp_name'], $path)) {
    die("Image Upload Failed!");
}

/* Insert without order_id (AUTO_INCREMENT) */
$sql = "INSERT INTO order_list (order_id,order_name, order_price, item_photo, category)
        VALUES ('$id','$name', '$price', '$path', '$category')";

if (mysqli_query($con, $sql)) {
    header("Location: admin.php?added=1");
    exit;
} else {
    echo "Error: " . mysqli_error($con);
}
?>
