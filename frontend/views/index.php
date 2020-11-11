<?php
require_once '../../backend/core/init.php';

$user= DB::getInstance()->update('customer', 2 ,array(
    'UserPassword'=> 'Nueva',
    'Username'=> 'NuevoUser'
));
