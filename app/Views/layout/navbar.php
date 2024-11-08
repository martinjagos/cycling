<?php

use IonAuth\Libraries\IonAuth;

$ionAuth = new IonAuth();
?>


<nav class="navbar navbar-expand navbar-light bg-light fixed-top">
  <div class="container-fluid">
      <?php echo '<a class="navbar-brand mx-3 fw-bold" href="'.base_url("/").'">CYCLING</a>'; ?>
    <div class="navbar-nav mx-3">

      <?php

        if($ionAuth->loggedIn()) {
            echo '<a class="nav-link" href="'.base_url("logout").'">Logout</a>';
        } else {
            echo '<a class="nav-link" href="'.base_url("login").'">Login</a>';
            echo '<a class="nav-link" href="'.base_url("register").'">Register</a>';
        }

        ?>
      <!-- Add more links as needed -->
    </div>
  </div>
</nav>

<div class="pt-5"></div>
<div class="pt-5"></div>