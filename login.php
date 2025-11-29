<?php 
include 'connect.php';
session_start();

if (isset($_POST['login'])) {

    $names = $_POST['name'];        // array
    $passwords = $_POST['password']; // array

    $totalUsers = count($names);     // count how many users submitted

    for ($i = 0; $i < $totalUsers; $i++) {

        $username = $names[$i];
        $password = $passwords[$i];

        // Validate empty entries (important)
        if ($username == "" || $password == "") {
            continue;
        }

        // Check user in database
        $query = "SELECT * FROM register WHERE name='$username' AND password='$password'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $role = $row['user'];

            // Store each logged-in user
            $_SESSION['logged_users'][] = $row;

            // Redirect based on role
            // if ($role === 'admin') {
            //     localStorage.setItem("user_info",$username);
            //     echo "<script>alert('Admin $username Login Successful');</script>";
            //     echo "<script>window.location='dash.php';</script>";
            // } 
            // elseif ($role === 'client') {
            //     localStorage.setItem("user_info",$username);
            //     echo "<script>alert('Client $username Login Successful');</script>";
            // }

            if ($role === 'admin') {
    $_SESSION['user_data'] = $username;
    $_SESSION['id'] = $row['id'];

    echo "<script>alert('Admin $username Login Successful');</script>";
    echo "<script>window.location='dash.php';</script>";
}
elseif ($role === 'client') {
    $_SESSION['user_data'] = $username;
    $_SESSION['id'] = $row['id'];

    echo "<script>alert('User $username Login Successful');</script>";
    echo "<script>window.location='place.php';</script>";
}


        } else {

            echo "<script>alert('Login failed for username: $username');</script>";
        }
    }

    // After the loop finishes
    echo "<script>window.location='place.php';</script>";
}
?>
