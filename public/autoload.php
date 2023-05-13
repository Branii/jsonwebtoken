<?php
require "../vendor/autoload.php";
spl_autoload_register( function($class) {
    if (is_file('../app/core/'.$class.'.php')) {
        require_once('../app/core/'.$class.'.php');
    }elseif (is_file('../app/model/'.$class.'.php')) {
        require_once('../app/model/'.$class.'.php');
    }elseif (is_file('../app/controller/'.$class.'.php')) {
        require_once('../app/controller/'.$class.'.php');
    }
});

//...