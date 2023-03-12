<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../Css/form.css'>
    <title>Add product</title>
</head>

<body>
    <h1>Add Product</h1>
    <?php

    require_once("../../Php/ProductCrudModel.php");
    if (isset($_POST['addProduct'])) {
        $productsModel = new ProductCrudModel();
        $productsModel->setName($_POST['name']);
        $productsModel->setDescription($_POST['description']);
        $productsModel->setPrice($_POST['price']);
        $productsModel->setCreatedBy($_SESSION['adminEmail']);
        $productsModel->setImage($_POST['image']);
        $productsModel->insertByAdmin();
        echo "<script>window.location.href = 'ProductsDashboard.php';</script>";
    }
    ?>
    <form action="" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" required>
        <label for="name">Description</label>
        <input type="text" name="description" id="description" placeholder="Description" required>
        <label for="price">Price</label>
        <input type="number" step="0.1" name="price" id="price" placeholder="Price" required>
        <input type="submit" name="addProduct" value="Add Product">
        <label for="name">Name</label>
        <input type="text" name="image" id="image" placeholder="Image" required>
    </form>


</body>

</html>