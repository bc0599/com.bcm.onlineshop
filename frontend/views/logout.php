<?php
require_once '../../backend/core/init.php';

$user=new User();
$user->logout();

Redirect::to('index.php');