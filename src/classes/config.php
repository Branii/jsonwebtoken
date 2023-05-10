<?php

define("USER","root");
define("PASS","root");
define("DSN","mysql:host=localhost;dbname=pdophp");
define("OPT",[PDO::ATTR_EMULATE_PREPARES => false, // Disable emulation mode for "real" prepared statements
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Disable errors in the form of exceptions
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Make the default fetch be an associative array
]);