<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp_entered = $_POST['otp'];

    if ($otp_entered == $_SESSION['otp']) {
        echo "<script>alert('OTP Verified!'); window.location.href='reset_password.php';</script>";
    } else {
        echo "<script>alert('Invalid OTP!'); window.location.href='verify_otp.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verify OTP</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
            url('https://plus.unsplash.com/premium_vector-1721709244257-ca6e6f85799a?q=80&w=2960&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
background-size: cover;
background-position: center;

            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 400px;
        }
        h2 {
            margin-bottom: 10px;
        }
        .info-box {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        input {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 95%;
            padding: 10px;
            background-color: #9370db;
            color: white;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #7a5ad9;
        }
    </style>
    
</head>
<body>
<?php include 'Navbar1.php';?>
<div class="container">
<h2>Verifying the OTP</h2>
    <form action="verify_otp.php" method="POST">
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <button type="submit">Verify</button>
    </form>
    </div>
</body>
</html>
