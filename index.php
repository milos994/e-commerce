<?php

    require_once 'sys/Autoloader.php';

    $uri = filter_input( INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING );
    $uri = substr( $uri, strlen( Configuration::BASE_PATH ) );

    $Routes     = require_once 'config/Routes.php';
    $FoundRoute = null;
    $Arguments  = [];
    foreach ( $Routes as $Route ) {
        if ( preg_match( $Route['Pattern'], $uri, $Arguments ) ) {
            $FoundRoute = $Route;
            break;
        }
    }

    $Controller = $FoundRoute['Controller'];
    $Method     = $FoundRoute['Method'];
    $fileName   = 'app/controllers/' . $Controller . 'Controller.php';
    if ( ! file_exists( $fileName ) ) {
        $Controller = 'Main';
        $fileName   = 'app/controllers/' . $Controller . 'Controller.php';
    }

    require_once $fileName;
    $className = $Controller . 'Controller';
    $worker    = new $className;

    if ( ! method_exists( $worker, $Method ) ) {
            $Method = 'index';
    }

    call_user_func_array( [ $worker, $Method ], $Arguments );
    $DATA = $worker->get();

    $viewFileName = 'app/views/' . $Controller . '/' . $Method . '.php';
    require_once $viewFileName;
