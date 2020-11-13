<?php
require "bootstrap.php"; 

require_once '../../backend/core/init.php';

?>

<link rel="stylesheet" type="text/css" href="styles/styles.css">

<?php
require "../components/header.php";
?>

<main>

<div class="container">

    <div class="margin-top row d-flex justify-content-between">

<?php

$user=new User();

if($user->isLoggedIn()){
?>
<p>Hello <a href="#"><?php echo escape($user->data()->Username); ?></a>!</p>

<ul>
    <li><a href="logout.php">Log out</a></li>
</ul>

<?php
}else{
    echo '<p> Logout successful, to view the contents of this page, please <a href="login.php">log in or </a> <a href="signup.php"> register </a> </p>';

}
?>

</div>
</div>

</main>