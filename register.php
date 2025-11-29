<?php
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (isset($_POST['save'])) {

    session_start();

    $names     = $_POST['name'];
    $emails    = $_POST['email'];
    $passwords = $_POST['password'];
    $phones    = $_POST['phone'];
    $houses    = $_POST['house'];
    $streets   = $_POST['street'];
    $cities    = $_POST['city'];
    $states    = $_POST['state'];
    $pincodes  = $_POST['pincode'];

    $totalUsers = count($names);

    for ($i = 0; $i < $totalUsers; $i++) {

        $name     = $names[$i];
        $email    = $emails[$i];
        $password = $passwords[$i];
        $phone    = $phones[$i];
        $house    = $houses[$i];
        $street   = $streets[$i];
        $city     = $cities[$i];
        $state    = $states[$i];
        $pincode  = $pincodes[$i];

        // -------- Insert into DB --------
        $query = "INSERT INTO register (name,email,password,phone,house,street,city,state,pincode)
                  VALUES ('$name','$email','$password','$phone','$house','$street','$city','$state','$pincode')";
        $data = mysqli_query($con, $query);

        // -------- Send mail only if DB Insert OK --------
        if ($data) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'vamsinammi143@gmail.com';
                $mail->Password   = 'ohaj cxrv kdfu ixlc';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom('vamsinammi143@gmail.com', 'Restaurant App');
                $mail->addAddress($email, $name);

                $mail->isHTML(true);
                $mail->Subject = "Registration Successful!";
                $mail->Body = "
                    <h3>Hello $name,</h3>
                    <p>Your registration is <b>successful</b>.</p>
                    <p>Thank you for joining us!</p>
                    <br>
                    <p><b>- Restaurant App Team</b></p>
                ";

                $mail->send();

            } catch (Exception $e) {
                echo "Email failed for $email : {$mail->ErrorInfo}<br>";
            }
        }
    }

    echo "<script>alert('All Users Registered Successfully');</script>";
    header("Location: index.php");
    exit();
}
?>
