<?php
session_start();
include 'db_connect.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 // Include PHPMailer


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Check if the email exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $otp = rand(100000, 999999); // Generate a 6-digit OTP
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        
        // Send OTP via PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Change this based on your SMTP provider
            $mail->SMTPAuth = true;
            $mail->Username = 'pendemlikhitha2212@gmail.com'; // Your email
            $mail->Password = 'ohlf mnmv qtrl xqol'; // Your email password or App password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            
            $mail->setFrom('pendemlikhitha2212@gmail.com', 'QuickAdz');
            $mail->addAddress($email);
            $mail->Subject = "Password Reset OTP";
            $mail->Body = "Your OTP for password reset is: $otp";
            
            if ($mail->send()) {
                echo "<script>alert('OTP sent to your email!'); window.location.href='verify_otp.php';</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Mail not sent! Error: " . $mail->ErrorInfo . "');</script>";
        }
    } else {
        echo "<script>alert('Email not found!'); window.location.href='forgot_password.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
            url('https://plus.unsplash.com/premium_vector-1721709244257-ca6e6f85799a?q=80&w=2960&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
background-size: cover;
background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        h2 {
            margin-bottom: 5px;
            color: #333;
            font-size: 24px;
        }
        p {
            color: #777;
            font-size: 14px;
            margin-bottom: 20px;
        }
        input {
            width: 95%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
        }
        button {
            background-color: #6c5ce7;
            color: white;
            border: none;
            border-radius : 0px;
            padding: 10px 15px;
            cursor: pointer;
            width:95%;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #5a4dcf;
        }
    </style>
</head>
<body>
    <?php include 'Navbar1.php';?>
<div class="container">
<h2>Forgot Password</h2>
<p>Enter your email address</p>
    <form action="forgot_password.php" method="POST">
        
        <input type="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send OTP</button>
    </form>
    </div>
</body>
</html>
