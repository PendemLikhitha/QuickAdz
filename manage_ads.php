<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require 'db_connect.php'; // Database connection

// Handle ad approval/rejection
if (isset($_GET['approve'])) {
    $ad_id = $_GET['approve'];
    $query = "UPDATE ads SET status='active' WHERE ad_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ad_id);
    $stmt->execute();
} elseif (isset($_GET['reject'])) {
    $ad_id = $_GET['reject'];
    $query = "UPDATE ads SET status='inactive' WHERE ad_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ad_id);
    $stmt->execute();
}
 elseif (isset($_GET['delete'])) {
    $ad_id = $_GET['delete'];
    $query = "DELETE FROM ads WHERE ad_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ad_id);
    $stmt->execute();
}

// Fetch all ads
$query = "SELECT * FROM ads";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Ads - QuickAdz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Manage Ads</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ad ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['ad_id']; ?></td>
                        <td><?= $row['title']; ?></td>
                        <td><?= $row['description']; ?></td>
                        <td><?= $row['status']; ?></td>
                        <td>
                            <?php if ($row['status'] === 'pending') { ?>
                                <a href="manage_ads.php?approve=<?= $row['ad_id']; ?>" class="btn btn-success btn-sm">Approve</a>
                                <a href="manage_ads.php?reject=<?= $row['ad_id']; ?>" class="btn btn-warning btn-sm">Reject</a>
                            <?php } ?>
                            <a href="manage_ads.php?delete=<?= $row['ad_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="admin_dashboard.php" class="btn btn-secondary">Back</a>
    </div>
</body>
</html>
