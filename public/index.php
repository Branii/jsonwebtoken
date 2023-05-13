<?php
declare(strict_types=1);
require "autoload.php";
//init controllers
$dbLink = new Dbutil;
$user = new User($dbLink);
$controller = new Controller($user);
print $controller->processValidation("braniiblack@gmail.com","1234");
echo "<hr>";
$token = $controller->processValidation("braniiblack@gmail.com","1234");
print_r ($controller->decryptToken($token,(new TokenGenerator())->GetPrivateKey()));
