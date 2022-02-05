<?php

// require_once 'core/App.php';
// require_once 'core/Controller.php';
// require_once 'core/Database.php';
// require_once 'core/Flasher.php';

// autoload
spl_autoload_register(function($class) {
    require_once '../app/core/' . $class . '.php';
});



require_once 'config/config.php';


