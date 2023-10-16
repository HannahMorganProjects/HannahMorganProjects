

	



<?php
header("Content-Type: application/json");

// POST / LOGIN - NOT WORKING

if ($_SERVER['REQUEST METHOD'] === POST) && (isset($_GET['login'])){
    //retrieve the username / password from the request body
 
    include "dbconn.php";

    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $checkuser = "SELECT * FROM User WHERE username = '$username'";

    $result = $conn->query($checkuser);

    while ($row = $result->fetch_assoc()){
        $dbpass = $row["pass"];
    };


  /*   assigning boolean to $authenticated, if database pw matches pw entered
    login, assign session and redirect to dashboard */

    $authenticated = password_verify($pass, $dbpass);
    if ($authenticated){
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $username;
        echo "<p> Successfully logged in</p>"
    }
//if no result echo out an error don't process any further
    if(!$result){
        exit($conn->error);
        echo "<p>Unable to login, enter correct username and password</p>";
    }
}

?>