<?php
include "connect.php";
session_start();

/* -----------------------------------------------------
   ADD NEW ITEM
----------------------------------------------------- */
if (isset($_POST['addItem'])) {

    $id       = $_POST['id'];   // order_id
    $name     = $_POST['name'];
    $price    = $_POST['price'];
    $category = $_POST['category'];

    // Upload Image
    $file_name   = $_FILES['photo']['name'];
    $tmp         = $_FILES['photo']['tmp_name'];
    $uploadPath  = "uploads/" . $file_name;

    move_uploaded_file($tmp, $uploadPath);

    // CORRECT COLUMN NAMES
    $sql = "INSERT INTO order_list (order_id, order_name, order_price, category, item_photo)
            VALUES ('$id', '$name', '$price', '$category', '$uploadPath')";

    mysqli_query($con, $sql);

    echo "<script>alert('Item Added Successfully'); window.location='add_product.php';</script>";
    exit();
}

/* -----------------------------------------------------
   DELETE ITEM
----------------------------------------------------- */
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    mysqli_query($con, "DELETE FROM order_list WHERE id = '$id'");

    echo "<script>alert('Item Deleted'); window.location='add_product.php';</script>";
    exit();
}

?>
<!doctype html>
<html>
<head>
    <title>Admin – Manage Menu Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<?php require 'partials/_nav.php'; ?>

<main>
    <section>
        <div class="content">
<div class="container py-4">

    <h2 class="text-center mt-4">🍽 Manage Menu Items</h2>

    <!-- ADD ITEM FORM -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add New Item</h5>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label>Order Id</label>
                        <input type="number" class="form-control" name="id" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Item Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Price (₹)</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Category</label>
                        <select name="category" class="form-control" required>
                            <option value="paneer">Paneer</option>
                            <option value="veg">Veg</option>
                            <option value="tiffin">Tiffin</option>
                            <option value="chicken">Chicken</option>
                            <option value="mutton">Mutton</option>
                            <option value="prawn">Prawn</option>
                            <option value="fish">Fish</option>
                            <option value="starter">Starter</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Item Image</label>
                        <input type="file" class="form-control" name="photo" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success" name="addItem">Add Item</button>
                    </div>

                </div>

            </form>
        </div>
    </div>


    <!-- MENU TABLE -->
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Menu Items</h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Photo</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $items = mysqli_query($con, "SELECT * FROM order_list ORDER BY order_id DESC");

                while ($row = mysqli_fetch_assoc($items)) {
                    ?>
                    <tr>
                        <td><?= $row['order_id'] ?></td>
                        <td><?= ucwords($row['order_name']) ?></td>
                        <td><?= ucfirst($row['category']) ?></td>
                        <td>₹<?= $row['order_price'] ?></td>
                        <td><img src="<?= $row['item_photo'] ?>" width="60" height="50"></td>

                        <td>
                            <a href="edit_item.php?id=<?= $row['order_id'] ?>"
                               class="btn btn-warning btn-sm">Edit</a>

                            <a href="add_product.php?delete=<?= $row['order_id'] ?>"
                               onclick="return confirm('Delete this item?')"
                               class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>
        </div>
    </section>
</main>
</body>
</html>
