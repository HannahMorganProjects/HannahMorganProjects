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
?>


<!DOCTYPE html>
<html lang="en" class="has-background-warning">
    <head>    
        <meta charset="UTF-8">    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <title>My Moods</title>    
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> 
        
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
   
    </head>
    <body>    
        
     
            <div class="hero is-large">        
                <div class="hero-body is-justify-content-center is-align-items-center pt-6 pb-6">
                    <div class="columns is-flex is-flex-direction-column box">                
                    <div class="column has-text-centered">                    
                    <!--Visualisation-->                    
                <?php
                //get data to populate chart
                    $moodLabels = array();
                    $moodData = array();
                // group the moods by how many times each mood appears in db table
                    $readSQL = 
                    "SELECT mood_values, COUNT(*) 
                    FROM moods WHERE username = '$name'
                    GROUP BY mood_values;";

                    $result = $conn->query($readSQL);
                    while ($row = $result->fetch_assoc()) {
                        $moodLabels[] = $row["mood_values"];
                        $moodData[] = $row["COUNT(*)"];
                    }
                    ?>           
                    <h3 class="title is-3">My Mood Chart</h3>    
                   <hr>              
                    <canvas id="moodChart"></canvas>                
                    </div>            
                    </div>        
                    </div>    
                    </div>     
                        <!--Script to create mood Visualisation---->    
                        <script>        
                        var ctx = document.getElementById('moodChart').getContext('2d');
        var moodChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($moodLabels); ?>,
                datasets: [{
                    label: '# of Moods',
                    data: <?php echo json_encode($moodData); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 156, 185, 0.2)',
                        'rgba(255, 214, 241, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(220, 20, 60, 1)',
                        'rgba(255, 20, 147, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <?php include("footer.html");?>
    </body>
    </html>