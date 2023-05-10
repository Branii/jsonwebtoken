<?php
declare(strict_types=1);
//error_reporting(0);
spl_autoload_register(function($class){
    require __DIR__ . "/src/classes/{$class}.php";
    require __DIR__ . "/src/controller/{$class}.php";
    require __DIR__ . "/src/model/{$class}.php";
    require __DIR__ . "/src/views/{$class}.php";
});

//init controllers
$dbLink = new Dbutitl;
$user = new User($dbLink);
$controller = new Controller($user);