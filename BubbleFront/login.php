<?php
require_once("./Php/UserCrudModel.php");
if (isset($_POST['submit'])) {
    $emailRegex = '/^[A-Za-z0-9]+@[a-zA-z-]+\.com|net|edu$/';
    $passwordRegex = '/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\.\!\?\@\#\$\%\&])(?=.{6,20})/';

    if (!preg_match($emailRegex, $_POST['email'])) {
        $errors[] = "Please provide a valid email!";
    }

    if (!preg_match($passwordRegex, $_POST['password'])) {
        $errors[] = "Please provide a password with 6+ chars, including upper, lowercase and special chars!";
    }

    if (empty($errors)) {
        $userModel = new UserCrudModel();
        $userModel->setEmail($_POST['email']);
        $userModel->setPassword($_POST['password']);
        $userModel->login();
    } else {
        echo "<script>alert('Please provide valid email and password!');</script>";
        echo "<script>window.location.href = '../login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../BubbleFront/CSS/login.css">
    <script src="../BubbleFront/JavaScript/login.js" defer></script>
</head>
<body>
    <section id="header">
        <a href="#"><img src="/BubbleFront/Images/bubblee.png" class="logo" alt=""></a>
    
        <div>
            <ul id="navbar">
    
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="shopnow.html">Shop</a></li>
                <li><a href="about.html" target="_self">About</a></li>
                <li><a href="contact.html" target="_self">Contact</a></li>
                <li><a href="login.html" target="_self">Log In</a></li>
                <li><a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a></li>
    
            </ul>
        </div>
    
    </section>
    <main>
        <div class="login">
            <form action="" method="POST">
                <h1>Login</h1>
                <input type="email" name="email" placeholder="Email" id="email" required>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <button type="submit" class="login__button" name="submit" id="submit">Login</button>
                <p class="error"></p>
                <p>
                    Don't have an account? <a href="register.php"><b>Register</b></a>
                </p>

            </form>
        </div>
    </main>
</body>
</html>