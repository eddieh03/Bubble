<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../Css/form.css'>
    <title>Edit contact</title>
</head>

<body>
    <h1>Edit Contact</h1>
    <?php
    include '../../Php/ContactCrudModel.php';
    $contactModel = new ContactCrudModel();
    $id = $_REQUEST['id'];
    $row = $contactModel->get($id);


    if (isset($_POST["updateContact"])) {
        $data['id'] = $row['id'];
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['message'] = $_POST['message'];
        if ($contactModel->update($data)) {
            echo "<script>alert('Contact is updated successfully!')</script>";
            echo "<script>window.location.href = 'ContactDashboard.php';</script>";
        } else {
            echo "<script>alert('Contact failed to update!')</script>";
            echo "<script>window.location.href = 'editContact.php';</script>";
        };
    }
    ?>
    <form action="" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['name'] ?>" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="email" value="<?php echo $row['email'] ?>" required>
        <label for="message">Message</label>
        <input type="text"name="message" id="message" placeholder="message" value="<?php echo $row['message'] ?>" required>

        <input type="submit" name="updateContact" value="Update Contact">
    </form>
</body>

</html>