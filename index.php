<?php
session_start();
include ("App/Models/DB.php");
global $db;
$db=new \App\Models\DB("localhost","root","","w84php_news");

include ("App/functions.php");
include ("routes.php");
include ("App/Router.php");

$router=new \App\Router($_GET);

$router->routes=$routes;

$router->dispatch();