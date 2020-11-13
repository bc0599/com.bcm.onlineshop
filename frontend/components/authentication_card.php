<?php
require "bootstrap.php";
?>

<link rel="stylesheet" type="text/css" href="styles/styles.css">

	<div class="h-200 card ">

			<div class="card-header">
				<h3>Sign In</h3>
			</div>

			<div class="card-body">

				<form action="" method="post">

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							
							</div>
							
							<input type="text" name="Username" id="Username" autocomplete="off" class="form-control" placeholder="Username">
							
							</div>
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>

				<input type="password" name="UserPassword" id="UserPassword" autocomplete="off" class="form-control" placeholder="Password">
          </div>

		  <input type="hidden" name="token" value="<?php echo Token::generate();?>"></input>
          
          <div class="form-group">
				<input type="submit" name="login-submit" value="Login" class="btn float-right login_btn">
          </div>

		  <div class="form-check d-inline-flex p-2">
    		<input type="checkbox" id="remember" name="remember" class="form-check-input" id="remember">
    		<label class="form-check-label" style="color:white;" for="remember">Remember me</label>
  		</div>
		  
		  </form>
      
      </div>

			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.php">Sign Up</a>
				</div>
      </div>
      
</div>
