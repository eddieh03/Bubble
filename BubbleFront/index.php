<?php 
session_start(); 

$hide = "hide";

if($_SESSION['role'] == 1){
    $hide = "";
}
else{
    $hide = "hide";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
    <section id="header">
        <a href="#"><img src="./Images/bubblee.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a class="<?php $hide ?>" href="Dashboard/User/UsersDashboard.php">Dashboard</a></li>
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="shopnow.html">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html" target="_self">About</a></li>
                <li><a href="contact.html" target="_self">Contact</a></li>
                <li><a href="login.php" target="_self">Log In/Register</a></li>
                <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>

            </ul>
        </div>

    </section>

    <section id="zara">

        <h2>Experience UNIQUENESS</h2>
        <h1> On all products</h1>
        <p>SALE ONLINE AND IN STORES</p>
        <button onclick="window.location.href='shopnow.html'"> Shop Now</button>


    </section>

    <section id="product1" class="section-p2">
        <h2>Products </h2>
        <p> New Collection</p>
        <div class="pro-container">
            <div class="pro">
                <img src="./Images/luis6-1.png" alt="">
                <div class="des">
                    <span>LOUIS VUITTON</span>
                    <h5>EMBOSSED KARAKORAM PONT NEUF JACKET</h5>
                    <h4>$3600</h4>
                </div>
            </div>
            <div class="pro">
                <img src="./Images/luis7-1.png" alt="">
                <div class="des">
                    <span>CHANEL</span>
                    <h5>PONT NEUF JACKET WITH JEWEL BUTTON</h5>
                    <h4>$2300</h4>
                </div>
            </div>
            <div class="pro">
                <img src="./Images/luis5-1.png" alt="">
                <div class="des">
                    <span>LOUIS VUITTON</span>
                    <h5>DAMIER STRIPED HOOK DETAIL JACKET</h5>
                    <h4>$4000</h4>
                </div>
            </div>
            <div class="pro">
                <img src="./Images/luis4-1.png" alt="">
                <div class="des">
                    <span>ARMANI</span>
                    <h5>EVENING PONT NEUF JACKET</h5>
                    <h4>$3500</h4>
                </div>
            </div>
            <div class="pro">
                <img src="./Images/luis3-1.png" alt="">
                <div class="des">
                    <span>LUIS VUITTON</span>
                    <h5>EVENING WAX FLOWER CUT AWAY JACKET</h5>
                    <h4>$3750</h4>
                </div>
            </div>
            <div class="pro">
                <img src="./Images/luis2-1.png" alt="">
                <div class="des">
                    <span>LOUIS VUITTON</span>
                    <h5>LVSE SINGLE-BREASTED EMBOSSED MONOGRAM JACKET</h5>
                    <h4>$2400</h4>
                </div>
            </div>
            <div class="pro">
                <img src="./Images/luis1-1.png" alt="">
                <div class="des">
                    <span>DIOR</span>
                    <h5>XL SHOULDER OVERSIZED JACKET</h5>
                    <h4>$2700</h4>
                </div>
            </div>
            <div class="pro">
                <img src="./Images/luis8-1.png" alt="">
                <div class="des">
                    <span>HUGO BOSS</span>
                    <h5>SIGNATURE RELAXED JACKET</h5>
                    <h4>$2100</h4>
                </div>
            </div>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h2>Up to <span>70% off</span> All Accessories</h2>
        <button class="normal">Explore More</button>


    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box banner-box2">
            <h4>Sales</h4>
            <h2>Women Collection</h2>
            <button class="white">Shop Now</button>
        </div>
        <div class="banner-box">
            <h4>Sales</h4>
            <h2>T-Shirts</h2>
            <button class="white">Shop Now</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -30% OFF</h3>
        </div>
    </section>

    <section id="login" class="section-p1 section-m1">
        <div class="discount">
            <h4>Sign up for DISCOUNT UP TO -50% OFF!</h4>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>

        </div>
    </section>

    <footer>
        <div class="section-p1">
            <div class="company_info">
                <ul>
                    <h1>Company Info</h1>
                    <li>About Us</li>
                    <li>Carrier</li>
                    <li>We are hiring</li>
                    <li>Blog</li>
                </ul>
            </div>
            <div class="legal">
                <ul>
                    <h1>Legal</h1>
                    <li>Company Info</li>
                    <li>About Us</li>
                    <li>Carrier</li>
                    <li>We are hiring</li>
                </ul>
            </div>
            <div class="features">
                <ul>
                    <h1>Features</h1>
                    <li>Business Marketing</li>
                    <li>User Analitycs</li>
                    <li>Live Chat</li>
                    <li>Unlimited Support</li>
                </ul>
            </div>
            <div class="resources">
                <ul>
                    <h1>Resources</h1>
                    <li>IOS & Android</li>
                    <li>Watch a Demo</li>
                    <li>Customers</li>
                    <li>API</li>
                </ul>
            </div>
            <div class="get_in_touch">
                <ul>
                    <h1>Get In Touch</h1>
                    <li><i class="uil uil-phone-alt"></i>(+383)45-477-358</li>
                    <li><i class="uil uil-map-marker"></i>Bahri Kuqi, Prishtine 10000</li>
                    <li><i class="uil uil-envelope"></i>bubbleshop@gmail.com</li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>