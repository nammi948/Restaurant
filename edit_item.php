<?php
include "connect.php";
session_start();

/* -----------------------------------------------------
   1️⃣ CHECK ID IN URL (Primary Key)
----------------------------------------------------- */
if (!isset($_GET['id'])) {
    die("Item ID missing!");
}

$id = intval($_GET['id']);

/* -----------------------------------------------------
   2️⃣ FETCH ITEM DETAILS
----------------------------------------------------- */
$result = mysqli_query($con, "SELECT * FROM order_list WHERE order_id='$id'");
$item = mysqli_fetch_assoc($result);

if (!$item) {
    die("Item not found!");
}


/* -----------------------------------------------------
   3️⃣ UPDATE ITEM
----------------------------------------------------- */
if (isset($_POST['updateItem'])) {

    // DO NOT CHANGE order_id – it is referenced by order_items
    $name     = $_POST['name'];
    $price    = $_POST['price'];
    $category = $_POST['category'];

    $photo_sql = "";

    // PHOTO UPLOAD HANDLING
    if (!empty($_FILES['photo']['name'])) {
        $file_name   = time() . "_" . $_FILES['photo']['name'];
        $tmp         = $_FILES['photo']['tmp_name'];
        $uploadPath  = "uploads/" . $file_name;

        move_uploaded_file($tmp, $uploadPath);

        $photo_sql = ", item_photo='$uploadPath'";
    }

    // CORRECT UPDATE QUERY
    $query = "UPDATE order_list SET
                order_name   = '$name',
                order_price  = '$price',
                category     = '$category'
                $photo_sql
              WHERE id = '$id'";

    mysqli_query($con, $query);

    echo "<script>alert('Item Updated Successfully'); window.location='add_product.php';</script>";
    exit();
}
?>


<!doctype html>
<html>

<head>
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<?php require 'partials/_nav.php'; ?>
<main>
    <section>
        <div class="content">
         <div class="container mt-5">

    <h2 class="text-center mb-4">✏ Edit Menu Item</h2>

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5>Edit: <?= $item['order_name'] ?></h5>
        </div>

        <div class="card-body">

            <form method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label>Order ID</label>
                        <input type="number" name="order_id" value="<?= $item['order_id'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Item Name</label>
                        <input type="text" name="name" value="<?= $item['order_name'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Price (₹)</label>
                        <input type="number" step="0.01" name="price" value="<?= $item['order_price'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Category</label>
                        <select name="category" class="form-control" required>
                            <option <?= ($item['category']=="paneer")?"selected":"" ?> value="paneer">Paneer</option>
                            <option <?= ($item['category']=="veg")?"selected":"" ?> value="veg">Veg</option>
                            <option <?= ($item['category']=="tiffin")?"selected":"" ?> value="tiffin">Tiffin</option>
                            <option <?= ($item['category']=="chicken")?"selected":"" ?> value="chicken">Chicken</option>
                            <option <?= ($item['category']=="mutton")?"selected":"" ?> value="mutton">Mutton</option>
                            <option <?= ($item['category']=="prawn")?"selected":"" ?> value="prawn">Prawn</option>
                            <option <?= ($item['category']=="fish")?"selected":"" ?> value="fish">Fish</option>
                            <option <?= ($item['category']=="starter")?"selected":"" ?> value="starter">Starter</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Current Photo</label><br>
                        <img src="<?= $item['item_photo'] ?>" width="120" height="100" class="mb-2">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Upload New Photo (optional)</label>
                        <input type="file" name="photo" class="form-control">
                    </div>

                </div>

                <div class="text-end">
                    <button type="submit" name="updateItem" class="btn btn-success">Update Item</button>
                    <a href="add_product.php" class="btn btn-secondary">Back</a>
                </div>

            </form>

        </div>
    </div>

    </div>
        </div>
    </section>
</main>
</body>
</html>
