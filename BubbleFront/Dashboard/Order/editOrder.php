<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../Css/form.css'>
    <title>Edit order</title>
</head>

<body>
    <h1>Edit Order</h1>
    <?php
    require_once('../../Php/FoodCrudModel.php');
    $foodModel = new FoodCrudModel();
    $menu = $foodModel->getAll();

    require_once('../../Php/OrderCrudModel.php');
    $orderModel = new OrderCrudModel();
    $id = $_REQUEST['id'];
    $row = $orderModel->get($id);

    if (isset($_POST["updateOrder"])) {
        $data['id'] = $row['id'];
        $data['name'] = $_POST['name'];
        $data['phoneNumber'] = $_POST['phone'];
        $data['food'] = $_POST['menu'];
        $data['quantity'] = $_POST['quantity'];
        
        $data['orderedBy'] = $row['orderedBy'];
        $data['address'] = $_POST['address'];
        $price = $foodModel->getFoodPrice($_POST['menu'])['price'];
        $data['totalPrice'] = $price * $_POST['quantity'];
        if ($orderModel->update($data)) {
            echo "<script>alert('Order is updated successfully!')</script>";
            echo "<script>window.location.href = 'OrderDashboard.php';</script>";
        } else {
            echo "<script>alert('Order failed to update!')</script>";
            echo "<script>window.location.href = 'editOrder.php';</script>";
        }
    }
    ?>
    <form action="" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['name'] ?>" required>
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo $row['name'] ?>" required>
        <label for="menu" value="<?php echo $row['food'] ?>">Select your Menu</label>
        <select id="menu" name="menu">
            <?php
            foreach ($menu as $food) {
                $title = $food['name'];
                echo "<option value='$title'>$title</option>";
            } ?>
        </select>
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="1" max="20" placeholder="Enter quantity" value="<?php echo $row['quantity'] ?>" required>

        <label for="address">Delivery Address</label>
        <textarea class="deliveryAddress" name="address" placeholder="Address" value="<?php echo $row['address'] ?>"></textarea>

        <input type="submit" name="updateOrder" value="Update Order">
    </form>
</body>

</html>