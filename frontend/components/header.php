<?php

require "bootstrap.php";

?>

<link rel="stylesheet" type="text/css" href="styles/styles.css">

<!-- Image and text -->
<nav class="navbar navbar-expand-sm navbar-light bg-light">
  
  <a class="navbar-brand" href="#">
    <img src="img/logo.jpg" width="110" height="110" class="d-inline-block align-top rounded-circle" alt="">
  </a>

  <h3 class="navbar-text">Online Shop</h3>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item active">
          <a class="nav-link" href="#"><h5>Home</h5>
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

        <form action="includes/logout.inc.php" method="post">

        <li class="nav-item">
        <input type="submit" name="logout-submit" value="Logout" class="btn float-right login_btn">
        </li>
        </form>
      </ul>
    </div>

</nav>
  

