<?php include 'connect.php';?>

<?php
// if(isset($_POST['login'])){
//     $username=$_POST['name'];
//     $password=$_POST['password'];
//     $query="SELECT * FROM register WHERE name='$username' and password='$password'";
//     $result=mysqli_query($con,$query);
//     if (mysqli_num_rows($result) > 0) {
//         // echo "<script>alert('Login successful');</script>";
//          // ✅ Store user info to localStorage (JavaScript)
//         echo "
//         <script>
//             localStorage.setItem('user_info', '$username');
//             alert('Login Successful');
//             window.location = 'place.php';
//         </script>";
//        header("Location: place.php");
//     } else {
//         echo "<script>alert('Login failed');</script>";
//     }
// }
?>

<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Check user in database
    $query = "SELECT * FROM register WHERE name='$username' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // fetch user data

        // Prepare user data for JS (as JSON)
        $userData = json_encode($row);

        $_SESSION['user_data']= $row;

        // ✅ Store all info in localStorage via JavaScript
        echo "
        <script>
            localStorage.setItem('user_info', JSON.stringify($userData));
            alert('Login Successful');
            window.location = 'place.php';
        </script>
        ";
    } else {
        echo "<script>alert('Login failed');</script>";
    }
}
?>
