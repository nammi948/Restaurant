<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            overflow-x: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #0d3f86;
            border-right: 1px solid #ddd;
        }

        /* Main content area */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Responsive adjustment */
        @media (max-width: 767px) {
            .sidebar {
                position: relative;
                height: auto;
                width: 100%;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar (Top) -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info  fixed-top">
        <div class="container-fluid">
               <a class="navbar-brand" href="#"><i class="bi bi-shop"></i> Food Dashboard</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
             <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#" style="font-size: 20px;">Welcome to Our Restaurant</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="font-size: 20px;">Enjoy Our Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="font-size: 20px;">Taste Our Dishes</a></li>
              </ul>
            </div>
          </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar pt-5">
        <ul class="nav flex-column mx-2 mt-4">
            <li class="nav-item">
                <a class="nav-link active text-light fw-bold" href="#">
                    <i class="fa-solid fa-house me-2"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light" href="table.php">
                    <i class="fa-solid fa-user-plus me-2"></i> Registration
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light" href="#order">
                    <i class="fa-solid fa-cart-shopping me-2"></i> Order
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light" href="event.php">
                    <i class="fa-solid fa-calendar-days me-2"></i> Event
                </a>
            </li>

            <li class="nav-item">
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
</header>
    <!-- Main Content -->
<main> 
    <div class="content pt-5">
        <div class="container mt-4">

            <!-- Dashboard Cards -->
<section>
    <div class="row g-3">
                <div class="col-md-4">
                    <div class="card bg-warning shadow">
                        <div class="card-body d-flex align-items-center">
                            <img src="https://icon-library.com/images/best-icon-png/best-icon-png-8.jpg" alt="Food"
                                class="rounded-circle me-3" width="60">
                            <h6 class="m-0">Good Food, Good Health</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body d-flex align-items-center">
                            <img src="https://tse4.mm.bing.net/th/id/OIP.gfqsA2zmlpbjIt00PT5A0gHaHa?pid=ImgDet&w=474&h=474&rs=1&o=7&rm=3"
                                alt="Joy" class="rounded-circle me-3" width="60">
                            <h6 class="m-0">Flavors That Bring Joy</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body d-flex align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/3712/3712214.png" alt="Taste"
                                class="rounded-circle me-3" width="60">
                            <h6 class="m-0">Taste. Love. Eat. Repeat. Smile.</h6>
                        </div>
                    </div>
                </div>
            </div>
</section>
            <!-- Awards Section -->
            <section class="mt-3">
                <div class="container" style="background-color: rgb(202, 202, 248);">
                    <div class="card" style="background-color: rgb(146, 247, 247);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <h1 class="title">Recognition & Awards</h1>
                                    <p class=" text-muted fw-100">The Restaurant Awards Issue honors exceptional chefs
                                        and
                                        restaurants that redefine taste,
                                        creativity, and hospitality. It celebrates culinary excellence and inspires the
                                        future
                                        of dining
                                        worldwide.</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mt-2 shadow-lg">
                                        <div class="card-body">
                                            <div class="awards-grid">
                                                <div class="award-item d-flex  align-items-center">
                                                    <div class="award-icon">
                                                        <i class="fa-solid fa-trophy fs-1"></i>
                                                    </div>
                                                    <div class="award-details  mx-auto">
                                                        <h5>Best Restaurant 2024</h4>
                                                            <span>City Dining Awards</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4 shadow-lg">
                                        <div class="card-body">
                                            <div class="award-item d-flex  align-items-center">
                                                <div class="award-icon">
                                                    <i class="fa-solid fa-star fs-1"></i>
                                                </div>
                                                <div class="award-details mx-auto">
                                                    <h4>5-Star Rating</h4>
                                                    <span>Local Food Guide</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="card mt-2 shadow-lg">
                                        <div class="card-body">
                                            <div class="award-item d-flex  align-items-center">
                                                <div class="award-icon">
                                                    <i class="fa-solid fa-gem fs-1"></i>
                                                </div>
                                                <div class="award-details mx-auto">
                                                    <h4>Excellence Award</h4>
                                                    <span>Culinary Institute</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3 shadow-lg">
                                        <div class="card-body">
                                            <div class="award-item d-flex  align-items-center">
                                                <div class="award-icon">
                                                    <i class="fa-solid fa-heart fs-1"></i>
                                                </div>
                                                <div class="award-details mx-auto">
                                                    <h4>Customer Choice</h4>
                                                    <span>Community Favorite</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section class="mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="card" style="background-color: rgb(255, 211, 218);">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <i class="bi bi-geo fs-1"></i>
                                        <div class="location mx-5">
                                            <h5 class="title">Our Address</h5>
                                            <p class="text-muted">Diamond-Park,Circle road,Visakapatnam.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card" style="background-color: rgb(255, 211, 218);">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <i class="bi bi-envelope fs-1"></i>
                                        <div class="location mx-5">
                                            <h5 class="title">Email Address</h5>
                                            <p class="text-muted">info@example.com
                                                contact@example.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card" style="background-color: rgb(255, 211, 218);">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <i class="bi bi-headset fs-1"></i>
                                        <div class="location mx-4">
                                            <h5 class="title">Hours</h5>
                                            <p class="text-muted">Sunday-Fri: 9 AM - 6 PM Saturday: 9 AM - 4 PM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>