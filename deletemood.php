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

$moodID = $_GET['deleteid'];

$readSQL = "SELECT * FROM moods WHERE id=$moodID";
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

<h1 class="title">Are you sure you want to delete this mood entry?</h1>

<table class='table is-bordered is-striped is-hoverable'>
    <thead>
        <tr>
            <th class ="has-background-white is-size-4">Mood</th>
            <th class ="has-background-white is-size-4">Context (Trigger)</th>
            <th class ="has-background-white is-size-4">Timestamp</th>
</tr>
</thead>
<tbody>
    <?php
// while loop to loop through results of array and assign each row of database
//table to appropriate variable
    while ($row = $result->fetch_assoc()){

        $mood = $row["mood_values"];
        $trigger = $row["trigger"];
        $tstamp = $row["tstamp"];
        $moodID = $row["id"];

        echo "<tr> 
        <td>$mood</td>
        <td>$trigger</td>
        <td>$tstamp</td>";
    }
    ?>
</table>

<!-- hidden moodID input -->
<form method="post" action="processdeletemood.php">

<input type="hidden" value="<?php echo $moodID;?>" name="moodID">

<!-- Delete button -->
<div class="field">
    <div class="control">
        <input class="button is-danger is-large is-rounded" type="submit" value="Delete" name="delete">
</div>
</div>
</form>

</body>
</html>