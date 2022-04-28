<?php
/*
 
    This is the the database connection namespace
*/

namespace App\Database;

require '../config.php';
use PDOException;

class Database {
    private $host = defined('DDBB_HOST');
    private $db_name = defined('DDBB_NAME');
    private $username = defined('PWDDDBB_USERALGO');
    private $password = defined('DDBB_PASSWORD');
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
