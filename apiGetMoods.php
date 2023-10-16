<?php
header("Content-Type: application/json");

// GET / SHOW MOODS - NOT WORKING ON POSTMAN (LINE 27 EXPECTS STRING PARAM NOT ARRAY)

if ($_SERVER['REQUEST_METHOD']=== 'GET'){
    include ("dbconn.php");

    parse_str(file_get_contents('php://input'), $_DATA);

    $user = $conn->real_escape_string($_DATA['username']);

    $readSQL = "SELECT `mood_values`, `trigger`, `tstamp` FROM moods WHERE username = '$user'";
    
    $result = $conn->query($readSQL);
    
    if (!$result){
        exit($conn->error);
}

$api_response = array();

while ($row = $result->fetch_assoc()){
    array_push($api_response, $row);
}

$response = json_decode($api_response);

if ($response != false){
    http_response_code(200);
    echo $response;
} else {
    http_response_code(404);
    echo json_encode(["message" => "Unable to process response!"]);
}

}

?>