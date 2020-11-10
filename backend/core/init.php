<?php

session_start();

 $GLOBALS['config']=array(
     'mysql'=>array(
         'host'=> 'localhost',
         'username'=> 'root',
         'password'=> 'Gatitos.999',
         'db' => 'users_schema'
     ),
     'remember'=>array(
         'cookie_name'=> 'hash',
         'coookie_expiry' => 604800
     ),
     'session'=>array(
         'session_name'=> 'user'
     )
 );

spl_autoload_register(function($class){
    require_once 'classes/' .$class. '.php';
});

require 'functions/sanitize.php';




