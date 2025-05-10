<?php

// Nueva clase para la conexion
class Database {
    private static $instance;
    private $conn;

    private function __construct() {
        
        $host = "sql301.infinityfree.com";
        $db = "if0_38896219_elfaro_db";
        $user = "if0_38896219";
        $pass = "030525faro";

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
