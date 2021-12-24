<?php
session_start();
include ("App/Models/DB.php");
global $db;
// create a database and replace the name with db_name//
$db=new \App\Models\DB("localhost","root","","x5q6_mvcshop");

include ("App/functions.php");
include ("routes.php");
include ("App/Router.php");

$router=new \App\Router($_GET);

$router->routes=$routes;

$router->dispatch();