<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../Css/form.css'>
    <title>Add user</title>
</head>

<body>
    <h1>Add User</h1>
    <?php

    require_once("../../Php/UserCrudModel.php");
    if (isset($_POST['addUser'])) {
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
            if ($_POST['role'] == "user") {
                $userModel->setRole(0);
            } else {
                $userModel->setRole(1);
            }
            $userModel->insertByAdmin();
            echo "<script>window.location.href = 'UsersDashboard.php';</script>";
        } else {
            echo "<script>alert('Given data is not valid');</script>";
            echo "<script>window.location.href = 'addUser.php';</script>";
        }
    }
    ?>
    <form action="" method="POST">
        <label for="firstName">Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name" required>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Age" required>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" placeholder="Address" required>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <label for="role">Role</label>
        <select id="role" name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="addUser" value="Add User">
    </form>


</body>

</html>