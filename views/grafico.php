<?php
require '../connect_db.php';
date_default_timezone_set("America/Santiago");

// Obtener el primer y último día del último mes
$lastMonthStart = date('Y-m-01', strtotime('0 month'));
//echo $lastMonthStart;
$lastMonthEnd = date('Y-m-t', strtotime('0 month'));
//echo $lastMonthEnd;

$sql = "SELECT
            SUM(CASE WHEN device_status = 1 THEN 1 ELSE 0 END) AS activaciones,
            SUM(CASE WHEN device_status = 0 THEN 1 ELSE 0 END) AS inactivaciones
        FROM registro
        WHERE fecha_hora BETWEEN '$lastMonthStart' AND '$lastMonthEnd'";


$result = mysqli_query($conn, $sql);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $activaciones = $row['activaciones'];
  $inactivaciones = $row['inactivaciones'];

  //echo "En el último mes:\n";
  //echo "Total de activaciones: $activaciones\n";
  //echo "Total de inactivaciones: $inactivaciones\n";
} else {
  echo "Error en la consulta: " . mysqli_error($conn);
}
$estado_serv = $activaciones + $inactivaciones;
$online = ($activaciones / $estado_serv) * 100;
$offline = ($inactivaciones / $estado_serv) * 100;

mysqli_close($conn);


?>

<!DOCTYPE HTML>
<html>

<head>
  <link rel="icon" type="image/png" href=" ../img/favicon-32x32.png">
  <script>
    window.onload = function() {

      CanvasJS.addColorSet("grafico_servicio",
        [ //colorSet Array

          "#82C834",
          "#17589A",
          "#2E8B57",
          "#3CB371",
          "#90EE90"
        ]);

      var chart = new CanvasJS.Chart("chartContainer", {
        colorSet: "grafico_servicio",
        exportEnabled: true,
        animationEnabled: true,
        title: {
          text: "Stado del Servicio de CCTV "
        },
        legend: {
          cursor: "pointer",
          itemclick: explodePie
        },
        data: [{
          type: "pie",
          showInLegend: true,
          toolTipContent: "{name}: <strong>{y}%</strong>",
          indexLabel: "{name} - {y}%",
          dataPoints: [{
              y: <?php echo $online; ?>,
              name: "ONLINE",
              exploded: true
            },
            {
              y: <?php echo $offline; ?>,
              name: "OFFLINE"
            }

          ]
        }]
      });
      chart.render();
    }

    function explodePie(e) {
      if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e
          .dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
      } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
      }
      e.chart.render();

    }
  </script>
</head>

<body>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  <script src="../assets/canvasjs-chart/canvasjs.min.js"></script>
</body>

</html>