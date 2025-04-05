<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickAdz - Classified Ads</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <style>
        .page-header {
            background: url('https://images.unsplash.com/photo-1587161584760-f51779fb276a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            position: relative;
            height: 100vh;
        }
        .icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    background-color: #343a40; /* Dark background */
    color: white; /* Ensure the number is visible */
}

        
        .page-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(1, 1, 32, 0.7); /* Dark blue overlay */
        }
        
        .page-header .container {
            position: relative;
            z-index: 1;
        }

        .social-icons a {
            color: white;
            font-size: 2rem;
            margin: 0 15px;
            transition: transform 0.3s;
        }

        .social-icons a:hover {
            transform: scale(1.2);
        }

        .icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .bg-gradient-dark {
    background: linear-gradient(135deg, #1a1a2e, #16213e);
    padding: 60px 0;
}

.avatar-sm {
    
    width: 50px;
    height: 50px;
}

.rounded-circle {
    border-radius: 50%;
    
}

.carousel-inner img {
    
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.text-white-50 {
    opacity: 0.7;
}

    </style> 
    
</head>
<?php
     include 'navbar.php'; 
    ?>
<body class="bg-gray-400">

    <!-- Include Navbar -->
    <header class="draggable position-relative" draggable="true">
    <div class="page-header d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-9 text-center mx-auto">
                    <h1 class="text-white display-3 fw-bold mb-4">Classified Ads</h1>
                    <p class="lead text-white mb-4">We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play this game.</p>
                    <p class="text-white h6 text-uppercase mb-4">CONNECT WITH US ON:</p>
                    <div class="d-flex justify-content-center social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Best Classified Section -->
<section class="py-0 bg-gray-400 draggable" draggable="true">
    <div class="row">
        <div class="col-6 text-center mx-auto mt-5 mb-4">
        <h2 class="fw-bold display-4 text-custom-blue">Best Classified</h2>
        <p>See what people from all around the world are saying about our website.</p>
        </div>
    </div>
</section>

<style>
    .text-custom-blue {
        color:rgb(4, 15, 70) !important; /* Dark Blue */
    }
</style>


<!-- Social Conversations Section -->
<section class="draggable mb-5 bg-gray-400" draggable="true">
    <div class="container">
        <div class="row pt-6">
            <div class="col-md-4">
                <div class="info text-center">
                <div class="icon mx-auto mb-4">
    1
</div>
                    <h6>Social Conversations</h6>
                    <p>We get insulted by others, lose trust for those others. We get backstabbed by friends. It becomes harder for us to give others a hand.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info text-center">
                <div class="icon mx-auto mb-4">
    2
</div>
                    <h6>Social Conversations</h6>
                    <p>We get insulted by others, lose trust for those others. We get backstabbed by friends. It becomes harder for us to give others a hand.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info text-center">
                <div class="icon mx-auto mb-4">
    3
</div>
                    <h6>Social Conversations</h6>
                    <p>We get insulted by others, lose trust for those others. We get backstabbed by friends. It becomes harder for us to give others a hand.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="position-relative overflow-hidden  bg-gray-400 py-0">
<div class="row">
    <div class="col-6 text-center mx-auto mt-5 mb-4">
        <h2 class="fw-bold fs-2 text-dark">Clients Reviews</h2>
        <p class="text-white-70 fs-5">See what people from all around the world are saying about our website.</p>
    </div>
</div>


    
    <div class="bg-gradient-dark p-5">
        <div id="carouselExampleIndicators" class="carousel slide pt-5 pb-7" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators pb-5 d-flex justify-content-center align-items-center gap-3">
    <a href="javascript:;" class="d-flex flex-column align-items-center">
        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" 
             alt="..." class="shadow border-0"
             data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
             style="width: 45px; height: 45px; object-fit: cover; border-radius: 15px;">
    </a>
    <span class="text-white fs-4">|</span>
    <a href="javascript:;" class="d-flex flex-column align-items-center">
        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" 
             alt="..." class="shadow border-0"
             data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
             style="width: 45px; height: 45px; object-fit: cover; border-radius: 15px;">
    </a>
    <span class="text-white fs-4">|</span>
    <a href="javascript:;" class="d-flex flex-column align-items-center">
        <img src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" 
             alt="..." class="shadow border-0"
             data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
             style="width: 45px; height: 45px; object-fit: cover; border-radius: 15px;">
    </a>
</div>


            <!-- Carousel Items -->
            <div class="carousel-inner text-center">
    <div class="carousel-item active">
        <div class="d-flex flex-column align-items-center">
            <img class="mb-3 shadow border-0" 
                 src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-4.jpg" 
                 alt="" style="width: 70px; height: 70px; object-fit: cover; border-radius: 15px;">
        </div>
        <p class="lead text-white px-3">
            "We’re not always in the position that we want to be at. We’re constantly growing. We’re constantly making mistakes. We’re constantly trying to express ourselves and actualize our dreams."
        </p>
        <h5 class="text-white mt-3">John Down</h5>
        <p class="text-white-50">Visionary, Google</p>
        <br><br><br>
    </div>

    <div class="carousel-item">
        <div class="d-flex flex-column align-items-center">
            <img class="mb-3 shadow border-0" 
                 src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-3.jpg" 
                 alt="" style="width: 70px; height: 70px; object-fit: cover; border-radius: 15px;">
        </div>
        <p class="lead text-white px-3">
            "We’re not always in the position that we want to be at. We’re constantly growing. We’re constantly making mistakes. We’re constantly trying to express ourselves and actualize our dreams."
        </p>
        <h5 class="text-white mt-3">Marcell Glock</h5>
        <p class="text-white-50">Chief Executive, Spotify</p>
        <br><br>
        <br>

    </div>

    <div class="carousel-item">
        <div class="d-flex flex-column align-items-center">
            <img class="mb-3 shadow border-0" 
                 src="https://demos.creative-tim.com/soft-ui-design-system-pro/assets/img/team-2.jpg" 
                 alt="" style="width: 70px; height: 70px; object-fit: cover; border-radius: 15px;">
        </div>
        <p class="lead text-white px-3">
            "We’re not always in the position that we want to be at. We’re constantly growing. We’re constantly making mistakes. We’re constantly trying to express ourselves and actualize our dreams."
        </p>
        <h5 class="text-white mt-3">Mathew Goat</h5>
        <p class="text-white-50">Social Media Executive, Netflix</p>
        <br><br><br>
    </div>
</div>

</section>

<footer class="bg-gray-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="Home1.php" class="text-gray-700 hover:text-gray-900"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li><a href="About.php" class="text-gray-700 hover:text-gray-900"><i class="fas fa-angle-right"></i> About</a></li>
                    <li><a href="Categories.php" class="text-gray-700 hover:text-gray-900"><i class="fas fa-angle-right"></i> Categories</a></li>
                    <li><a href="post_ad.php" class="text-gray-700 hover:text-gray-900"><i class="fas fa-angle-right"></i> Post Ad</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fas fa-phone"></i> +91 7780260259</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fas fa-user"></i> Likhitha</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fas fa-envelope"></i> PendemLikhitha@gmail.com</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fas fa-map-marker-alt"></i> India</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<footer class="bg-gray-300 py-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-gray-500">
        <p>Privacy | copyrights@PendemLikhitha22761A05B0 | @2k25 All rights reserved</p>
    </div>
</footer>


<!-- Bootstrap JS -->
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>