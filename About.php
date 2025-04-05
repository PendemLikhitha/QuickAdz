<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Classified Ads</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
        }
        /* Full-Screen Header Section */
        .page-header {
            background: url('https://images.unsplash.com/photo-1706516560059-b03772add416?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
            position: relative;
            height: 170vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 2rem;
            color: white;
        }

        .page-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 180vh;
            background: rgba(1, 1, 32, 0.7); /* Dark overlay */
        }

        .page-header .container {
            position: relative;
            z-index: 1;
            max-width: 2000px;
        }

        .about-content h1 {
            margin-top: 35rem; 
            font-size: 3.5rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: bold;
            margin-bottom: 0px;
        }

        .about-content p {
            text-align: center;
            margin-top: 2rem; 
            color: rgb(184, 134, 11);
            font-weight: bold;
            font-size: 1.3rem;
            line-height: 1.7;
            margin-left:20rem;
            margin-right:20rem;
            margin-bottom: 0rem;
        }
        .cta-button {
            display: inline-block;
            background: #ffcc00;
            color: #000;
            padding: 15px 30px;
            font-size: 1.2rem;
            margin-top: 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .cta-button:hover {
            background: #e6b800;
        }

        /* Section Below */
        .our-story-section {
            background: rgb(240, 211, 255);
            display: flex;
    flex-direction: column;
    color: #333;
            text-align: center;
            padding: 60px 20px;
            max-width: 2000px;
            margin: 0 auto;
        }

        .our-story-section h2 {
            font-size: 2.5rem;
            
            margin-bottom: 20px;
        }

        .our-story-section p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
        }
        .story-buttons button {
            display: block;
            width: 80%;
            max-width: 500px;
            background: rgb(11, 73, 136);
            border: none;
            padding: 15px;
            font-size: 1.2rem;
            color: white;
            text-align: center;
            margin: 10px auto;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .story-buttons button:hover {
            background: rgb(5, 50, 100);
        }
        
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <!-- Header Section -->
    <header>
        <div class="page-header">
            <div class="container about-content">
                <h1>About Us</h1><br>
                <p>Welcome to Classified Ads, your go-to platform for buying and selling items with ease.
                     Our mission is to connect people and businesses, making transactions seamless and hassle-free.</p>
                     <a href="#our-story" class="cta-button">Learn More</a>
            </div>
        </div>
    </header>
<br><br><br><br>
    <!-- Our Story Section -->
    <section id="our-story" class="our-story-section">
        <div class="container">
            <h2>Our Story</h2>
            <p>At QuickAdz, we believe in making buying and selling easier, faster, and more reliable for everyone. What started as a small idea to connect local buyers and sellers has now grown into a powerful classified ads platform that helps individuals and businesses reach a wider audience effortlessly.</p>
            <div class="story-buttons">
                <button>✅ Empower users with a seamless and secure marketplace.</button>
                <button>✅ Enhance local trade by bridging the gap between buyers and sellers.</button>
                <button>✅ Ensure trust and transparency in every transaction.</button>
            </div>
            <p>Whether you're looking to sell pre-loved items, find great deals, or promote your business, QuickAdz is the go-to platform. Join us on this journey and turn your listings into opportunities!</p>
        </div>
    </section>
    <section>
 
                <h2>Our Vision</h2><br>
                <p>To create a trusted and efficient marketplace where users can find, sell, and trade anything they need, all in one place.</p>
    </section>
</body>
</html>
