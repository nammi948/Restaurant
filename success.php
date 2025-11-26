<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfully</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
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
                    <a href="place.php" class="btn btn-outline-danger btn-sm m-3">Logout</a>
                </div>
            </div>
            </div>
        </nav>
    </header>
    <?php
echo "<h2>Order placed successfully!</h2>";

?>
  <!-- <a href="place.php" class="btn btn-warning w-100 fw-bold">
            return
        </a> -->
</body>
</html>