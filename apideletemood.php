<?php

//DELETE / DELETE SELECTED MOOD - WORKING ON POSTMAN

header("Content-Type: application/json");

if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deletemood']))) {

include "dbconn.php";

parse_str(file_get_contents('php://input'), $_DATA);

$moodID = $conn->real_escape_string($_DATA['moodID']);
    
$deleteSQL = 
"DELETE FROM moods WHERE `id` = '$moodID'";
$result = $conn->query($deleteSQL);
if (!$result){
    echo "<p>Unable to delete mood</p>";
    exit($conn->error);
} else {
    echo "<p>Mood successfully deleted <a href=moodlist.php>Back to Mood List</a></p>";
}


    
} 

?>