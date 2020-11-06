<?php

$servername="localhost";
$dbUsername="root";
$dbPassword="Gatitos.999";
$dbName="users_schema";

$con=mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$con){

    die("Connection failed: ".mysqli_connect_error());

}