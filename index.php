<?php
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid

require_once('./controllers/Autoload.php');
$autoload = new Autoload();

$route = isset($_GET['r']) ? $_GET['r'] : 'home';
$mexflix = new Router($route);
