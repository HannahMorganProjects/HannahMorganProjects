<?php
session_start();

include("dbconn.php");

if (!isset($_SESSION['loggedin'])){
    $loggedin = false;

} else {
    $loggedin = true;
}

include "navbar.php";

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

<div class="container is-justify-content-center is-align-items-center">
<?php
// personalise greeting
echo "<h2 class='title'>How're you feeling {$_SESSION['name']}?</h2>";
?> 
</div>
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column">
                <h2 class="title">Add Mood</h2>

            <!-- form to add moods -->

                <form method="post" action="processaddmood.php">
                    <div class="field">
                        <label class="label" for="mood-input">Choose Mood</label>
                        <div class="select">
                            <select name="moodtype" id="mood-input" required>
                                <option>Excited</option>
                                <option>Happy</option>
                                <option>Content</option>
                                <option>Relaxed</option>
                                <option>Lethargic</option>
                                <option>Depressed</option>
                                <option>Upset</option>
                                <option>Stressed</option>
                                
</select>
</div>
</div>



<div class="field">
    <label class="label" for="context-input">Enter brief context - what triggered this mood?</label>
    <div class="control">
        <input class="input" name="trigger" type="text" placeholder="Enter context" id="context-input">
</div>
</div>

<!--pass the SESSION username variable through to 'processaddmood.php -->

<div class="field">
    <div class="control">
    <input type="hidden" name="hiddenField" id="hiddenField" value= <?php echo $_SESSION['name']?>/> 
</div>
</div>

<div class="field">
    <div class="control">
        <input class="button is-danger is-large is-rounded" type="submit" value="Submit" name="submitted">
</div>
</div>

</form>

</div>
</div>
</div>
</section>




</body>
</html>