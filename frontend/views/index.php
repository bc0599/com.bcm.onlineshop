<?php
require_once '../../backend/core/init.php';

if(Session::exists('success')){
    echo Session::flash('success');
}
