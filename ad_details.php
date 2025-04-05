<?php
require 'db_connect.php'; // Ensure you have a valid database connection file

if (isset($_GET['category'])) {
    $category = $_GET['category'];

    // Prepare the SQL query with case-insensitive category comparison
    $stmt = $conn->prepare("SELECT * FROM ads WHERE LOWER(category) = LOWER(?) AND status = 'active'");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch all results as an associative array
    $ads = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $ads = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ads Listing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .fixed-image {
            width: 100%;
            height: 300px;
            object-fit: cover; /* Ensures the image covers the fixed size */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Ads in Category: <?php echo htmlspecialchars($category ?? 'All'); ?></h2>

    <?php if (empty($ads)): ?>
        <p class="alert alert-warning">No ads found in this category.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($ads as $ad): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo htmlspecialchars($ad['image_url']); ?>" class="card-img-top fixed-image" alt="Ad Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($ad['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($ad['description']); ?></p>
                            <p class="card-text"><strong>Price:</strong> $<?php echo htmlspecialchars($ad['price']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
