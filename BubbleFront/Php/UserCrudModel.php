<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'DbConnection.php';
class UserCrudModel extends DbConnection
{
    private $id;
    private $name;
    private $surname;
    private $age;
    private $address;
    private $email;
    private $password;
    private $role;

    private $dbConn;

    public function __construct($id = '', $name = '', $surname = '', $age = '', $address = '', $email = '',  $password = '', $role = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
        $this->address = $address;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;

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
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function checkIfEmailExists()
    {
        try {
            $email = mysqli_real_escape_string($this->dbConn, $this->email);
            $sql = "SELECT COUNT(*) AS count FROM users WHERE email='$email'";
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

    public function insert()
    {
        try {
            $exists = $this->checkIfEmailExists();
            if ($exists) {
                echo "<script>alert('A user with this email already exists!')</script>";
                echo "<script>window.location.href = '../login.php';</script>";
                return;
            }
            $query = "INSERT INTO users(name, surname, age, address, email, password, role) VALUES('$this->name', '$this->surname', '$this->age', '$this->address', '$this->email', '$this->password', '0')";
            if ($sql = $this->dbConn->query($query)) {
                echo "<script>alert('You're registered successfully!');</script>";
                echo "<script>window.location.href = '../login.php';</script>";
            } else {
                echo "<script>alert('Registration failed!');</script>";
                echo "<script>window.location.href = '../register.php';</script>";
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function insertByAdmin()
    {
        try {
            $exists = $this->checkIfEmailExists();
            if ($exists) {
                echo "<script>alert('A user with this email already exists!')</script>";
                echo "<script>window.location.href = ../User/addUser.php';</script>";
                return;
            }
            $query = "INSERT INTO users(name, surname, age, address, email, password, role, dateCreated, createdBy) VALUES('$this->name', '$this->surname', '$this->age', '$this->address', '$this->email', '$this->password', '$this->role')";
            if ($sql = $this->dbConn->query($query)) {
                echo "<script>alert('User is added successfully!');</script>";
                echo "<script>window.location.href = '../User/UsersDashboard.php';</script>";
            } else {
                echo "<script>alert('Registration failed!');</script>";
                echo "<script>window.location.href = '../User/addUser.php';</script>";
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }


    public function getAll()
    {
        $data = null;
        $query = "SELECT * FROM users";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {
        $query = "UPDATE users SET name='$data[name]', surname='$data[surname]', email='$data[email]', password='$data[password]', address='$data[address]', age='$data[age]', role='$data[role]', dateCreated=NOW(), createdBy='$data[createdBy]' WHERE id='$data[id] '";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function get($id)
    {
        $data = null;
        $query = "SELECT * FROM users WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }


    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = '$id'";
        if ($sql = $this->dbConn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        try {
            if ($this->checkIfEmailExists($this->email)) {
                $stmt = $this->dbConn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
                $stmt->bind_param("ss", $this->email, $this->password);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['currentUser'] = $row['id'];
                    if ($row['role'] == 1){
                        $_SESSION['adminEmail'] = $this->email;
                    }
                    echo "<script>alert('The login was successful!');</script>";
                    echo "<script>window.location.href = '../BubbleFront/index.php';</script>";
                } else {
                    echo "<script>alert('The password is incorrect!');</script>";
                    echo "<script>window.location.href = '../login.php';</script>";
                }
            } else {
                echo "<script>alert(`This email doesn't exist`);</script>";
                echo "<script>window.location.href = '../login.php';</script>";
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
}
