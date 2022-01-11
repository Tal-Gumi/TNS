<?php
require_once('init.php');

$email = '';

if ($_SESSION) {
    $email = $_SESSION['email'];
}

$dataPoints = array();

global $database;

$handle = $database->query("SELECT AVG(totalcost) Total from orders WHERE email!='" . $email . "' UNION SELECT AVG(totalcost) from orders WHERE email='" . $email . "'");
foreach ($handle as $row) {
    array_push($dataPoints, array("label" => $row['Total'], "y"  => $row['Total']));
}

$dataPoints = array(
    array("label" => "ALL", "y" => $dataPoints[0]['label']),
    array("label" => "ME", "y" => $dataPoints[1]['label'])
);




?>

<!DOCTYPE HTML>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../css/phpStyle.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/f02a42901d.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<script src="../js/js.js"> </script>
    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainerR", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Average purchases - YOU VS ALL"
            },
            axisY: {
                title: "Count"
            },
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.##",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
    </script>
</head>

<body>
<header id="MYheader"></header>
<script>  $( "#MYheader" ).load( "headerFooter.php #MYheader" ); </script>

<nav id="MYnav"></nav>
<script>  $( "#MYnav" ).load( "headerFooter.php #MYnav");  </script>
<main class="E">
    <h3 class="hhh">Personal information</h3>
    <p class="pL">Here you can see the average of your purchases compared to other users.</p>
    <button type="button" class="btnn pL" onclick="sendPersonal()">Click to go back</button>
    <div id="chartContainerR" style="width: 60%; margin:auto; "></div>
</main>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>