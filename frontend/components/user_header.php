<link rel="stylesheet" type="text/css" href="../styles/app_styles.css">

<!-- Image and text -->
<nav class="navbar navbar-expand-sm navbar-light bg-light">
  
  <a class="navbar-brand" href="#">
    <img src="../img/logo.jpg" width="110" height="110" class="d-inline-block align-top rounded-circle" alt="">
  </a>

  <h3 class="navbar-text">Online Shop</h3>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <a class="nav-link" href="profile.php"><h5>Home</h5>
              <!--  <span class="sr-only">(current)</span>-->
              </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><h5>About</h5></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><h5>Services</h5></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><h5>Contact</h5></a>
        </li> 

        <li class="nav-item dropleft ml-auto">
        <a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="../img/user.webp" width="50" height="50" class="rounded-circle margin-left">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <h6 class="dropdown-header">Hello! <?php echo escape($user->data()->Username); ?></h6>
          <a class="dropdown-item" href="#">Cart</a>
          <a class="dropdown-item" href="#">Edit Profile</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li> 

        <form action=" " method="post">

        <!--<li class="nav-item">
        <input type="submit" name="logout-submit" value="Logout" class="btn float-right login_btn">
        </li>-->
        </form>
      </ul>
    </div>

</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

