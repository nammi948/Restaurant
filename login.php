<?php include 'connect.php';?>
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

        $role = $row['user'];
        if ($role === 'admin') {
            header("Location: dash.php");
            exit;
        }elseif($role === 'client'){
             echo "
        <script>
            localStorage.setItem('user_info', JSON.stringify($userData));
            alert('Login Successful');
            window.location = 'place.php';
        </script>
        ";
            //  header("Location: place.php");
            exit;
        }
        else {


    //     echo "<script>
    //     alert(' Login Failed! Please check your username or password.');
    //     window.location.href='dash.php';
    //   </script>";

        // echo "
        // <script>
        //     localStorage.setItem('user_info', JSON.stringify($userData));
        //     alert('Login Successful');
        //     window.location = 'place.php';
        // </script>
        // ";

    }
        // ✅ Store all info in localStorage via JavaScript
        // echo "
        // <script>
        //     localStorage.setItem('user_info', JSON.stringify($userData));
        //     alert('Login Successful');
        //     window.location = 'place.php';
        // </script>
        // ";
    } else {
        echo "<script>alert('Oops! login details are incorrect. Try again.'); window.location.href='index.php'</script>";
    }
}
?>
