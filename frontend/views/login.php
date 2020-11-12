<?php
require "bootstrap.php";
require '../../backend/core/init.php';

if(Session::exists('login')){
    echo '<p>' .Session::flash('login'). '</p>';
}
?>

<link rel="stylesheet" type="text/css" href="styles/styles.css">

<?php
require "../components/header.php";
?>

<main>

<div class="container">

    <div class="margin-top row d-flex justify-content-between">

        <?php
        require "../components/authentication_card.php";
        ?>

   
        <img class="margin-left" width="400" height="400" src="../img/shop-online.gif">
    

    </div>
</div>

</main>