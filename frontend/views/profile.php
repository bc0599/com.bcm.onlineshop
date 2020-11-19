<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"></head>
<?php
require_once '../../backend/core/init.php';
?>

<link rel="stylesheet" type="text/css" href="../styles/app_styles.css">

<main>

<?php

$user=new User();

if($user->isLoggedIn()){
require "../components/user_header.php";
require "../components/product_grid.php";

?>

<?php
}else{
    echo '<p> Logout successful, to view the contents of this page, please <a href="login.php">log in or </a> <a href="signup.php"> register </a> </p>';
}
?>

</main>