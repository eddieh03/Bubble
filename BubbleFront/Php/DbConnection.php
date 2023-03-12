<?php
class DbConnection
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $database = "bubble";
    private $conn;

    public function connect()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
            return $this->conn;
        } catch (Exception $ex) {
            return "Connection failed" . $ex->getMessage();
        }
    }
}
