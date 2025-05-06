<?php
$host = "sql301.infinityfree.com";
$db = "if0_38896219_elfaro_db";
$user = "if0_38896219";
$pass = "030525faro";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Conexión exitosa a la base de datos!";
} catch (PDOException $e) {
  echo "Error de conexión: " . $e->getMessage();
}
