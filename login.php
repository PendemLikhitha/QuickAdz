<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from database along with role
    $stmt = $conn->prepare("SELECT user_id, name, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $name, $hashed_password, $role);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;

            if ($role === 'admin') {
                echo "<script>alert('Admin Login Successful!'); window.location.href='admin_dashboard.php';</script>";
            } else {
                echo "<script>alert('User Login Successful!'); window.location.href='dashboard.php';</script>";
            }
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Email not registered!'); window.location.href='signup.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Login - QuickAdz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://images.unsplash.com/photo-1733503711060-1df31554390f?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        h2{
            color: rgba(3, 10, 63, 0.5);
            font-family: "Montserrat", sans-serif;
            font-weight: 600;

        }
        .left-panel h2{
            color: rgba(3, 10, 63);
            text-shadow: 2px 2px 5px rgba(255, 237, 227, 0.8); /* Glow effect */
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
        }
        .container {
            display: flex;
            width: 700px;
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .left-panel {
            flex: 1;
            background: rgba(0, 0, 0, 0.6);
            color: rgb(255, 140, 72);
            padding: 20px;
            font-size: 1.5rem;
            border-radius: 10px 10px 10px 10px;
            /* Center content */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    /* Add spacing */
    padding: 40px;
    line-height: 1.6; /* Improve text readability */
    letter-spacing: 1px; 
        }

        .right-panel {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        
        .input-box {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        .login-button {
            padding: 12px 24px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .signup-link {
            margin-top: 10px;
            font-size: 1rem;
            font-weight:bold;
            color: rgba(136, 149, 193, 0.9);
        }
        .signup-link a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
     <script>
        function validateForm() {
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!email.match(emailPattern)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container">
    <div class="left-panel">
    <i class="fas fa-bullhorn"></i>
        <h2>Welcome Back!</h2>
        <p>QuickAdz - Your trusted advertising platform.</p>
    </div>
    <div class="right-panel">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <input class="input-box" type="email" name="email" placeholder="Email" required>
            <input class="input-box" type="password" name="password" placeholder="Password" required>
            <button class="login-button" type="submit">Login</button>
        </form>
        <p class="signup-link"><a href="forgot_password.php">Forgot Password?</a></p>

        <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up here</a></p>

    </div>
</div>

</body>
</html>
