<?php
include("connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    mysqli_query($con, "DELETE FROM register WHERE id='$id'");
    echo "<script>alert('❌ Profile Deleted Successfully'); window.location='login.php';</script>";
}

if (isset($_GET['id'])) {

    echo "
    <script>
        if (confirm('Are you sure? Your account will be permanently deleted.')) {
            window.location.href = 'delete.php?id=" . $_GET['id'] . "';
        } else {
            alert('Deletion cancelled');
            window.location.href = 'user.php';
        }
    </script>
    ";
}
?>

