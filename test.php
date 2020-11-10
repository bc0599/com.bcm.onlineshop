<?php

$dbname   = 'users_schema';
$username = 'root';
$password = 'Gatitos.999';
try {
    $pdo = new \PDO("mysql:host=localhost;dbname=$dbname", $username,  $password);
} catch (Exception $e) {
    print $e->getMessage() . "\n";
}
print "OK\n";