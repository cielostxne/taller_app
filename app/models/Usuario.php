<?php
// para futuras mejorar cambiar de public a private estos atributos.
class Usuario {
  public $nombre;
  public $email;
  public $password;

  public function __construct($nombre, $email, $password) {
    $this->nombre = $nombre;
    $this->email = $email;
    $this->password = $password;
  }

  public static function obtenerPorCorreo($conn, $email) {
      $stmt = $conn->prepare("SELECT id_usuario, nombre, correo, password FROM usuarios WHERE correo = :correo");
      $stmt->bindParam(':correo', $email);
      $stmt->execute();
      $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($datosUsuario) {
          return new Usuario($datosUsuario['nombre'], $datosUsuario['correo'], $datosUsuario['password']);
      } else {
          return null;
      }
  }


}

