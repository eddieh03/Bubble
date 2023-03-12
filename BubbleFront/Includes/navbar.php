<div class = "nav-area">
<section id="header">
    <a href="#">
    <div class="logo"></div>
    </a>

    <div class="nav__ul hide">
        <ul id="navbar">

            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="shopnow.php">Shop</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php" target="_self">About</a></li>
            <li><a href="contact.php" target="_self">Contact</a></li>
            <li><a href="login.php" target="_self">Log In/Register</a></li>
            <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <?php
            if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                echo "<a href='Dashboard/Dashboards.php'><li class='dashboard__link'>Dashboard</li></a>";
            } else if (isset($_SESSION['role'])) {
                echo "<a href='order.php'><li class='order__link'>Order</li></a>";
            }
            ?>

        </ul>
    </div>
    <div class="nav__login hide">
        <?php
        if (isset($_SESSION['role'])) {
            echo "<a class='login' href='Php/logout.php'>Logout</a>";
        } else {
            echo "<a class='login'href='login.php'>Login</a>";
        }
        ?>

    </div>
    <a class="hamburger" onclick="toggleNavbar()">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffc515" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </a>
    <script>
        const toggleNavbar = function() {
            var links = document.querySelector(".nav__ul");
            var login = document.querySelector(".nav__login");
            var nav = document.querySelector("nav");
            if (links.classList.contains("hide")) {
                links.classList.remove("hide")
                login.classList.remove("hide")
                nav.style.height = "200px";
            } else {
                links.classList.add("hide")
                login.classList.add("hide")
                nav.style.height = "50px";

            }
        }
    </script>
<section>
</div>
