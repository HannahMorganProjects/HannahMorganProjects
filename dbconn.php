<?php

$host = "localhost";
$user = "root";
$pw = "";
$db = "moodjournaldb";

$conn = new mysqli($host, $user, $pw, $db);

if ($conn->connect_error){
    exit($conn->connect_error);
} 

?>