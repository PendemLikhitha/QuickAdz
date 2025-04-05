<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $phone = $_POST['phone'];

    $check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered!'); window.location.href='signup.php';</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $phone);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Please log in.'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
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
    <title>Sign Up - QuickAdz</title>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("form");
        const emailInput = document.querySelector("input[name='email']");
        const passwordInput = document.querySelector("input[name='password']");

        form.addEventListener("submit", function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });

        emailInput.addEventListener("blur", function() {
            checkEmailDuplicate(emailInput.value);
        });
    });

    function validateForm() {
        const name = document.querySelector("input[name='name']").value.trim();
        const email = document.querySelector("input[name='email']").value.trim();
        const password = document.querySelector("input[name='password']").value;
        const phone = document.querySelector("input[name='phone']").value.trim();

        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const phoneRegex = /^[0-9]{10}$/;

        if (name === "") {
            alert("Name is required");
            return false;
        }
        if (!emailRegex.test(email)) {
            alert("Invalid email format");
            return false;
        }
        if (!passwordRegex.test(password)) {
            alert("Password must be at least 8 characters long, include 1 uppercase, 1 lowercase, 1 number, and 1 special character");
            return false;
        }
        if (phone !== "" && !phoneRegex.test(phone)) {
            alert("Phone number must be 10 digits");
            return false;
        }
        return true;
    }

    function checkEmailDuplicate(email) {
        if (email === "") return;

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "check_email.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText === "exists") {
                    alert("Email already registered!");
                    document.querySelector("input[name='email']").value = "";
                }
            }
        };
        xhr.send("email=" + encodeURIComponent(email));
    }
</script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://images.unsplash.com/photo-1733503711060-1df31554390f?q=80&w=2940&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px 10px 10px 10px;
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
        .signup-button {
            padding: 12px 24px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }
        .login-link {
            margin-top: 10px;
            font-size: 1rem;
        }
        .login-link a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container">
    <div class="left-panel">
        <i class="fas fa-bullhorn"></i>
        <h2>Join QuickAdz</h2>
        <p>Your trusted advertising platform.</p>
    </div>
    <div class="right-panel">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <input class="input-box" type="text" name="name" placeholder="Full Name" required>
            <input class="input-box" type="email" name="email" placeholder="Email" required>
            <input class="input-box" type="password" name="password" placeholder="Password" required>
            <input class="input-box" type="text" name="phone" placeholder="Phone Number">
            <button class="signup-button" type="submit">Register</button>
        </form>
        <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>

</body>
</html>
