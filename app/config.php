<?php
$folderPath = dirname($_SERVER['SCRIPT_NAME']); // por ejemplo: /public
$urlPath = $_SERVER['REQUEST_URI'];
$url = substr($urlPath, strlen($folderPath));

// Asegúrate que URL empieza con "/"
$url = '/' . ltrim($url, '/');

define('URL', $url);  // '/Registro/index' o lo que sea
define('URL_PATH', $folderPath);
