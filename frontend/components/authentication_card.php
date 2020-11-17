<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"></head>

<link rel="stylesheet" type="text/css" href="../styles/app_styles.css">

	<div class="h-200 card login-card ">

			<div class="card-header">
				<h3>Sign In</h3>
			</div>

			<div class="card-body">

				<form action="" method="post">

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text">
							
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
								</svg>
							
							</span>
							</div>
							
							<input type="text" name="Username" id="Username" autocomplete="off" class="form-control" placeholder="Username">
							
							</div>
          
					<div class="input-group form-group">
						<div class="input-group-prepend">
              				<span class="input-group-text">
				  
				  				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  				<path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
				  				</svg>
				
							</span>
            		</div>

				<input type="password" name="UserPassword" id="UserPassword" autocomplete="off" class="form-control" placeholder="Password">
          </div>

		  <input type="hidden" name="token" value="<?php echo Token::generate();?>"></input>
          
          <div class="form-group">
				<input type="submit" name="login-submit" value="Login" class="btn float-right login_btn">
          </div>

		  <div class="form-check d-inline-flex p-6">
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
