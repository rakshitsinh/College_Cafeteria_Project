<?php 


session_start();  // Start session to track user login

// Check if user is logged in by checking the session
$isLoggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Restaurant</title>
    <link rel="stylesheet" href="p1.css">
</head>
<body>
<nav>
    <div class="logo">
        <a href="" >
            <img src="/Project/Images/logo.jpg" alt="Restaurant Logo"   >
        </a>
    </div>
    <div class = "heading">
        <h1 style="font-size: 50px;">
            Electronics Store
        </h1>
    </div>

    <ul>
        <li><a href="#menu">Menu</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#contact">Contact</a></li>

        <?php if ($isLoggedIn): ?>
            <li><img id="profileIcon" class="logo-img" src="/Project/Images/dp.jpg" alt="Profile Icon"></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="http://localhost/login/">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>


    <!-- Profile Modal -->
    <div id="profileModal" class="modal">
        <span class="close" id="closeModal">&times;</span>
        <h2>User Profile</h2>
        <p>Email: <?php echo $_SESSION['email'] ?? 'N/A'; ?></p>
    </div>

    <section id="menu">
        <div>
        <h1 class = "MenuTypes"  style="font-size: 40px;">ITEMS</h1>
    <h2 class = "MenuTypes">Desktops</h2>
 


    <div class="card-container">
        <div class="card">
            <img src="/Project/Images/Asus.jpg" alt="Asus">
            <h2>Asus (Rs.70000)</h2>
            <button onclick="addToCart('Asus', 70000)">Add to Cart</button>
        </div>
        <div class="card">
            <img src="/Project/Images/hp.jpg" alt="hp">
            <h2>Hp (Rs.80000)</h2>
            <button onclick="addToCart('Hp', 800000)">Add to Cart</button>
        </div>
        <div class="card">
            <img src="/Project/Images/Mac.jpg" alt="Mac">
            <h2>Mac (Rs.100000)</h2>
            <button onclick="addToCart('Mac', 100000)">Add to Cart</button>
        </div>
        </div>
        <section id="menu">
        <div>
    
    <h2 class = "MenuTypes">Desktops</h2>
 


    <div class="card-container">
        <div class="card">
            <img src="/Project/Images/Asus.jpg" alt="Asus">
            <h2>Asus (Rs.70000)</h2>
            <button onclick="addToCart('Asus', 70000)">Add to Cart</button>
        </div>
        <div class="card">
            <img src="/Project/Images/hp.jpg" alt="hp">
            <h2>Hp (Rs.80000)</h2>
            <button onclick="addToCart('Hp', 800000)">Add to Cart</button>
        </div>
        <div class="card">
            <img src="/Project/Images/Mac.jpg" alt="Mac">
            <h2>Mac (Rs.100000)</h2>
            <button onclick="addToCart('Mac', 100000)">Add to Cart</button>
        </div>
        </div>
        

        
        </section>


    

    
    <section id="cart">
        <!-- p1.php - Adding Buy Now Button -->

<div id="cart">
    <h2>Your Cart</h2>
    <div id="cart-items"></div>
    <p id="total">Total: 0 Rs</p>
    <button onclick="buyNow()">Buy Now</button>
    <div id="transaction-history"></div>
</div>

    </section>
    
    <section id="about">
        <h2>About Us</h2>
        <p>Welcome to Electronics Store your trusted destination for high-quality electronic devices. We are passionate about technology and committed to providing our customers with the latest innovations at competitive prices.

Founded in 2024, we aim to create a seamless shopping experience by offering a curated selection of top brands and cutting-edge products. Our team of experts is dedicated to ensuring you find the perfect device to meet your needs.

At Electronics Store, customer satisfaction is our priority. We offer fast shipping, easy returns, and exceptional customer support. Join our community of tech enthusiasts and discover the future of electronics with us.

Thank you for choosing Electronics Store—where technology meets reliability.</p>
    </section>

    <section id="contact">
        <h2>Contact No</h2>
        <p>+91 7262824006</p>
    </section>

    <footer>
        <p>&copy; Copyright  Pratik Dashore 2024 All rights reserved</p>
    </footer>

    <script src = "p1.js">
        const profileIcon = document.getElementById('profileIcon');
        const profileModal = document.getElementById('profileModal');
        const closeModal = document.getElementById('closeModal');

        if (profileIcon) {
            profileIcon.addEventListener('click', () => {
                profileModal.classList.add('show');
            });
        }

        closeModal.addEventListener('click', () => {
            profileModal.classList.remove('show');
        });
    </script>
</body>
</html>
