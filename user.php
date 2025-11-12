<?php
session_start();
include("connect.php");

// ✅ Get ID from URL (user.php?id=5)
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    // ✅ Fetch user data
    $query = "SELECT * FROM register WHERE id='$id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('No user found'); window.location='login.php';</script>";
        exit;
    }

} else {
    echo "<script>alert('❌ ID Missing in URL (user.php?id=5)'); window.location='login.php';</script>";
    exit;
}


// ✅ Update Logic
if (isset($_POST['update'])) {

    $id       = $_POST['id'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $phone    = $_POST['phone'];
    $house    = $_POST['house'];
    $street   = $_POST['street'];
    $city     = $_POST['city'];
    $state    = $_POST['state'];
    $pincode  = $_POST['pincode'];

    $updateQuery = "UPDATE register SET
        name='$name',
        email='$email',
        password='$password',
        phone='$phone',
        house='$house',
        street='$street',
        city='$city',
        state='$state',
        pincode='$pincode'
        WHERE id='$id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>
                alert('✅ Profile Updated Successfully');
                window.location='user.php?id=$id';  // <-- keep id in URL
              </script>";
        exit;
    } else {
        echo "<script>alert('❌ Update Failed');</script>";
    }
}
    
// ✅ DELETE PROFILE (with confirmation alert)


?>


<!DOCTYPE html>
<html>
<head>
<title>Edit Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-light">
<header class="sticky-top shadow-sm">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand px-3 d-flex align-items-center" href="#">
                <img src="assets/images/logo1.jpg" class="img-fluid rounded-circle me-2"
                    style="width:65px; height:65px;" alt="Logo">
                <span class="fw-bold fs-4">Royal Restaurant</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="#" style="font-size: 19px;">Welcome to Our Restaurant</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#" style="font-size: 19px;">Enjoy Our Services</a></li>
                    <li class="nav-item"><a class="nav-link fw-semibold" href="#" style="font-size: 19px;">Taste Our Dishes</a></li>
                </ul>

                <!-- Logout Button -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="place.php" class="btn btn-danger d-flex align-items-center gap-2">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</header>



<section class="py-5">
<div class="container">
    <div class="card shadow-lg p-4 rounded-4">
        
        <h3 class="text-center text-primary">Update Profile</h3>
        <hr>

        <form action="" method="POST">

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input name="name" value="<?php echo $row['name']; ?>" class="form-control" type="text">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input name="email" value="<?php echo $row['email']; ?>" class="form-control" type="email">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input name="password" value="<?php echo $row['password']; ?>" class="form-control" type="text">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input name="phone" value="<?php echo $row['phone']; ?>" class="form-control" type="text">
                </div>

                <div class="col-md-4">
                    <label class="form-label">House No</label>
                    <input name="house" value="<?php echo $row['house']; ?>" class="form-control" type="text">
                </div>

                <div class="col-md-4">
                    <label class="form-label">Street</label>
                    <input name="street" value="<?php echo $row['street']; ?>" class="form-control" type="text">
                </div>

                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <input name="city" value="<?php echo $row['city']; ?>" class="form-control" type="text">
                </div>

                <div class="col-md-6">
                    <label class="form-label">State</label>
                    <input name="state" value="<?php echo $row['state']; ?>" class="form-control" type="text">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Pincode</label>
                    <input name="pincode" value="<?php echo $row['pincode']; ?>" class="form-control" type="text">
                </div>
            </div>

            <div class="mt-4 d-flex gap-3">
                <button type="submit" name="update" class="btn btn-success w-50">✅ Update</button>

                <a href="delete_profile.php?id=<?php echo $row['id']; ?>" 
                   class="btn btn-danger w-50"
                   onclick="return confirm('Are you sure you want to delete this record?');">
                   ❌ Delete Profile
                </a>
            </div>

        </form>
    </div>
</div>
</section>

</body>
</html>
