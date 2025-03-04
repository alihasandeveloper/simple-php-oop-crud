<?php

include("config.php");

class Database
{
    private $db_host = DB_HOST;
    private $db_name = DB_NAME;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    public $conn;
    public $error;
    public $success;

    public function __construct()
    {
        $this->connectDB();
    }

    public function connectDB()
    {
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        if ($this->conn->connect_error) {
            $this->error = $this->conn->connect_error;
        } else {
            $this->success = "Connected successfully";
        }
    }

    public function query($query)
    {
        $result = $this->conn->query($query);
        if (!$result) {
            $this->error = $this->conn->error;
            return false;
        }
        return $result;
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
