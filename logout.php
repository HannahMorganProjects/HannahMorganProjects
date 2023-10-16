<?php
    session_start();

    if (!isset($_SESSION['loggedin'])){
        header("Location: index.html");
        //if logged in unset session variables
    } else {
        unset($_SESSION['loggedin']);
        unset($_SESSION['User']);
        header("Location: index.html");
    }
?>
