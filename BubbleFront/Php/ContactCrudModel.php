<?php
require_once 'DbConnection.php';
class ContactCrudModel extends DbConnection
{
    private $id;
    private $name;
    private $email;
    private $message;
    private $dateCreated;

    private $dbConn;

    public function __construct($id = '', $name = '', $email = '',$message='', $dateCreated = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
        $this->dateCreated = $dateCreated;

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
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function getMessage()
    {
        return $this->message;
    }

    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

 

    public function insert()
    {
        echo "<script>alert('here ed successfully!');</script>";

        try {
            $query = "INSERT INTO contact(name, email, message, dateCreated) VALUES('$this->name', '$this->email','$this->message', NOW())";
            if ($sql = $this->dbConn->query($query)) {
                echo "<script>alert('Contact is added successfully!');</script>";
                echo "<script>window.location.href = 'contact.php';</script>";
            } else {
                echo "<script>alert('Adding the contact failed!');</script>";
                echo "<script>window.location.href = '.contact.php';</script>";
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function getAll()
    {
        $data = null;
        $query = "SELECT * FROM contact";
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
        $query = "SELECT * FROM contact WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

  
    public function update($data)
    {
        $query = "UPDATE contact SET name='$data[name]', email='$data[email]',message='$data[message]', dateCreated=NOW() WHERE id='$data[id] '";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }


    public function delete($id)
    {
        $query = "DELETE FROM contact WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
