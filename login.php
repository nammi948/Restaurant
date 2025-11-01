<?php include 'connect.php';?>
<?php
if(isset($_POST['login'])){
    $username=$_POST['name'];
    $password=$_POST['password'];
    $query="SELECT * FROM register WHERE name='$username' and password='$password'";
    $result=mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Login successful');</script>";
       header("Location: dash.php");
    } else {
        echo "<script>alert('Login failed');</script>";
    }
}
?>