<?php

require_once 'sys/Autoloader.php';


$Request = $_SERVER['REQUEST_URI'];

$Request = substr($Request, strlen(Configuration::BASE_PATH));
$Routes = require_once 'Routes.php';



$Arguments = [];
$FoundRoute = null;
foreach ($Routes as $Route) {
    if (preg_match($Route['Pattern'], $Request, $Arguments)) {
        $FoundRoute = $Route;
        break;
    }
}
unset($Arguments[0]);
$Arguments = array_values($Arguments);
$controllerPath = 'app/controllers/' . $FoundRoute['Controller'] . 'Controller.php';

if (!file_exists($controllerPath)) {
    die('Controller class does not exist.');
}
require_once $controllerPath;

$imeKlase = $FoundRoute['Controller'] . 'Controller';
$worker = new $imeKlase;

if (!method_exists($worker, $FoundRoute['Method'])) {
    die('This controller does not have the requested method.');
}

$Method = $FoundRoute['Method'];

if (method_exists($worker, $Method)) {
    call_user_func_array([$worker, $Method], $Arguments);
}

$DATA = $worker->get();
require 'app/views/' . $FoundRoute['Controller'] . '/' . $FoundRoute['Method'] . '.php';
