<?php
require_once('init.php');

$dataPoints = array();

global $database;

$MYhandle = $database->query("SELECT count(cart.barcode) as count, product.name FROM product inner join cart ON product.barcode = cart.barcode group by product.name limit 5");
foreach ($MYhandle as $row) {
    array_push($dataPoints, array("y"  => $row['count'], "label" => $row['name']));
}

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
    <script type="text/javascript">
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "The best-selling product"
                },
                axisY: {
                    title: "Count"
                },
                data: [{
                    type: "column",
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
        <p class="pL">Here you can find the range of our products on TNS and the number of purchases of each product.</p>
    <button type="button" class="btnn pL" onclick="sendPersonal()">Click to go back</button>
        <div id="chartContainer" style="width: 60%; margin:auto; position:relative;"></div>
        
    </main>

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>