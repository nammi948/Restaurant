<?php
include 'connect.php';
session_start();

// Check if session exists
if (!isset($_SESSION['user_data'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit();
}

// Logged-in user info stored from login.php
$user = $_SESSION['user_data'];
$id   = $_SESSION['id'];   // <-- logged-in user's ID


$query = "SELECT * FROM register WHERE id = '$id'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Output to console
    echo "<script>console.log('User data:', " . json_encode($row) . ");</script>";
} else {
    echo "<script>alert('No user found'); window.location='index.php';</script>";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Menu</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .accordion-button::after {
            display: none !important;
            /* Hide default arrow */
        }

        .accordion-button {
            border-radius: 8px !important;
            padding: 1rem !important;
        }

        .accordion-item {
            background-color: #fff;
            margin-bottom: 10px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <!-- header -->
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg " style="background-color: 	#505c76;">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px;">
                            <i class="bi bi-person-circle" style="font-size: 28px;"></i>
                            Profile
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li>
                                <a class="dropdown-item" href="user.php" onclick="openProfile()">
                                    <i class="bi bi-person"></i> My Profile
                                </a>
                                 <script>
                                    function openProfile() {
                                        // let user = JSON.parse(localStorage.getItem("user_info"));

                                        // if (user && user.id) {
                                        //     console.log(user.id, "user id");

                                        //     window.location.href = "user.php?id=" + user.id; // ✅ pass ID dynamically
                                        // } else {
                                        //     alert("User not logged in");
                                        //     window.location.href = "login.php";
                                        // }

                                        let userId = <?= json_encode($id); ?>;
                                        if (userId) {
                                            window.location.href = "user.php?id=" + userId;
                                        } else {
                                            alert("User not logged in");
                                            window.location.href = "login.php";
                                    }
                                    
                                </script> 
                            </li>

                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                            <li><a class="dropdown-item" href="order.php"><i class="bi bi-cart-check"></i> Orders</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger" href="index.php"><i
                                        class="bi bi-box-arrow-right"></i> Logout</a></li>
                        </ul>
                    </li>

                    <a href="cart.php" class="btn btn-warning">
                        🛒 Cart <span id="cartCount">
                            <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>
                        </span>
                    </a>


                </ul>
                <div class="button">
                    <a href="index.php" class="btn btn-danger btn-sm m-3" onclick="onLogout()">Logout</a>
                </div>
                <Script>
                    function onLogout() {
                        console.log("jhgjhg");
                        
                        localStorage.removeItem("user_info");
                    }
                    </Script>
            </div>
            </div>
        </nav>
    </header>
    <!-- menu -->
<main>
        <!-- ✅ Section 1: Veg Dishes -->
<section class="py-4" style="background-color: #f1f1f1;">
    <div class="container">

        <h3 class="fw-bold mb-4 text-center text-success">Veg Dishes</h3>

        <div class="accordion" id="vegAccordion">

            <!-- ======================= PANEER SECTION ======================= -->
            <div class="accordion-item mb-3 shadow-sm rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold" type="button"
                        data-bs-toggle="collapse" data-bs-target="#paneerSection" 
                        aria-expanded="true">
                        Paneer Dishes
                    </button>
                </h2>

                <div id="paneerSection" class="accordion-collapse collapse show"
                     data-bs-parent="#vegAccordion">
                    <div class="accordion-body">

                        <?php
                        $paneer = mysqli_query($con, 
                            "SELECT * FROM order_list 
                             WHERE order_name LIKE '%paneer%' 
                             ORDER BY order_id ASC");

                        while ($row = mysqli_fetch_assoc($paneer)) { ?>
                        
                        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                <div class="mb-2">
                                    <h5 class="fw-bold mb-1"><?= ucfirst($row['order_name']) ?></h5>
                                    <p class="mb-1 text-success fw-semibold">₹<?= $row['order_price'] ?></p>
                                </div>

                                <div class="position-relative text-center">
                                    <img src="<?= $row['item_photo'] ?>" 
                                         class="rounded mb-2"
                                         style="width:130px; height:100px; object-fit:cover;">

                                    <button class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm addbtn"
                                        style="position:absolute; bottom:-10px; left:50%; transform:translateX(-50%);"
                                        data-bs-toggle="modal" data-bs-target="#modal"
                                        data-id="<?= $row['order_id'] ?>"
                                        data-name="<?= $row['order_name'] ?>"
                                        data-price="<?= $row['order_price'] ?>">
                                        Add
                                    </button>
                                </div>

                            </div>
                        </div>

                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- ======================= VEG ITEMS SECTION ======================= -->
            <div class="accordion-item mb-3 shadow-sm rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#vegSection">
                        Veg Items
                    </button>
                </h2>

                <div id="vegSection" class="accordion-collapse collapse" 
                     data-bs-parent="#vegAccordion">
                    <div class="accordion-body">

                        <?php
                        $veg = mysqli_query($con, 
                            "SELECT * FROM order_list 
                             WHERE order_name LIKE '%veg%' 
                             OR order_name LIKE '%thali%' 
                             ORDER BY order_id ASC");

                        while ($row = mysqli_fetch_assoc($veg)) { ?>

                        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                <div class="mb-2">
                                    <h5 class="fw-bold mb-1"><?= ucfirst($row['order_name']) ?></h5>
                                    <p class="mb-1 text-success fw-semibold">₹<?= $row['order_price'] ?></p>
                                </div>

                                <div class="position-relative text-center">
                                    <img src="<?= $row['item_photo'] ?>" 
                                         class="rounded mb-2"
                                         style="width:130px; height:100px; object-fit:cover;">

                                    <button class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm addbtn"
                                        style="position:absolute; bottom:-10px; left:50%; transform:translateX(-50%);"
                                        data-bs-toggle="modal" data-bs-target="#modal"
                                        data-id="<?= $row['order_id'] ?>"
                                        data-name="<?= $row['order_name'] ?>"
                                        data-price="<?= $row['order_price'] ?>">
                                        Add
                                    </button>
                                </div>

                            </div>
                        </div>

                        <?php } ?>

                    </div>
                </div>
            </div>

            <!-- ======================= TIFFIN SECTION ======================= -->
            <div class="accordion-item mb-3 shadow-sm rounded-3">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#tiffinSection">
                        Tiffin Items
                    </button>
                </h2>

                <div id="tiffinSection" class="accordion-collapse collapse"
                     data-bs-parent="#vegAccordion">
                    <div class="accordion-body">

                        <?php
                        $tiffin = mysqli_query($con, 
                            "SELECT * FROM order_list 
                             WHERE order_name LIKE '%idly%' 
                             OR order_name LIKE '%dosa%' 
                             OR order_name LIKE '%fried%' 
                             ORDER BY order_id ASC");

                        while ($row = mysqli_fetch_assoc($tiffin)) { ?>

                        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                <div class="mb-2">
                                    <h5 class="fw-bold mb-1"><?= ucfirst($row['order_name']) ?></h5>
                                    <p class="mb-1 text-success fw-semibold">₹<?= $row['order_price'] ?></p>
                                </div>

                                <div class="position-relative text-center">
                                    <img src="<?= $row['item_photo'] ?>" 
                                         class="rounded mb-2"
                                         style="width:130px; height:100px; object-fit:cover;">

                                    <button class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm addbtn"
                                        style="position:absolute; bottom:-10px; left:50%; transform:translateX(-50%);"
                                        data-bs-toggle="modal" data-bs-target="#modal"
                                        data-id="<?= $row['order_id'] ?>"
                                        data-name="<?= $row['order_name'] ?>"
                                        data-price="<?= $row['order_price'] ?>">
                                        Add
                                    </button>
                                </div>

                            </div>
                        </div>

                        <?php } ?>

                    </div>
                </div>
            </div>

        </div><!-- /Accordion -->

    </div>
</section>



        <!-- ✅ Section 2: Non-Veg Dishes -->
     <?php
// Fetch all non-veg items
$sql = "SELECT * FROM order_list";
$result = mysqli_query($con, $sql);

// Create category groups
$categories = [
    "Chicken Dishes" => [],
    "Mutton Specials" => [],
    "Prawn Dishes" => [],
    "Fish Dishes"   => []
];

while ($row = mysqli_fetch_assoc($result)) {

    $name = strtolower($row['order_name']);

    if (strpos($name, 'chicken') !== false) {
        $categories["Chicken Dishes"][] = $row;
    }
    elseif (strpos($name, 'mutton') !== false) {
        $categories["Mutton Specials"][] = $row;
    }
    elseif (strpos($name, 'prawn') !== false) {
        $categories["Prawn Dishes"][] = $row;
    }
    elseif (strpos($name, 'fish') !== false) {
        $categories["Fish Dishes"][] = $row;
    }
}
?>

<section class="py-4" style="background-color: #f1f1f1;">
    <div class="container">
        <h3 class="fw-bold mb-4 text-center text-danger">Non-Veg Dishes</h3>

        <div class="accordion" id="nonVegAccordion">

            <?php 
            $i = 1;
            foreach ($categories as $catName => $items): 
            ?>

            <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold bg-white" type="button"
                        data-bs-toggle="collapse" data-bs-target="#cat<?= $i ?>" aria-expanded="true">
                        <?= $catName ?>
                    </button>
                </h2>

                <div id="cat<?= $i ?>" class="accordion-collapse collapse show" data-bs-parent="#nonVegAccordion">
                    <div class="accordion-body">

                        <?php foreach($items as $item): ?>
                        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                <div class="mb-2">
                                    <h5 class="fw-bold mb-1 text-dark"><?= $item['order_name'] ?></h5>
                                    <p class="mb-1 text-success fw-semibold">₹<?= $item['order_price'] ?></p>
                                </div>

                                <div class="position-relative text-center">
                                    <img src="<?= $item['item_photo'] ?>" class="rounded mb-2"
                                        style="width:130px; height:100px; object-fit:cover;">

                                    <button class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                        style="position:absolute; bottom:-10px; left:50%; transform:translateX(-50%);"
                                        data-bs-toggle="modal" data-bs-target="#modal"
                                        data-id="<?= $item['order_id'] ?>"
                                        data-name="<?= $item['order_name'] ?>"
                                        data-price="<?= $item['order_price'] ?>">
                                        Add
                                    </button>
                                </div>

                            </div>
                        </div>

                        <?php endforeach; ?>

                    </div>
                </div>
            </div>

            <?php 
            $i++;
            endforeach; 
            ?>

        </div>
    </div>
</section>


        <!-- Stater -->
      <?php
// Fetch all non-veg starters from DB
$sql = "SELECT * FROM order_list";
$result = mysqli_query($con, $sql);

// Group starters into accordion categories
$starterCategories = [
    "Chicken kebab" => [],
    "Appolo Fish" => [],
    "Lollipops" => [],
    "Chicken Manchurian" => []
];

while ($row = mysqli_fetch_assoc($result)) {

    $name = strtolower($row['order_name']);

    if (strpos($name, 'kebab') !== false || strpos($name, 'dry') !== false) {
        $starterCategories["Chicken kebab"][] = $row;
    }
    elseif (strpos($name, 'apollo') !== false || strpos($name, 'fish') !== false) {
        $starterCategories["Appolo Fish"][] = $row;
    }
    elseif (strpos($name, 'lollipop') !== false) {
        $starterCategories["Lollipops"][] = $row;
    }
    elseif (strpos($name, 'manchurian') !== false) {
        $starterCategories["Chicken Manchurian"][] = $row;
    }
}
?>

<section class="py-4" style="background-color: #f1f1f1;">
    <div class="container">
        <h3 class="fw-bold mb-4 text-center text-danger">Non-Veg Starters</h3>

        <div class="accordion" id="staterAccordion">

            <?php 
            $i = 1;
            foreach ($starterCategories as $title => $items): 
            ?>

            <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                <h2 class="accordion-header">
                    <button class="accordion-button fw-semibold bg-white" type="button"
                        data-bs-toggle="collapse" data-bs-target="#starter<?= $i ?>"
                        aria-expanded="true">
                        <?= $title ?>
                    </button>
                </h2>

                <div id="starter<?= $i ?>" class="accordion-collapse collapse show"
                     data-bs-parent="#staterAccordion">

                    <div class="accordion-body">

                        <?php if (empty($items)): ?>
                            <p class="text-muted">No items available.</p>
                        <?php endif; ?>

                        <?php foreach ($items as $item): ?>
                        <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                <div class="mb-2">
                                    <h5 class="fw-bold mb-1 text-dark"><?= $item['order_name'] ?></h5>
                                    <p class="mb-1 text-success fw-semibold">₹<?= $item['order_price'] ?></p>
                                </div>

                                <div class="position-relative text-center">
                                    <img src="<?= $item['item_photo'] ?>" class="rounded mb-2"
                                        style="width:130px; height:100px; object-fit:cover;">

                                    <button class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                        style="position:absolute; bottom:-10px; left:50%; transform:translateX(-50%);"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modal"
                                        data-id="<?= $item['order_id'] ?>"
                                        data-name="<?= $item['order_name'] ?>"
                                        data-price="<?= $item['order_price'] ?>">
                                        ADD
                                    </button>
                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            </div>

            <?php 
            $i++;
            endforeach; 
            ?>

        </div>
    </div>
</section>


        <!-- ✅ Place Order Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalLabel">Place Order</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="orderForm" action="ajax_cart.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Item ID</label>
                                <input type="text" class="form-control" name="item_id" placeholder="Enter Item ID"
                                    id="id">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Item Name</label>
                                <input type="text" class="form-control" name="item_name" placeholder="Enter Item Name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Price (₹)</label>
                                <input type="number" class="form-control" name="price">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="qty" value="0" min="1" max="5">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Total</label>
                                <input type="number" class="form-control" name="total" onclick="total()">
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add To Cart</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {

                const modal = document.getElementById("modal");
                const idInput = modal.querySelector('input[name="item_id"]');
                const nameInput = modal.querySelector('input[name="item_name"]');
                const priceInput = modal.querySelector('input[name="price"]');
                const qtyInput = modal.querySelector('input[name="qty"]');
                const totalInput = modal.querySelector('input[name="total"]');

                // 🟢 When user clicks "ADD", fill modal with data attributes
                const addButtons = document.querySelectorAll('[data-bs-toggle="modal"][data-id]');
                addButtons.forEach(button => {
                    button.addEventListener("click", () => {
                        const id = button.getAttribute("data-id");
                        const name = button.getAttribute("data-name");
                        const price = parseFloat(button.getAttribute("data-price")) || 0;

                        idInput.value = id;
                        nameInput.value = name;
                        priceInput.value = price.toFixed(2);
                        qtyInput.value = 1;
                        totalInput.value = price.toFixed(2);
                    });
                });

                // 🧮 When Quantity changes, recalculate Total only
                qtyInput.addEventListener("input", () => {
                    const price = parseFloat(priceInput.value) || 0;
                    const qty = parseInt(qtyInput.value) || 0;
                    totalInput.value = (price * qty).toFixed(2);
                });

                // 🚫 Disable editing of price and total (user can’t change them)
                idInput.readOnly = true;
                nameInput.readOnly = true;
                priceInput.readOnly = true;
                totalInput.readOnly = true;

            });
        </script>

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
</body>

</html>