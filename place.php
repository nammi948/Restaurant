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
        <nav class="navbar navbar-expand-lg bg-body-secondary">
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
                                <a class="dropdown-item" href="#" onclick="openProfile()">
                                    <i class="bi bi-person"></i> My Profile
                                </a>
                                <script>
                                    function openProfile() {
                                        let user = JSON.parse(localStorage.getItem("user_info"));

                                        if (user && user.id) {
                                            console.log(user.id, "user id");

                                            window.location.href = "user.php?id=" + user.id; // ✅ pass ID dynamically
                                        } else {
                                            alert("User not logged in");
                                            window.location.href = "login.php";
                                        }
                                    }
                                </script>
                            </li>

                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-cart-check"></i> Orders</a></li>
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
                    <a href="index.php" class="btn btn-outline-primary btn-sm m-3">Back</a>
                </div>
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

                    <!-- Paneer Keema -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#vegOne" aria-expanded="true"
                                aria-controls="vegOne">
                                Paneer Dishes
                            </button>
                        </h2>
                        <div id="vegOne" class="accordion-collapse collapse show" data-bs-parent="#vegAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <!-- Left side -->
                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Paneer Keema</h5>
                                            <p>Finely crumbled paneer cooked in a rich, spiced tomato-onion gravy —
                                                bursting with aromatic
                                                Indian flavors.</p>
                                            <p>Serve(1-2)Peoples</p>
                                            <p class="mb-1 text-success fw-semibold">₹280</p>

                                        </div>

                                        <!-- Right side -->
                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/paneer-keema.avif" alt="Paneer Keema"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm addbtn"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="12345"
                                                data-name="Paneer Keema" data-price="280">
                                                Add
                                            </button>


                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="accordion-body">
                                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                        <div
                                            class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                            <div class="mb-2">
                                                <h5 class="fw-bold mb-1 text-dark">Paneer Biryani</h5>
                                                <p class="mb-1 text-success fw-semibold">₹280</p>
                                            </div>

                                            <div class="position-relative text-center">
                                                <img src="assets/images/menu/paneer-biryani.avif" alt="Veg Kolhapuri"
                                                    class="rounded mb-2"
                                                    style="width:130px; height:100px; object-fit:cover;">
                                                <button
                                                    class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm addbtn"
                                                    style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                    data-bs-toggle="modal" data-bs-target="#modal" data-id="12346"
                                                    data-name="Paneer Biryani" data-price="280">
                                                    Add
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="accordion-body">
                                    <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                        <div
                                            class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                            <div class="mb-2">
                                                <h5 class="fw-bold mb-1 text-dark">Panner Tikka</h5>
                                                <p class="mb-1 text-success fw-semibold">₹280</p>
                                            </div>

                                            <div class="position-relative text-center">
                                                <img src="assets/images/menu/paneer-tikka.avif" alt="Veg Kolhapuri"
                                                    class="rounded mb-2"
                                                    style="width:130px; height:100px; object-fit:cover;">
                                                <button
                                                    class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                    style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                    data-bs-toggle="modal" data-bs-target="#modal" data-id="12347"
                                                    data-name="Paneer Tikka" data-price="280">
                                                    Add
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Veg Kolhapuri -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#vegTwo" aria-expanded="false"
                                aria-controls="vegTwo">
                                Veg Items(3)
                            </button>
                        </h2>
                        <div id="vegTwo" class="accordion-collapse collapse" data-bs-parent="#vegAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Veg Biryani</h5>
                                            <p class="mb-1 text-success fw-semibold">₹280</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/veg-biryani.avif" alt="Veg Kolhapuri"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="123567"
                                                data-name="Veg Biryani" data-price="280">
                                                Add
                                            </button>

                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Veg Thali</h5>
                                            <p class="mb-1 text-success fw-semibold">₹280</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/veg-thali.avif" alt="Veg Kolhapuri"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="123568"
                                                data-name="Veg Thali" data-price="280">
                                                Add
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Veg Mixed Thali</h5>
                                            <p class="mb-1 text-success fw-semibold">₹280</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/veg-mixed.avif" alt="Veg Kolhapuri"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="123569"
                                                data-name=">Veg Mixed Thali" data-price="280">
                                                Add
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tiffin Section -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#vegThree" aria-expanded="false"
                                aria-controls="vegThree">
                                Tiffins Items
                            </button>
                        </h2>
                        <div id="vegThree" class="accordion-collapse collapse" data-bs-parent="#vegAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Idly</h5>
                                            <p class="mb-1 text-success fw-semibold">₹120</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/idly.avif" alt="Veg Kolhapuri"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="123671"
                                                data-name="Idly" data-price="120">
                                                style="position: absolute; bottom: -10px; left: 50%; transform:
                                                translateX(-50%);">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Dosa</h5>
                                            <p class="mb-1 text-success fw-semibold">₹120</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/dosa.avif" alt="Veg Kolhapuri"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="123672"
                                                data-name="Dosa" data-price="120">
                                                Add
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr class="divider">
                            </hr>
                            <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                    <div class="mb-2">
                                        <h5 class="fw-bold mb-1 text-dark">Fried Idly</h5>
                                        <p class="mb-1 text-success fw-semibold">₹120</p>
                                    </div>

                                    <div class="position-relative text-center">
                                        <img src="assets/images/menu/fried-idly.avif" alt="Veg Kolhapuri"
                                            class="rounded mb-2" style="width:130px; height:100px; object-fit:cover;">
                                        <button
                                            class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                            style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                            data-bs-toggle="modal" data-bs-target="#modal" data-id="123673"
                                            data-name="Fried Idly" data-price="120">
                                            Add
                                        </button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div><!-- /Veg Accordion -->
            </div>
        </section>


        <!-- ✅ Section 2: Non-Veg Dishes -->
        <section class="py-4" style="background-color: #f1f1f1;">
            <div class="container">
                <h3 class="fw-bold mb-4 text-center text-danger">Non-Veg Dishes</h3>

                <div class="accordion" id="nonVegAccordion">

                    <!-- Chicken Curry -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#nonVegOne" aria-expanded="true"
                                aria-controls="nonVegOne">
                                Chicken Dishes
                            </button>
                        </h2>
                        <div id="nonVegOne" class="accordion-collapse collapse show" data-bs-parent="#nonVegAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Chicken Biryani</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/biryani.webp" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="2345671"
                                                data-name="Chicken Biryani" data-price="420">
                                                Add
                                            </button>

                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Fry Chicken Biryani</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/fry-biryani.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="2345672"
                                                data-name="Fry Chicken Biryani" data-price="420">
                                                Add
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Chilli Chicken</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/chilli-chicken.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="2345673"
                                                data-name="Chilli Chicken" data-price="420">
                                                Add
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mutton Curry -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#nonVegTwo" aria-expanded="false"
                                aria-controls="nonVegTwo">
                                Mutton Specials
                            </button>
                        </h2>
                        <div id="nonVegTwo" class="accordion-collapse collapse" data-bs-parent="#nonVegAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Mutton Biryani</h5>
                                            <p class="mb-1 text-success fw-semibold">₹550</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/mutton.avif" alt="Mutton Rogan Josh"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="3456781"
                                                data-name="Mutton Biryani" data-price="550">
                                                Add
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Mutton Ghost Biryani</h5>
                                            <p class="mb-1 text-success fw-semibold">₹550</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/ghost-mutton-biryani.avif"
                                                alt="Mutton Rogan Josh" class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="3456782"
                                                data-name="Mutton Ghost Biryani" data-price="550">
                                                Add
                                            </button>

                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Legend Mutton Biryani</h5>
                                            <p class="mb-1 text-success fw-semibold">₹550</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/Legend-mutton-biryani.avif"
                                                alt="Mutton Rogan Josh" class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="3456782"
                                                data-name="Legend Mutton Biryani" data-price="550">
                                                Add
                                            </button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fran biryani -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#nonVegThree" aria-expanded="true"
                                aria-controls="nonVegThree">
                                Prawn Dishes
                            </button>
                        </h2>
                        <div id="nonVegThree" class="accordion-collapse collapse show"
                            data-bs-parent="#nonVegAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">prawn Biryani</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/fran-biryani.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="8765431"
                                                data-name="prawn Biryani" data-price="550">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">prawn-fry</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/prawn-fry.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="8765432"
                                                data-name="prawn fry" data-price="550"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);">

                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">prawn-Curry</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/fran-curry.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="8765433"
                                                data-name="prawn-Curry" data-price="550"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- fish biryani -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#nonVegFour" aria-expanded="true"
                                aria-controls="nonVegFour">
                                Fish Dishes
                            </button>
                        </h2>
                        <div id="nonVegFour" class="accordion-collapse collapse show" data-bs-parent="#nonVegAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Fish-Curry</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/fish-curry.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="9123567"
                                                data-name="Fish Curry" data-price="420">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Fish-Fry</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/fish-fry.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="9123566"
                                                data-name="Fish Fry" data-price="420">

                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <hr class="divider">
                                </hr>
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Fish Chilli</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/fish-chilli.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);"
                                                data-bs-toggle="modal" data-bs-target="#modal" data-id="9123565"
                                                data-name="Fish Chilli" data-price="420">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /Non-Veg Accordion -->
            </div>
        </section>


        <!-- Stater -->
        <section class="py-4" style="background-color: #f1f1f1;">
            <div class="container">
                <h3 class="fw-bold mb-4 text-center text-danger">Non-Veg Staters</h3>
                <div class="accordion" id="staterAccordion">
                    <!-- kebab -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#staterOne" aria-expanded="true"
                                aria-controls="staterOne">
                                Chicken kebab
                            </button>
                        </h2>
                        <div id="staterOne" class="accordion-collapse collapse show" data-bs-parent="#staterAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">dry Chicken</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/chilli-chicken.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- apollo fish -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#staterTwo" aria-expanded="true"
                                aria-controls="staterTwo">
                                Appolo Fish
                            </button>
                        </h2>
                        <div id="staterTwo" class="accordion-collapse collapse show" data-bs-parent="#staterAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Appolo Fish</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/fish-chilli.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--lallipop  -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#staterThree" aria-expanded="true"
                                aria-controls="staterThree">
                                Lollipops
                            </button>
                        </h2>
                        <div id="staterThree" class="accordion-collapse collapse show"
                            data-bs-parent="#staterAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark">Lollipops</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/Lollipop.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Chicken Manchurian -->
                    <div class="accordion-item border-0 border-bottom rounded-3 shadow-sm mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold bg-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#staterFour" aria-expanded="true"
                                aria-controls="staterFour">
                                Chicken Manchurian
                            </button>
                        </h2>
                        <div id="staterFour" class="accordion-collapse collapse show" data-bs-parent="#staterAccordion">
                            <div class="accordion-body">
                                <div class="card shadow-sm border-0 rounded-4 overflow-hidden mb-2">
                                    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">

                                        <div class="mb-2">
                                            <h5 class="fw-bold mb-1 text-dark"> Chicken Manchurian</h5>
                                            <p class="mb-1 text-success fw-semibold">₹420</p>
                                        </div>

                                        <div class="position-relative text-center">
                                            <img src="assets/images/menu/chicken-manchurian.avif" alt="Butter Chicken"
                                                class="rounded mb-2"
                                                style="width:130px; height:100px; object-fit:cover;">
                                            <button
                                                class="btn btn-success btn-sm fw-semibold px-4 py-1 rounded-pill shadow-sm"
                                                style="position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);">
                                                ADD
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <form id="orderForm">
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


    </main>
</body>

</html>