<?php
require_once '../../backend/core/init.php';

$user=new User();
echo $user->data()->CustomerId;
if($user->isLoggedIn()){
    echo 'User is logged in';
}


