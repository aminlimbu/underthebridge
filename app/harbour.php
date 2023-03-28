<?php
    // config files defines commonly used varaibles
    require_once ('config/config.php');

    // Load Helpers
    require_once ('helpers/url_helper.php');
    require_once ('helpers/session_helper.php');
    
    // Load Libraries
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });
?>
