<?php
session_start();

include("dbconn.php");

if (!isset($_SESSION['loggedin'])){
    $loggedin = false;

} else {
    $loggedin = true;
}

include "navbar.php";
//assigning form data to variables
$name = $_SESSION['name'];
$moodtype = $conn->real_escape_string($_POST['moodtype']);
$triggercontext = $conn->real_escape_string($_POST['trigger']);


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

$insertSQL = "INSERT INTO moods (`username`, `mood_values`, `trigger`) VALUES ('$name', '$moodtype', '$triggercontext')";
$result = $conn->query($insertSQL);
header("Location:dashboard.php");

/* if (!$result){
    echo "<p>Unable to add mood</p>";
    exit($conn->error);
} else {
    echo "<p>Mood added successfully <a href 'dashboard.php'>Back to Home Page</a></p>";
} */

?>




</body>
</html>