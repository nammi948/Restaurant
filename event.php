<?php include 'connect.php';?>
<?php
if(isset($_POST['event'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $event=$_POST['event_1'];

  $query = "INSERT INTO event (name, email, phone, event) VALUES ('$username', '$email', '$number', '$event')";
$data = mysqli_query($con, $query);


  if ($data) {
    echo "<script>alert('Done');</script>";
} else {
    echo "<script>alert('failed');</script>";
}
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurant Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      overflow-x: hidden;
      background-color: #f8f9fa;
    }

    /* Sidebar styling */
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #0d3f86;
    }

    /* Main content area */
    .content {
      margin-left: 250px;
      margin-top: 80px;
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
<header>
    <!-- Navbar (Top) -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="bi bi-shop"></i> Food Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
  </nav>

  <!-- Sidebar -->
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
        <a class="nav-link text-light" href="#order">
          <i class="fa-solid fa-cart-shopping me-2"></i> Order
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#event">
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
<section>
      <div class="content">
      <h2 class="text-center mb-4">Event List</h2>

      <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Number</th>
            <th scope="col">Event</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include_once 'connect.php';

          $fetch_list = "SELECT * FROM event";
          $res = mysqli_query($con, $fetch_list);

          if (!$res) {
              die("Query failed: " . mysqli_error($con));
          }

          if (mysqli_num_rows($res) > 0):
              while ($user = mysqli_fetch_assoc($res)):
          ?>
          <tr>
              <td><?= htmlspecialchars($user['id']); ?></td>
            <td><?= htmlspecialchars($user['name']); ?></td>
            <td><?= htmlspecialchars($user['email']); ?></td>
            <td><?= htmlspecialchars($user['phone']); ?></td>
            <td><?= htmlspecialchars($user['event']); ?></td>
          </tr>
          <?php
              endwhile;
          else:
          ?>
          <tr>
            <td colspan="4" class="text-muted">No records found</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
</section>
 </main>

  <!-- Update Modal -->
 < <div class="modal fade" id="update" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <input type="hidden" name="student_id" id="update_id">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" id="update_name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="text" class="form-control" name="password" id="update_password" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="update_email" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Mobile</label>
              <input type="text" class="form-control" name="phone" id="update_phone" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <input type="hidden" name="student_id" id="delete_id">
            <p>Are you sure you want to delete this record?</p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger" name="delete">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
