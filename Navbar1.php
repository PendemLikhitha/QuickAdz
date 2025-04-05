<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Navbar</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styleNav.css">

</head>

<body>

<header class="header-nav">

    <h1 class="logo-text">QuickAdz</h1>

<nav>

<ul class="nav_links">

<li><a href="Home1.php">Home</a></li>
<li><a href="About.php">About</a></li>
<li><a href="Categories.php">Categories</a></li>
</u>

</nav>

</header>

</body>

</html>