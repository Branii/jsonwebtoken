<?php
declare(strict_types=1);
require "./vendor/autoload.php";
include "src/classes/Dbutil.php";
include "src/classes/TokenGenerator.php";
include "src/controller/Controller.php";
include "src/model/User.php";
//error_reporting(1);
// spl_autoload_register(function($class){
//     require __DIR__ . "/src/classes/{$class}.php";
//     require __DIR__ . "/src/controller/{$class}.php";
//     require __DIR__ . "/src/model/{$class}.php";
//     require __DIR__ . "/src/views/{$class}.php";
// });

//init controllers
$dbLink = new Dbutitl;
$user = new User($dbLink);
$controller = new Controller($user);
$controller->processValidation("braniiblack@gmail.com","11234");