<?php
require_once 'DbConnection.php';
class OrderCrudModel extends DbConnection
{
    private $id;
    private $name;
    private $phoneNumber;
    private $productId;
    private $quantity;
    private $address;
    private $totalPrice;
    private $orderedDate;
    private $orderedBy;

    private $dbConn;

    public function __construct($id = '', $name = '', $phoneNumber = '', $productId = '', $quantity = '', $address = '', $totalPrice = '', $orderedDate = '',  $orderedBy = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->phoneNumber = $phoneNumber;
        $this->totalPrice = $totalPrice;
        $this->orderedDate = $orderedDate;
        $this->orderedBy = $orderedBy;
        $this->quantity = $quantity;
        $this->address = $address;
        $this->productId = $productId;

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
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getProductId()
    {
        return $this->productId;
    }


    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }


    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }


    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function setOrderedDate($orderedDate)
    {
        $this->orderedDate = $orderedDate;
    }

    public function getOrderedDate()
    {
        return $this->orderedDate;
    }

    public function setOrderedBy($orderedBy)
    {
        $this->orderedBy = $orderedBy;
    }

    public function getOrderedBy()
    {
        return $this->orderedBy;
    }


    public function insert()
    {
        try {
            $query = "INSERT INTO orders(name, phoneNumber, productId, quantity, address, totalPrice, orderedDate, orderedBy) VALUES('$this->name', '$this->phoneNumber', '$this->productId', '$this->quantity', '$this->address', '$this->totalPrice', NOW(), '$this->orderedBy')";
            if ($sql = $this->dbConn->query($query)) {
                echo "<script>alert('The order is done successfully!');</script>";
                echo "<script>window.location.href = 'order.php';</script>";
            } else {
                echo "<script>alert('Order failed!');</script>";
                echo "<script>window.location.href = 'order.php';</script>";
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function getAll()
    {
        $data = null;
        $query = "SELECT * FROM orders";
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
        $query = "SELECT * FROM orders WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function getOrdersOfUser()
    {
        $data = null;
        $userId = $_SESSION['currentUser'];
        $query = "SELECT * FROM orders WHERE orderedBy='$userId'";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {
        $query = "UPDATE orders SET name='$data[name]', phoneNumber='$data[phoneNumber]', productId='$data[productId]', quantity='$data[quantity]', address='$data[address]', totalPrice='$data[totalPrice]', orderedBy='$data[orderedBy]', orderedDate=NOW() WHERE id='$data[id]'";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($id)
    {
        $query = "DELETE FROM orders WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
