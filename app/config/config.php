<?php
    // App Root
    define('APP_ROOT', dirname(dirname(__FILE__)) );
    // URL Root 
    // TODO: fix for heroku
    define('URL_ROOT', 'http://localhost/baietoo-records');
    // Site Name
    define('SITE_NAME', 'BaietooRecords');

    // DATABASE PARAMETERS
    define('URL', parse_url(getenv("CLEARDB_DATABASE_URL")));
    // TODO: include CLEARDB variable in debug
    // $url = 'mysql://b78a0ed438279c:aea489eb@eu-cdbr-west-03.cleardb.net/heroku_466887521e2d644?reconnect=true';
    // define('URL', parse_url($url));
    define('DB_HOST',URL["host"]);
    define('DB_USER',URL["user"]);
    define('DB_PASS',URL["pass"]);
    define('DB_NAME', substr(URL["path"],1));

    // Nav Image
    define('NAV_IMAGE', URL_ROOT . '/public/img/SVG/br_logo_white_horizontal_logo-cropped.svg');
    // Favicon
    define('FAVICON', URL_ROOT . '/public/img/favicon_blk/favicon.ico');

?>