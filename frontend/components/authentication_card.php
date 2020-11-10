<?php
require "bootstrap.php";
?>

<link rel="stylesheet" type="text/css" href="styles/styles.css">

	<div class="h-200 card ">

			<div class="card-header">
				<h3>Sign In</h3>
			</div>

			<div class="card-body">

				<form action="includes/login.inc.php" method="post">

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="text" name="mail" class="form-control" placeholder="E-mail">
          </div>
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>

						<input type="password" name="pwd" class="form-control" placeholder="Password">
          </div>
          
          <div class="form-group">
						<input type="submit" name="login-submit" value="Login" class="btn float-right login_btn">
          </div>
          
				</form>
      
      </div>

			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.php">Sign Up</a>
				</div>
      </div>
      
</div>
