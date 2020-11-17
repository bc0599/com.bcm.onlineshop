<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"></head>
<?php

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

       $remember=(Input::get('remember')==='on') ? true : false;
       $login=$user->login(Input::get('Username'), Input::get('UserPassword'), $remember);

       if($login){
           Redirect::to('profile.php');
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

<link rel="stylesheet" type="text/css" href="../styles/app_styles.css">

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