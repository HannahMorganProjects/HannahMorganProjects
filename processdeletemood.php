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
$moodID = $_POST['moodID'];

//API attempt - unable to implement properly

// $endpoint = "http://localhost/moodsapi/apideletemood.php?deletemood";

//initialize new HTTP DELETE Request

//$opts = array(
//    'http'=>array(
//        'method'=>'DELETE',
//        'header'=>'Content-Type: application/x-www-form-urlencoded',
//        'content'=>$moodID
//    )
//)

//$context = stream_context_create(
//    $opts
//)
    //EXECUTE HTTP DELETE REQUEST

//    $resource = file_get_contents($endpoint, false, $context);


//    if ($resource === FALSE){
        //handle error;
//        exit("Unable to delete mood");
//    } else{
        //handle response;
//        echo "<p>Mood successfully deleted <a href=moodlist.php>Back to Mood List</a></p>";
//    }

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
//sql query to delete row from moods table according to 
//which moodID is passed through from 'deletemood.php'
$deleteSQL = 
"DELETE FROM moods WHERE `id` = '$moodID'";
$result = $conn->query($deleteSQL);
if (!$result){
    echo "<p>Unable to delete mood</p>";
    exit($conn->error);
} else {
    echo "<p>Mood successfully deleted <a href=moodlist.php>Back to Mood List</a></p>";
}

?>


</body>
</html>