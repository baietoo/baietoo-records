<?php
    // App Root
    define('APP_ROOT', dirname(dirname(__FILE__)) );
    // URL Root 
    if($_SERVER['SERVER_NAME'] == 'baietoo-records.test'){
        define('URL_ROOT', "http://{$_SERVER['HTTP_HOST']}");
        $url = 'mysql://b78a0ed438279c:aea489eb@eu-cdbr-west-03.cleardb.net/heroku_466887521e2d644?reconnect=true';
    } else {
        define('URL_ROOT', 'https://baietoo-records.herokuapp.com');
        // DATABASE URL
        $url = getenv("CLEARDB_DATABASE_URL");
            // AWS BUCKET DETAILS
        define('S3_BUCKET', getenv('S3_BUCKET'));
        define('AWS_ACCESS_KEY_ID', getenv('AWS_ACCESS_KEY_ID'));
        define('AWS_SECRET_ACCESS_KEY', getenv('AWS_SECRET_ACCESS_KEY'));
    }
    // Site Name
    define('SITE_NAME', 'BaietooRecords');
    
    // DATABASE PARAMETERS
    define('URL', parse_url($url));
    define('DB_HOST',URL["host"]);
    define('DB_USER',URL["user"]);
    define('DB_PASS',URL["pass"]);
    define('DB_NAME', substr(URL["path"],1));

    // Nav Image
    define('NAV_IMAGE', URL_ROOT . '/public/img/SVG/br_logo_white_horizontal_logo-cropped.svg');
    // Favicon
    define('FAVICON', URL_ROOT . '/public/img/favicon_blk/favicon.ico');


?>