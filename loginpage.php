<?php
//if login form submitted then start session and assign variables to fields entered in form
if (isset($_POST['submitted'])){
session_start();
include ("dbconn.php");

    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $dbpass ="";
    $checkuser = "SELECT * FROM User WHERE username = '$username'";

    $result = $conn->query($checkuser);
//assign password in database to variable
    while ($row = $result->fetch_assoc()){
        $dbpass = $row["pass"];
    };


  /*   assigning boolean to $authenticated, if database pw matches pw entered
    login, assign session and redirect to dashboard */

    $authenticated = password_verify($pass, $dbpass);
    if ($authenticated){
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $username;
        header("Location: dashboard.php");
    }
//if no result echo out an error don't process any further
    if(!$result){
        exit($conn->error);
        echo "<p>Unable to login, enter correct username and password</p>";
    }

}
?>



<!DOCTYPE html>
<html lang="en" class="has-background-danger-light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
    
<section class="hero is-normal is-danger">
  <div class="hero-body">
    <p class="title is-1 has-text-white has-text-centered">
     Login:
    </p>
  </div>
</section>

<div class="container px-6 py-6">
<div class="columns">
    <div class="column">
        
        <form action =<?php echo $_SERVER['PHP_SELF'];?> method="post">
        <!-- username field -->
        <div class="field">
            <label class="label is-medium" for="nameField">Username</label>
            <div class="control has-icons-left">
                <input class="input is-white" type="text" name="username" placeholder="Enter username" id="nameField" required>
                <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
            </div>
</div>
<!-- password field -->
<div class="columns">
    <div class="column">
        <form action =<?php echo $_SERVER['PHP_SELF'];?> method="post">
        <div class="field">
            <label class="label is-medium" for="passwordField">Password</label>
            <div class="control has-icons-left">
                <input class="input is-white" type="password" name="pass" placeholder="Enter password" id="passwordField" required>
                <span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
            </div>
</div>

<div class="field">
    <div class="control">
        <input class="button is-success is-rounded" type="submit" value="Login" name="submitted">
</div>
</div>
</div>
</section>
</body>
</html>
</html>
