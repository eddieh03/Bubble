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
    <title>Contact Dashboard</title>
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
            <a href="../../menu.php">
                <li class="menu__link">Menu</li>
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
        <h1>Contact</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>DateCreated</th>
                    <th class="change">Change</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("../../Php/ContactCrudModel.php");
                $contactModel = new ContactCrudModel();
                $data = $contactModel->getAll();
                if (!empty($data)) {
                    foreach ($data as $row) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['dateCreated']; ?></td>
                            <td>
                                <a href="editContact.php?id=<?php echo $row['id']; ?>" class="edit__button btn">Edit</a>
                                <a href="deleteContact.php?id=<?php echo $row['id']; ?>" class="delete__button btn">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "There is no contact in the database!";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>