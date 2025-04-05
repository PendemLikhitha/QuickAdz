<?php
include 'db_connect.php'; // Include your database connection file

// Check if ad_id is set in the URL
if (isset($_GET['ad_id'])) {
    $ad_id = intval($_GET['ad_id']); // Convert to integer for safety

    // Fetch post details from database
    $query = "SELECT * FROM ads WHERE ad_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ad_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Post not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Handle form submission for updating the post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = floatval($_POST['price']);
    $location = $_POST['location'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE ads SET title=?, description=?, category=?, price=?, location=? WHERE ad_id=?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("sssdsi", $title, $description, $category, $price, $location, $ad_id);

    if ($updateStmt->execute()) {
        echo "Post updated successfully!";
        header("Location: dashboard.php"); // Redirect to dashboard
        exit;
    } else {
        echo "Error updating post!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
            width: 500px;
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
            align_items:cent
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
    color: white; /* Change to a visible color */
    font-size: 16px;
}

    </style>
</head>
<body>
    <?php include 'navbar.php';?>
    <div class="form-container">
        <h2>Edit Post</h2>
        <form method="post">
            <label>Title:</label>
            <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>

            <label>Description:</label>
            <textarea name="description" required><?= htmlspecialchars($post['description']) ?></textarea>

            <label>Category:</label>
            <input type="text" name="category" value="<?= htmlspecialchars($post['category']) ?>" required>

            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($post['price']) ?>" required>

            <label>Location:</label>
            <input type="text" name="location" value="<?= htmlspecialchars($post['location']) ?>" required>

            <label>Status:</label>
<select name="status" disabled>
    <option value="active" <?= $post['status'] == 'active' ? 'selected' : '' ?>>Active</option>
    <option value="pending" <?= $post['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
</select>

<!-- Hidden input to ensure status value is submitted -->
<input type="hidden" name="status" value="<?= htmlspecialchars($post['status']) ?>">

            <button type="submit" class="btn">Update Post</button>
        </form>
    </div>
</body>
</html>
