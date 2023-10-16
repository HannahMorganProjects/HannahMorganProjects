<?php
session_start();

if (!isset($_SESSION['loggedin'])){
    $loggedin = false;
    header("Location:loginpage.php");

} else {
    $loggedin = true;
}
$name = $_SESSION['name'];

include "navbar.php";

?>


<!DOCTYPE html>
<html lang="en" class="has-background-white">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>

    <section class="section">
        <div class="container">
        <div class="column is-size-4">
        <?php
        //if logged in, personalise greeting message
        if ($loggedin){
            echo "<h2 class='title'>Welcome {$_SESSION['name']}!</h2>";
        } else {
            echo "<h2 class='title'>Welcome Guest!</h2";
        }
        ?>
<hr>
    </div>

    <div class="columns">
    <div class="column has-background-link-light is-three-quarters px-6 py-6">
        <div class="subtitle is-size-2 is-italic"> About us
            <hr>

            <div class="column">
        <img class="is-rounded" src="img/happypebble.jpg">
    </div>
<!-- ABOUT US SECTION -->
            <div class="has-text-centered is-size-6 py-4 px-4">
                
                <p> The public is becoming increasingly aware of the benefits of looking after 
                one's emotional wellbeing.</p>

                <p>Here at Mood Journal we recognise the growth in approaches aiming to record and measure
                emotional wellbeing.</p>
                
                <p>These include acitivies such as <strong>journalling</strong>, meditiation 
                improving mindfulness.</p> 

                <hr>

                <p>Our website allows the user to track their daily moods and record these to allow 
                for review afterwards. This facilitates insight into their moods over time.</p> 
                
                <p>By recording the user's mood at random points throughout the day, the user will be able to view 
                trends and patterns which may emerge over time. By allowing the user to add context to their recorded mood, 
                we enable the user to identify any recurring causes of specific moods.</p>

                <p>By building a mood profile over time, we provide a 'Mood Summary' which enables the user to view all of their recorded
                moods as a pie chart.</p> 

                <hr>

                <p>This makes it easy to identify trends within mood logs!
                    Get started today by logging your first mood.</p>

            </div>

    </div>
</div>

<!-- buttons to take to mood log, list and summary -->

    <div class="column">

        <p> <a class="button is-info is-medium is-rounded" href="addmoodform.php">Mood Log</a>
</p>

<br>
<!-- pass SESSION username variable through to 'moodlist.php' -->
<?php  echo "<p><a class='button is-success is-medium is-rounded' href='moodlist.php?user=$name'>Mood List</a></p>" ?>

<br>

        <p><a class="button is-danger is-medium is-rounded" href="moodsummary.php">Mood Summary</a>
</p>

    </div>

    
</div>
</section>

<?php include("footer.html");?>

</body>
</html>