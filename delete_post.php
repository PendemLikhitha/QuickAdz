<?php
include 'db_connect.php'; // Include database connection

// Check if ad_id is provided in the URL
if (isset($_GET['ad_id'])) {
    $ad_id = intval($_GET['ad_id']); // Convert to integer for safety

    // Delete the post
    $query = "DELETE FROM ads WHERE ad_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ad_id);

    if ($stmt->execute()) {
        echo "Post deleted successfully!";
        header("Location: dashboard.php"); // Redirect to dashboard
        exit;
    } else {
        echo "Error deleting post!";
    }
} else {
    echo "Invalid request!";
}
?>
