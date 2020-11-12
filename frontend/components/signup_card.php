<?php
require "bootstrap.php";
?>

<link rel="stylesheet" type="text/css" href="styles/styles.css">

	<div class="h-200 card ">

			<div class="card-header">
				<h3>Sign Up</h3>
			</div>

			<div class="card-body">

                <form action="" method="post">
                
                <div class="input-group form-group">

						<div class="input-group-prepend ">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="Username" id="Username" class="form-control" value="<?php echo escape(Input::get('Username')); ?>" autocomplete="off" placeholder="Username">
                    </div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                         </div>
                         
                         <input type="text" name="Email" id="Email" autocomplete="off" class="form-control" value="<?php echo escape(Input::get('Email')); ?>" placeholder="E-mail">
                        </div>
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="UserPassword" name="UserPassword" id="UserPassword" class="form-control" value="" autocomplete="off" placeholder="Password">
                    </div>  

                    <input type="hidden" name="token" value="<?php echo Token::generate();?>"></input>
                
                <div class="form-group" >
                    <button type="submit" name="signup-submit" class="btn float-right login_btn">Sign Up</button>
                </div>
                </form>
            </div>

			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Already have an account?<a href="login.php">Sign In</a>
				</div>
      </div>
      
</div>