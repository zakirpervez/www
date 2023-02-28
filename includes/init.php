<?php
ini_set('display_errors', 1);
require dirname(__DIR__). '/config.php';
spl_autoload_register ( function ($class) {
        $sources = array(
            dirname(__DIR__). "/classes/$class.php",
            dirname(__DIR__)."/models/$class.php",
            dirname(__DIR__)."/controler/$class.php");
        // echo "<br/> Before foreach<br/>";
        // var_dump($sources);
        foreach($sources as $key=>$source) {
            if(file_exists($source)) {
                require $source;
            }else {
                unset($sources[$key]);
            }
        }
        // echo "<br/> After foreach<br/>";
        // var_dump($sources);
    }
);

if(session_status() !== PHP_SESSION_ACTIVE) session_start();