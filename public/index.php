<?php
session_start();
define ("WEBROOT", 'quantoxtest.com');

require_once('../Database.php');
// initiate dabase
$database = new Database();
// connect to the database
$db = $database->connect();

foreach (glob('../classes/*') as $class_name) {
	require_once($class_name);
}

foreach (glob('./controller/*') as $controller_name) {
	require_once($controller_name);
}

foreach (glob('../model/*') as $model_name) {
	require_once($model_name);
}

// initiate request
$request = new Request();
// initiate router
$router = new Router($request);
