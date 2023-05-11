<?php
declare(strict_types=1);
require "autoload.php";
//init controllers
$dbLink = new Dbutil;
$user = new User($dbLink);
$controller = new Controller($user);
$controller->processValidation("braniiblack@gmail.com","11234");