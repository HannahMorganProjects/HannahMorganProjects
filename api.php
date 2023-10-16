<?php
header("Content-Type: application/json");


// POST / CREATE ACCOUNT - WORKING

if (($_SERVER['REQUEST_METHOD']==='POST') && (isset($_GET['createaccount']))) {

include "dbconn.php";

parse_str(file_get_contents('php://input'), $_DATA);

$name = $conn->real_escape_string($_DATA['name']);
$surname = $conn->real_escape_string($_DATA['surname']);
$username = $conn->real_escape_string($_DATA['username']);
$email = $conn->real_escape_string($_DATA['email']);
$pass = $conn->real_escape_string($_DATA['pass']);

    
$hashpw = password_hash($pass, PASSWORD_DEFAULT);

    $insertSQL = "INSERT INTO User (name, surname, username, email, pass) VALUES ('$name', '$surname', '$username', '$email', '$hashpw')";
    $result = $conn->query($insertSQL);
    if (!$result) {
        http_response_code(400);
        exit($conn->error);
    } else {
        http_response_code(201);
        $last_id = $conn->insert_id;
        echo "<p> Account successfully created <a href=loginpage.php>Go to login</a></p>";
    }
} 

?>