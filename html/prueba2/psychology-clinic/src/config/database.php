<?php
namespace App\Config;

use PDO;
use PDOException;

class Database {
    private $host = 'mysql';
    private $dbname = 'prueba';
    private $username = 'root';
    private $password = '123@mudar';
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }

        return $this->conn;
    }
}
?>