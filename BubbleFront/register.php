
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../BubbleFront/CSS/register.css">
</head>
<body>

<?php
require_once("./Php/UserCrudModel.php");
if (isset($_POST['submit'])) {
    $firstNameRegex = '/^[A-Z]{1}[a-z]{2,30}$/';
    $lastNameRegex = '/^[A-Z]{1}[a-z]{2,30}$/';
    $emailRegex = '/^[A-Za-z0-9]+@[a-zA-z-]+\.com|net|edu$/';
    $passwordRegex = '/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\.\!\?\@\#\$\%\&])(?=.{6,20})/';

    if (!preg_match($firstNameRegex, $_POST['firstName'])) {
        $errors[] = "Please provide a valid first name!";
    }

    if (!preg_match($lastNameRegex, $_POST['lastName'])) {
        $errors[] = "Please provide a valid last name!";
    }

    if (!preg_match($emailRegex, $_POST['email'])) {
        $errors[] = "Please provide a valid email!";
    }

    if (!preg_match($passwordRegex, $_POST['password'])) {
        $errors[] = "Please provide a password with 6+ chars, including upper, lowercase and special chars!";
    }

    if (empty($errors)) {
        $userModel = new UserCrudModel();
        $userModel->setName($_POST['firstName']);
        $userModel->setSurname($_POST['lastName']);
        $userModel->setAge($_POST['age']);
        $userModel->setAddress($_POST['address']);
        $userModel->setEmail($_POST['email']);
        $userModel->setPassword($_POST['password']);
        $userModel->setRole(0);

        $userModel->insert();
    }else {
        echo "<script>alert('Given data is not valid');</script>";
        echo "<script>window.location.href = './register.php';</script>";
    }
}

?>

    <section id="header">
        <div class="logo"></div>
        <!-- <a href="#"><img src="/BubbleFront/Images/bubblee.png" class="logo" alt=""></a> -->
    
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
        <div class="register">

            <form method="POST">
                <h1>Register</h1>
                <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
                <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
                <label>
                    <input type="number" name="age" id="age" placeholder="Age" required>
                </label>
                <input type="text" name="address" id="address" placeholder="Address" required>
                <input type="email" name="email" placeholder="Email" id="email" required>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <button type="submit" class="register__button" id="submit" name="submit">Register</button>
                <p class="error"></p>
                <p>
                    Have an account? <a href="/BubbleFront/login.php"><b>Login Instead</b></a>
                </p>
            </form>
        </div>
    </main>
    <script src="./JavaScript/register.js"></script>
</body>
</html>