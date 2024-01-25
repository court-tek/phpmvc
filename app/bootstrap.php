<?php
    // load config
    require_once '../app/config/config.php';

    // autoload core libraries
    spl_autoload_register(function($className) {
        require_once '../app/libraries/' . $className . '.php';
    });