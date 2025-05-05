<?php
$host = "sql301.epizy.com";
$db = "if0_38896219_elfaro_db";
$user = "if0_38896219";
$pass = "030525faro";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Error de conexión: " . $e->getMessage());
}
