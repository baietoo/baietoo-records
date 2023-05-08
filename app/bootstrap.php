<?php
    // Load config
    require_once 'config/config.php';

    // Load libraries
    require_once 'libraries/core.php';
    require_once 'libraries/controller.php';
    require_once 'libraries/database.php';

    // load helper functions
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';
    require_once 'helpers/email_mg.php';

    // require_once 'vendor/autoload.php';
    // Autoload Core Libraries(replaces the above)

    // TODO: HEROKU ERROR:
    // 2023-04-20T06:55:07.390485+00:00 app[web.1]: 
    // [20-Apr-2023 06:55:07 UTC] PHP Fatal error:
    //  Uncaught Error: Failed opening required 'libraries/Core.php' (include_path='.:')
    //in /app/app/bootstrap.php:12
    
    // spl_autoload_register(function($className){
    //     require_once 'libraries/' . $className . '.php';
    // });
?>