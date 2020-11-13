<?php
require_once '../../backend/core/init.php';

$user=new User();

if($user->isLoggedIn()){
?>
<p>Hello <a href="#"><?php echo escape($user->data()->Username); ?></a>!</p>

<ul>
    <li><a href="logout.php">Log out</a></li>
</ul>

<?php
}else{
    echo '<p> You need to <a href="login.php">log in or </a> <a href="signup.php"> register </a> </p>';

}


