<?php
require "bootstrap.php";
require '../../backend/core/init.php';

if(Input::exists()){
    if(Token::check(Input::get('token'))){

        $validate=new Validate();
        $validation=$validate->check($_POST, array(
        'Username'=> array('required'=> true),
        'UserPassword'=> array('required'=>true)
   ));

   if($validation->passed()){
       $user=new User();
       $login=$user->login(Input::get('Username'), Input::get('UserPassword'));

       if($login){
           echo 'Success';
       }else{
           echo '<p>Failed</p>';
       }
   }
   else{
       foreach($validation->errors() as $error){
           echo $error, '<br>';
       }
   }

    }
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