<?php include 'connect.php';?>

<!-- register -->
<?php
if (isset($_POST['save'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $query = "INSERT INTO register (name, password, email, phone) 
              VALUES ('$username', '$password', '$email', '$phone')";

    $data = mysqli_query($con, $query);

    if ($data) {
        echo "<script>alert('Register successful');</script>";
    } else {
        echo "<script>alert('Register failed');</script>";
    }
}
?>



