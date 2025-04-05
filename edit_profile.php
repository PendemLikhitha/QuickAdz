<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php'; // Database connection file

$user_id = $_SESSION['user_id'];
$message = "";

// Fetch user details
$query = "SELECT name, email, phone FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (!empty($new_password) && $new_password !== $confirm_password) {
        $message = "<div id='status'>Passwords do not match.</div>";
    } else {
        if (!empty($new_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET name=?, phone=?, password=? WHERE user_id=?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("sssi", $name, $phone, $hashed_password, $user_id);
        } else {
            $update_query = "UPDATE users SET name=?, phone=? WHERE user_id=?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("ssi", $name, $phone, $user_id);
        }

        if ($stmt->execute()) {
            $message = "<div id='status'>Profile updated successfully!</div>";
            $_SESSION['name'] = $name;
        } else {
            $message = "<div id='status'>Error updating profile. Please try again.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - QuickAdz</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #1e0033, #4c0070);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            margin-top: 25px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            width: 400px;
            backdrop-filter: blur(10px);
        }
        h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }
        label {
            font-weight: 400;
            display: block;
            margin: 10px 0 5px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 16px;
            outline: none;
        }
        input::placeholder, textarea::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        textarea {
            resize: none;
            height: 80px;
        }
        .btn {
            display: block;
            width: 100%;
            background: #ff0080;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }
        .btn:hover {
            background: #d1006e;
        }
        #status {
            color: white;
            font-size: 16px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php' ?>
<div class="form-container">
    <h2>Edit Profile</h2>
    <?= $message; ?>

    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']); ?>" required>

        <label>Email (cannot be changed)</label>
        <input type="email" value="<?= htmlspecialchars($user['email']); ?>" disabled>

        <label>Mobile Number</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']); ?>" required>

        <label>New Password (optional)</label>
        <input type="password" name="new_password">

        <label>Confirm New Password</label>
        <input type="password" name="confirm_password">

        <button type="submit" class="btn">Update Profile</button>
        <a href="dashboard.php" class="btn" style="background: #555;">Cancel</a>
    </form>
</div>

</body>
</html>
