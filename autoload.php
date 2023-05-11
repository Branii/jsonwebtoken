<?php
require "./vendor/autoload.php";
spl_autoload_register( function($class) {
    if (is_file('src/app/'.$class.'.php')) {
        require_once('src/app/'.$class.'.php');
    }elseif (is_file('src/model/'.$class.'.php')) {
        require_once('src/model/'.$class.'.php');
    }elseif (is_file('src/controller/'.$class.'.php')) {
        require_once('src/controller/'.$class.'.php');
    }
});

