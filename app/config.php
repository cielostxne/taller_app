<?php
//echo '<pre>';
//var_dump($_SERVER['SCRIPT_NAME']);
//var_dump($_SERVER['REQUEST_URI']);
//echo '<pre>';



$folderPath = dirname($_SERVER['SCRIPT_NAME']); // '/taller_app'
$urlPath = $_SERVER['REQUEST_URI'];
$url = substr($urlPath, strlen($folderPath));

define('URL', $url);  // '/taller_app/public'

define('URL_PATH',$folderPath);
//echo $folderPath;
