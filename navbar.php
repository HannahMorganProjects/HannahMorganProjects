<?php

if (!isset($_SESSION['loggedin'])){
  $loggedin = false;
} else {
  $loggedin = true;
}
?>

<!-- navbar --> 
<nav class="navbar has-background-danger-light" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item">
        <img src="img/moodjournal.png" width="112" height="28">
      </a>
  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a href="dashboard.php" class="navbar-item">
          Home
        </a>
  
        <a href="addmoodform.php" class="navbar-item">
          Mood Log
        </a>
  
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            More
          </a>
  
          <div class="navbar-dropdown">
            <a href = "moodlist.php" class="navbar-item">
              Mood List
            </a>
            <a href="moodsummary.php" class="navbar-item">
              Mood Summary
            </a>
           
            <hr class="navbar-divider">
            <a href="deleteaccount.php" class="navbar-item">
              Delete Account
            </a>
          </div>
        </div>
      </div>
  
    <div class="navbar-end">
        <div class="navbar-item">

      <?php
      if ($loggedin){
        echo "<a href='logout.php' class='button is-primary is-rounded'>Logout</a>";
    }  else {
      echo "<a href='loginpage.php' class='button is-light is-rounded'>Log in</a>";
    } 
      ?>
          </div>
        </div>
      </div>
    </div>
  </nav>