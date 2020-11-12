<?php
require "bootstrap.php";

require_once '../../backend/core/init.php';

if(Input::exists()){

    if(Token::check(Input::get('token'))){

        $validate=new Validate();
        $validation=$validate->check($_POST, array(
        'Username'=> array(
                'required'=> true,
                'min'=> 2,
                'max'=> 20,
                'unique'=> 'customer'
       ),
        'Email'=> array(
                'required'=>true,
                'min'=> 4,
       ),
       'UserPassword'=> array(
                'required'=>true,
                'min'=> 6,
       )
   ));

   if($validation->passed()){
       $user=new User();

       try{
           $user->create(array(
               'Username'=> Input::get('Username'),
               'Email'=> Input::get('Email'),
               'UserPassword'=> Input::get('UserPassword'),
               'Balance'=>100.0
           ));

           Session::flash('login', 'You have been registered and can now login.');
           header('Location: login.php');

       }catch(Exception $e){
           die($e->getMessage());
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

<link rel="stylesheet" type="text/css" href="../styles/styles.css">

<?php
require "../components/header.php";
?>

<main>

<div class="container">

    <div class="margin-top row d-flex justify-content-between">

        <?php
        require "../components/signup_card.php";
        ?>

   
        <img class="margin-left" width="400" height="400" src="../img/shop-online.gif">
    

    </div>
</div>

</main>