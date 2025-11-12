<?php include 'connect.php';?>

<!-- register -->
 <?php
if(isset($_POST['save'])){
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $house = $_POST['house'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];

    $query = "INSERT INTO register (name,email,password,phone,house,street,city,state,pincode)
             VALUES ('$name','$email','$password','$phone','$house','$street','$city','$state','$pincode')";

    $data=mysqli_query($con, $query);
    if($data){
        echo"<script>alert('successful');</script>";
    }
    else{
         echo"<script>alert('failed');</script>";
    }

     header("Location: login.php"); // redirect after success
}
?>


