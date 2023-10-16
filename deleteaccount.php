<?php
session_start();

include("dbconn.php");
include "navbar.php";

if (!isset($_SESSION['loggedin'])){
    $loggedin = false;

} else {
    $loggedin = true;
}
$name = $_SESSION['name'];

$readSQL = "SELECT * FROM User WHERE username='$name'";
$result = $conn->query($readSQL);

if (!$result){
    exit($conn->error);
}
?>


<!DOCTYPE html>
<html lang="en" class="has-background-white">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Edit Mood List</title>

</head>
<body>

<h1 class="title">Are you sure you want to delete your account?</h1>

<!-- hidden account SESSION username input -->
<form method="post" action="processdeleteacc.php">

<input type="hidden" value="<?php echo $name;?>" name="username">

<!-- Delete button -->
<div class="field">
    <div class="control">
        <input class="button is-danger is-large is-rounded" type="submit" value="Delete Account" name="delete">
       <br>
        <p><a class="button is-primary is-medium is-rounded" href="dashboard.php">Back</a>
</div>
</div>
</form>
</body>
</html>