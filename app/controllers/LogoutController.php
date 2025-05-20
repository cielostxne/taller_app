<?php
session_start();
session_destroy();
header("Location: page/login"); // ✅ Redirigir al login después de cerrar sesión
exit;
?>