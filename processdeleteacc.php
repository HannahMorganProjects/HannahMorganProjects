<?php
session_start();

include("dbconn.php");

if (!isset($_SESSION['loggedin'])){
    $loggedin = false;

} else {
    $loggedin = true;
}

include "navbar.php";

$name = $_SESSION['name'];


?>




<!DOCTYPE html>
<html lang="en" class="has-background-danger-light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>

<?php
//query to delete current logged in user from user table in database
$deleteSQL = "DELETE FROM User WHERE `username` = '$name'";

$result = $conn->query($deleteSQL);
if (!$result){
    echo "<p>Unable to delete mood</p>";
    exit($conn->error);
} else {
    header("Location: goodbye.html");
}


?>




</body>
</html>