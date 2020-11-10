<?php
require_once '../../backend/core/init.php';

$user= DB::getInstance()->get('customer', array('Username', '=', 'Betsabe'));

if(!$user->count()){
    echo 'No user';
}
else{
    echo $user->first()->Username;
}