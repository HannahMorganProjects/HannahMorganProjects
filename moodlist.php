<?php
session_start();

include("dbconn.php");
include ("navbar.php");

if (!isset($_SESSION['loggedin'])){
    $loggedin = false;

} else {
    $loggedin = true;
}
$name = $_SESSION['name'];

$readSQL = "SELECT `id`, `mood_values`, `trigger`, `tstamp` FROM moods WHERE username = '$name'";

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
    <title>Mood List</title>

</head>
<body>

<div class='container has-background-link-light my-6 has-text-centered is-size-5'>
    <div class='columns is-mobile is-centered'>
      <div class='column is-8'>
        <div>
          <h1 class='title'>My Mood Journal:</h1>
          <hr>
        </div>
        <table class='table is-bordered is-striped is-hoverable'>
    <thead>
        <tr>
            <th class ="has-background-white is-size-4">Mood</th>
            <th class ="has-background-white is-size-4">Context (Trigger)</th>
            <th class ="has-background-white is-size-4">Timestamp</th>
            <th class ="has-background-white is-size-4">Edit</th>
</tr>
</thead>
<tbody>
    <?php

    while ($row = $result->fetch_assoc()){
//assign values from database to variables
        $mood = $row["mood_values"];
        $trigger = $row["trigger"];
        $tstamp = $row["tstamp"];
        $moodID = $row["id"];

        echo "<tr> 
        <td>$mood</td>
        <td>$trigger</td>
        <td>$tstamp</td>";

        // pass through moodID to editmoodcontext.php and deletemood.php

        echo "<td>
        <a href= 'editmoodcontext.php?editid=$moodID' class='button is-primary'>Change Context</a>
        <a href= 'deletemood.php?deleteid=$moodID' class='button is-danger'>Delete</a>
        </td>
        </tr>";

    }

    ?>
    </tbody>
</table>
</div>
</body>

</html>
