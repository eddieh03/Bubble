<?php
require_once 'DbConnection.php';
class ProductCrudModel extends DbConnection
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $dateCreated;
    private $createdBy;
    private $image;

    private $dbConn;

    public function __construct($id = '', $name = '', $description = '', $price = '', $dateCreated = '',  $createdBy = '', $image = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->dateCreated = $dateCreated;
        $this->createdBy = $createdBy;
        $this->image = $image;

        $this->dbConn = $this->connect();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getImage()
    {
        return $this->image;
    }

  
    public function checkIfFoodExists()
    {
        try {
            $name = mysqli_real_escape_string($this->dbConn, $this->name);
            $sql = "SELECT COUNT(*) AS count FROM products WHERE name='$name'";
            $result = mysqli_query($this->dbConn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row["count"] > 0;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function insertByAdmin()
    {
        try {
            $exists = $this->checkIfFoodExists();
            if ($exists) {
                echo "<script>alert('The product with this name already exists!')</script>";
                echo "<script>window.location.href = '../Menu/addFood.php';</script>";
                return;
            }
            
            $query = "INSERT INTO products(name, description, price, dateCreated, createdBy, image) VALUES('$this->name', '$this->description', '$this->price', NOW(), '$this->createdBy', '$this->image')";
            if ($sql = $this->dbConn->query($query)) {
                echo "<script>alert('Product is added successfully!');</script>";
                echo "<script>window.location.href = '../Products/ProductDashboard.php';</script>";
            } else {
                echo "<script>alert('Adding the product failed!');</script>";
                echo "<script>window.location.href = '../Products/addProduct.php';</script>";
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function getAll()
    {
        $data = null;
        $query = "SELECT * FROM products";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }


    public function get($id)
    {
        $data = null;
        $query = "SELECT * FROM products WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function getFoodPrice($name)
    {
        $data = null;
        $query = "SELECT price FROM products where name='$name'";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {
        $query = "UPDATE products SET name='$data[name]', description='$data[description]', price='$data[price]', createdBy='$data[createdBy]', dateCreated=NOW(), image='$data[image]' WHERE id='$data[id] '";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($id)
    {
        $query = "DELETE FROM products WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
