<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../Css/form.css'>
    <title>Edit user</title>
</head>

<body>
    <h1>Edit User</h1>
    <?php
    include '../../Php/UserCrudModel.php';
    $userModel = new UserCrudModel();
    $id = $_REQUEST['id'];
    $row = $userModel->get($id);


    if (isset($_POST["updateUser"])) {
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
            $data['id'] = $row['id'];
            $data['name'] = $_POST['firstName'];
            $data['surname'] = $_POST['lastName'];
            $data['age'] = $_POST['age'];
            $data['address'] = $_POST['address'];
            $data['email'] = $_POST['email'];
            $data['password'] = $_POST['password'];
            $data['createdBy'] = $_SESSION['adminEmail'];
            if ($_POST['role'] == "user") {
                $data['role'] = 0;
            } else {
                $data['role'] = 1;
            };
            if ($userModel->update($data)) {
                echo "<script>alert('User data is updated successfully!')</script>";
                echo "<script>window.location.href = 'UsersDashboard.php';</script>";
            } else {
                echo "<script>alert('User data failed to update!')</script>";
                echo "<script>window.location.href = 'editUser.php';</script>";
            };
        } else {
            echo "<script>alert('Given data is not valid');</script>";
            $id = $_REQUEST['id'];
            echo "<script>window.location.href = 'editUser.php?id=$id';</script>";
        }
    }
    ?>
    <form action="" method="POST">
        <label for="firstName">Name</label>
        <input type="text" name="firstName" id="firstName" placeholder="First Name" value="<?php echo $row['name'] ?>" required>
        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" placeholder="Last Name" value="<?php echo $row['surname'] ?>" required>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Age" value="<?php echo $row['age'] ?>" required>
        <label for="address">Address</label>
        <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $row['address'] ?>" required>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" id="email" value="<?php echo $row['email'] ?>" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" value="<?php echo $row['password'] ?>" required>
        <label for="role">Role</label>
        <select id="role" name="role" value="<?php echo $row['role'] ?>" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" name="updateUser" value="Update User">
    </form>
</body>

</html>