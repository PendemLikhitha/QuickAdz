<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - QuickAdz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(135deg, #000000,rgb(48, 47, 47));
            color: white;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Admin Card */
        .admin-card {
            background: rgba(255, 255, 255, 0.1); /* Glassmorphism effect */
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }

        /* Heading */
        h2 {
            font-weight: bold;
            color: #f8f9fa;
            margin-bottom: 20px;
        }

        /* Buttons */
        .btn-custom {
            width: 100%;
            margin-top: 10px;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-success {
            background: #28a745;
            border: none;
        }

        .btn-success:hover {
            background: #1e7e34;
        }

        .btn-danger {
            background: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background: #a71d2a;
        }
    </style>
</head>
<body>

    <div class="admin-card">
        <h2>Welcome, Admin!</h2>
        <p>You have admin privileges.</p>
        <a href="manage_users.php" class="btn btn-primary btn-custom">Manage Users</a>
        <a href="manage_ads.php" class="btn btn-success btn-custom">Manage Ads</a>
        <a href="logout.php" class="btn btn-danger btn-custom">Logout</a>
    </div>

</body>
</html>
