
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

     <!-- <-- Sidebar --> 
    <div class="sidebar pt-5">
        <ul class="nav flex-column mx-2 mt-4">
            <li class="nav-item">
                <a class="nav-link active text-light fw-bold" href="dash.php">
                    <i class="fa-solid fa-house me-2"></i> Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light" href="table.php">
                    <i class="fa-solid fa-user-plus me-2"></i> Registration
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-light" href="admin_view.php">
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