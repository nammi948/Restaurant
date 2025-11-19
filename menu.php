<?php include 'connect.php'; ?>

<?php
if(isset($_POST['place_order'])){
  
    $name     = $_POST['name'];
    $item     = $_POST['food_id'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $quantity = $_POST['quantity'];  
    $price    = $_POST['price'];    

    $query = "INSERT INTO orders (name, item, email, phone, address, quantity, price) 
              VALUES ('$name','$item', '$email', '$phone', '$address', '$quantity', '$price')";

    $data = mysqli_query($con, $query);

    if($data){
      echo "<script>alert('Order placed successfully');</script>";
    } else {
        echo "<script>alert('Order failed');</script>";
    }
}
?>
