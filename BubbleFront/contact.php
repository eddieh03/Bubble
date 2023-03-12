<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="./CSS/contact.css">
</head>
<body>
    <section id="header">
        <a href="#"><img src="Images/bubblee.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">

                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="shopnow.html">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html" target="_self">About</a></li>
                <li><a href="contact.html" target="_self">Contact</a></li>
                <li><a href="login.html" target="_self">Log In/Register</a></li>
                <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>

            </ul>
        </div>

    </section>
    <?php
    include("./Php/ContactCrudModel.php");
    if (isset($_POST['submit'])) {
        $contactModel = new ContactCrudModel();
        $contactModel->setName($_POST['name']);
        $contactModel->setEmail($_POST['email']);
        $contactModel->setMessage($_POST['message']);

        $contactModel->insert();
    }
    ?>
    <main>
        <h1 class="h11">Contact</h1>
        <div class="content">
            <div class="user-info">
                <input type="text" name="name" placeholder="First Name">
                <input type="email" name="email" placeholder="E-mail">
                <textarea type="text" name="message" id="msg"></textarea>
                <button type="submit" name="submit">Submit</button>
            </div>
        </div>
    </main>
    <footer>
    <div class="section-p1">
        <div class="company_info">
            <ul>
                <h3>Company Info</h3>
                <li>About Us</li>
                <li>Carrier</li>
                <li>We are hiring</li>
                <li>Blog</li>
            </ul>
        </div>
        <div class="legal">
            <ul>
                <h3>Legal</h3>
                <li>Company Info</li>
                <li>About Us</li>
                <li>Carrier</li>
                <li>We are hiring</li>
            </ul>
        </div>
        <div class="features">
            <ul>
                <h3>Features</h3>
                <li>Business Marketing</li>
                <li>User Analitycs</li>
                <li>Live Chat</li>
                <li>Unlimited Support</li>
            </ul>
        </div>
        <div class="resources">
            <ul>
                <h3>Resources</h3>
                <li>IOS & Android</li>
                <li>Watch a Demo</li>
                <li>Customers</li>
                <li>API</li>
            </ul>
        </div>
        <div class="get_in_touch">
            <ul>
                <h3>Get In Touch</h3>
                <li><i class="uil uil-phone-alt"></i>(+383)45-477-358</li>
                <li><i class="uil uil-map-marker"></i>Bahri Kuqi, Prishtine 10000</li>
                <li><i class="uil uil-envelope"></i>bubbleshop@gmail.com</li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>