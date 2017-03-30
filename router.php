<?php
session_start();
// Charge nos routes
require ('configs/routes.php');

//2- Définir Route par défaut
$routesDefault = $routes['default'];
$method = $_SERVER['REQUEST_METHOD'];
$routage = explode('/', $routesDefault);


// 3- Défini a et r

$a = $_REQUEST['a']??$routage[2];
$r = $_REQUEST['r']??$routage[1];

var_dump($r . ' - ' . $a);

// 4- Vérifie les routes permises
if(!in_array($method . '/' . $r . '/' . $a, $routes)){
  exit ("Cette route n'est pas permise, " . $a . " , " . $r );
};

// 5- Affiche les controller en fct de la routes
$controllerName = $r . 'Controller.php';
  require 'controllers/' . $controllerName;

$data = call_user_func($a);
