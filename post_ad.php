<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "classified_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Error: User not logged in. Please log in to post an ad.");
}

$user_id = $_SESSION['user_id'];
$msg = ""; // Message for success/failure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = isset($_POST['title']) ? $conn->real_escape_string($_POST['title']) : "";
    $description = isset($_POST['description']) ? $conn->real_escape_string($_POST['description']) : "";
    $category = isset($_POST['category']) ? $conn->real_escape_string($_POST['category']) : "";
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $location = isset($_POST['location']) ? $conn->real_escape_string($_POST['location']) : "";
    $contact_info = isset($_POST['contact_info']) ? $conn->real_escape_string($_POST['contact_info']) : "";
    
    $image_url = "";
    if (!empty($_FILES["image"]["name"])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES["image"]["type"], $allowedTypes)) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_url = $target_file;
            } else {
                $msg = "<div class='error-msg'>Error uploading image.</div>";
            }
        } else {
            $msg = "<div class='error-msg'>Invalid image format. Only JPG, PNG, and GIF allowed.</div>";
        }
    }
    
    // Insert ad into database
    $stmt = $conn->prepare("INSERT INTO ads (user_id, title, description, category, image_url, price, location, contact_info, status) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("issssdss", $user_id, $title, $description, $category, $image_url, $price, $location, $contact_info);

    if ($stmt->execute()) {
        $msg = "<div class='success-msg'>Ad posted successfully! Awaiting approval.</div>";
    } else {
        $msg = "<div class='error-msg'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post an Ad - QuickAdz</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #1e0033, #4c0070);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110vh;
            margin: 0;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            margin-top:2%;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
            width: 600px;
            backdrop-filter: blur(10px);
        }
        h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }
        option{
            color:black;
            background: rgba(255, 255, 255, 0.2);
        }
        label {
            font-weight: 400;
            display: block;
            margin: 10px 0 5px;
        }
        input, select, textarea {
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
        }
    </style>
</head>
<body>
    <?php include 'navbar.php' ?>
    <div class="form-container">
        <h2>Post a New Ad</h2>
        <?php echo $msg; ?>
        <form method="POST" enctype="multipart/form-data">
            <label>Title</label>
            <input type="text" name="title" required>
            <label>Description</label>
            <textarea name="description" required></textarea>
            <label>Category</label>
            <select name="category" required>
                <option value="art_crafts">Art & Crafts</option>
                <option value="vehicles">Vehicles</option>
                <option value="camera">Camera</option>
                <option value="fashion_beauty">Fashion & Beauty</option>
                <option value="books_hobbies">Books & Hobbies</option>
                <option value="electronics_computers">Electronics & Computers</option>
                <option value="kids_furniture">Kids Furniture</option>
                <option value="bikes_scooters">Bikes & Scooters</option>
                <option value="laptops">Laptops</option>
                <option value="mobiles">Mobiles</option>
                <option value="pets">Pets</option>
                <option value="home_living">Home & Living</option>
            </select>
            <label>Price</label>
            <input type="number" name="price" step="0.01" required>
            <label>Location</label>
            <input type="text" name="location" required>
            <label>Contact Info</label>
            <input type="text" name="contact_info" required>
            <label>Upload Image</label>
            <input type="file" name="image">
            <button type="submit" class="btn">Post Ad</button>
        </form>
    </div>
</body>
</html>
