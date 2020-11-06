<?php
if (isset($_POST['signup-submit'])){

    require "db.inc.php";

    $username= $_POST['name'];
    $mail= $_POST['mail'];
    $password= $_POST['pwd'];

    if(empty($username) || empty($mail)|| empty($password)){

        header("Location: ../signup.php?error=emptyfields&name=".$username."&mail=".$mail );

    }
}