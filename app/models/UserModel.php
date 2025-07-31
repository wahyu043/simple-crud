<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        require_once dirname(__DIR__, 2) . '/core/Database.php';
        $this->db = (new Database())->conn;
    }

    public function findUser($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
