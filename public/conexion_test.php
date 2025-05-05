<?php
$host = "sql301.epizy.com";
$db = "if0_38896219_elfaro_db";
$user = "if0_38896219";
$pass = "030525faro";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
  echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
}
?>
