<?php

class DataBarang
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $result = $this->db->conn->query("SELECT * FROM data_barang");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
