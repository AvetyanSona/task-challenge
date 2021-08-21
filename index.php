<?php
    session_start();
    require_once 'app/config/config.php';
    require_once 'app/helpers/helpers.php';

//    require_once 'app/views/inc/modals.php';


spl_autoload_register(function ($class_name) {
        $filename = str_replace('\\', DIRECTORY_SEPARATOR , "$class_name.php");
        require_once "$filename";
    });

    use app\libraries\Core ;
    $init = new Core;