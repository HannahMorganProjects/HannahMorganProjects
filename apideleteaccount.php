<?php

//DELETE / DELETE SELECTED ACCOUNT - WORKING ON POSTMAN

header("Content-Type: application/json");

if (($_SERVER['REQUEST_METHOD']==='DELETE') && (isset($_GET['deleteaccount']))) {

include "dbconn.php";

parse_str(file_get_contents('php://input'), $_DATA);

$user = $conn->real_escape_string($_DATA['username']);
    
$deleteSQL = 
"DELETE FROM User WHERE `username` = '$user'";
$result = $conn->query($deleteSQL);
if (!$result){
    echo "<p>Unable to delete account</p>";
    exit($conn->error);
} else {
    echo "<p>Account successfully deleted <a href=index.html>Back to Home Page</a></p>";
}


    
} 

?>