<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "";
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            $this->conn = new PDO($dsn, $this->user, $this->password, $options);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function prepare($query) {
        return $this->conn->prepare($query);
    }

    public function getLastInsertId() {
        return $this->conn->lastInsertId();
    }
}

$db = new Database();
?>