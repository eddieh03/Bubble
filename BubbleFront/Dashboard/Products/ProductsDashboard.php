<?php
session_start();
if (!(isset($_SESSION['role']) && $_SESSION['role'] == 1)) {
  echo "<script>alert('Login with admin account to access Dashboards!');</script>";
  echo "<script>window.location.href='../../login.php'</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Products Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/dashboard.css">
</head>

<body>
  <nav>
    <ul>
      <a href="../../index.php">
        <li class="home__link">Home</li>
      </a>
      <a href="../../about.php">
        <li class="about__link">About</li>
      </a>
      <a href="../../contact.php">
        <li class="contact__link">Contact</li>
      </a>
      <a href="../Dashboards.php">
        <li class="dashboard__link">Dashboard</li>
      </a>
    </ul>
  </nav>
  <div class="container">
    <h1>Products</h1>

    <div class="add">
      <a href="addProduct.php" class="button">Create Product</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>DateCreated</th>
          <th>Created By</th>
          <th>Image</th>
          <th class="change">Change</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once("../../Php/ProductCrudModel.php");
        $productsModel = new ProductCrudModel();
        $data = $productsModel->getAll();
        if (!empty($data)) {
          foreach ($data as $row) {
        ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><?php echo $row['dateCreated']; ?></td>
              <td><?php echo $row['createdBy']; ?></td>
              <td><?php echo $row['images']; ?></td>
              <td>
                <a href="editProduct.php?id=<?php echo $row['id']; ?>" class="edit__button btn">Edit</a>
                <a href="deleteProduct.php?id=<?php echo $row['id']; ?>" class="delete__button btn">Delete</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "There is no product in the database!";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>