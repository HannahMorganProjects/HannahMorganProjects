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
//passed through from hidden form field in 'moodlist.php'
$moodID = $_GET['editid'];
//query to display mood from specific ID which they chose to edit
$readSQL = "SELECT * FROM moods WHERE id=$moodID";
$result = $conn->query($readSQL);
//error handling
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

<?php
while ($row = $result->fetch_assoc()){
    $mood = $row["mood_values"];
    $trigger = $row["trigger"];
    $tstamp = $row["tstamp"];
}
?>

<!-- edit context field -->

<div class="container is-justify-content-center is-align-items-center pt-6 pb-6 has-background-danger-light">

<form method="post" action="processedit.php">

<div class="field">
    <label class="label is-size-3" for="context-input">Edit context - what triggered this mood?</label>
    <div class="control">
        <input class="input" name="trigger" type="text" value="<?php echo $trigger;?>" id="context-input">
</div>
</div>

<!-- hidden moodID input -->

<input type="hidden" value="<?php echo $moodID;?>" name="moodID">

<!-- Submit button -->
<div class="field">
    <div class="control">
        <input class="button is-danger is-large is-rounded" type="submit" value="Edit Context" name="submitted">
</div>
</div>

<a href="moodlist.php" class="button is-info is-large is-rounded">Back</a>

</form>
</div>
</body>
</html>