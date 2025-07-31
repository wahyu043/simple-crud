<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root'; // default MAMP password
    private $dbName = 'stok_opname';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbName);

        if ($this->conn->connect_error) {
            die('Database Connection Failed: ' . $this->conn->connect_error);
        }
    }
}
