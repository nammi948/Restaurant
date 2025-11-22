<?php 
include "connect.php"; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Menu Item</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<?php require 'partials/_nav.php'; ?>
<main style="margin-left:250px; padding-top:100px; padding-right:20px; padding-left:20px;">

<section class="mt-4">
<div class="container">

    <div class="card shadow-lg rounded-4 mx-auto" style="max-width:850px;">
        <div class="card-header bg-success text-white text-center fw-bold fs-4">
            Add New Menu Item
        </div>

        <div class="card-body px-4 py-4">

            <!-- Success Alert -->
            <?php if(isset($_GET['added'])): ?>
                <div class="alert alert-success text-center fw-bold">
                    ✔ Item Added Successfully!
                </div>
            <?php endif; ?>

            <form action="admin_insert_item.php" method="POST" enctype="multipart/form-data">

             <div class="mb-3">
                    <label class="form-label fw-semibold">Oreder_id</label>
                    <input type="text" name="order_id" class="form-control form-control-lg" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Item Name</label>
                    <input type="text" name="order_name" class="form-control form-control-lg" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Price (₹)</label>
                    <input type="number" name="order_price" class="form-control form-control-lg" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category</label>
                    <select name="category" class="form-select form-select-lg" required>
                        <option value="">-- Select Category --</option>
                        <option value="paneer">Paneer</option>
                        <option value="veg">Veg</option>
                        <option value="tiffin">Tiffin</option>
                        <option value="chicken">Chicken</option>
                        <option value="mutton">Mutton</option>
                        <option value="fish">Fish</option>
                        <option value="prawn">Prawn</option>
                        <option value="starter">Starter</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload Image</label>
                    <input type="file" name="item_photo" class="form-control form-control-lg" required>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-success px-5 py-2 fw-bold">Add Item</button>
                    <a href="place.php" class="btn btn-secondary px-5 py-2 ms-2">Back</a>
                </div>

            </form>
        </div>
    </div>

</div>
</section>



</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
