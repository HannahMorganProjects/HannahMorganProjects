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
$id = $_POST['moodID'];
$trigger = $conn->real_escape_string($_POST['trigger']);


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
//update row of mood table to different 'trigger' where 
//moodID matches the one passed through from 'editmoodcontext.php'
$updateSQL = "UPDATE moods SET `trigger`='$trigger' WHERE `id` = '$id'";
$result = $conn->query($updateSQL);
if (!$result){
    echo "<p>Unable to edit mood</p>";
    exit($conn->error);
} else {
    echo "<p>Mood successfully updated <a href=moodlist.php>Back to Mood List</a></p>";
}




?>




</body>
</html>