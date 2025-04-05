<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}

include 'db_connect.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard - QuickAdz</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background: #121212;
    color: white;
}

/* Sidebar Styling */
.sidebar {
    width: 250px;
    background: #1c1c1c;
    height: 100vh;
    position: fixed;
    padding: 20px;
    color: white;
}

.sidebar a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: white;
    margin-bottom: 10px;
    border-radius: 5px;
    transition: 0.3s;
}

.sidebar a:hover, .sidebar .active {
    background: #007bff;
}

/* Main content layout */
.content-wrapper {
    margin-left: 260px; /* Leave space for sidebar */
    padding: 20px;
    background: linear-gradient(135deg, #000000, #222831);
    min-height: 100vh;
    color: white;
}

/* Dark themed ad boxes */
.ad-box {
    background: #1e1e1e;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
    margin-bottom: 15px;
}

.navbar {
    margin-left:10%;
    background: #1c1c1c !important;
    color: white;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.ad-box img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 8px;
}

.no-ads {
    text-align: center;
    font-size: 18px;
    color: #bbb;
    padding: 20px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>

<?php include 'navbar1.php'; ?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar">
            <a href="dashboard.php" class="active">Dashboard</a>
            <a href="edit_profile.php">Edit Profile</a>
            <a href="post_ad.php">Post Ad</a>
            <a href="Home1.php">Home</a>
            <a href="About.php">About</a>
            <a href="Categories.php">Categories</a>
            <a href="logout.php">Logout</a>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-wrapper">
            <br><br>
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h3>
            <h2>My Ads</h2>

            <div class="row">
                <?php
                $user_id = $_SESSION['user_id'];
                $query = "SELECT * FROM ads WHERE user_id = ? ORDER BY created_at DESC";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $image_url = !empty($row['image_url']) ? htmlspecialchars($row['image_url']) : 'default-image.jpg';
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="ad-box">
                                <img src="<?php echo $image_url; ?>" alt="Ad Image">
                                <h3 class="ad-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                                <p><?php echo htmlspecialchars($row['description']); ?></p>
                                <p class="ad-date">Posted on: <?php echo date("F j, Y", strtotime($row['created_at'])); ?></p>
                                <a href="edit_post.php?ad_id=<?php echo $row['ad_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete_post.php?ad_id=<?php echo $row['ad_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="no-ads">You don’t have any ads yet. Click below to post an ad.</p>';
                }
                ?>
            </div>

            <div class="text-center mt-4">
                <a href="post_ad.php" class="btn btn-primary">Post an ad now!</a>
            </div>
        </main>
    </div>
</div>

</body>
</html>
