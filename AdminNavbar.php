<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Navbar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styleNavAdmin.css">
</head>

<body>

<header class="header-nav">
    <h1 class="logo-text">QuickAdz Admin</h1>

    <nav>
        <ul class="nav_links">
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="manage_users.php">Manage Users</a></li>
            <li><a href="manage_ads.php">Manage Ads</a></li>
            
            <?php 
            session_start();
            if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin') { ?>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>

</body>

</html>
