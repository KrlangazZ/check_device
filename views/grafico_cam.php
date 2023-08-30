<?php
require '../connect_db.php';
date_default_timezone_set("America/Santiago");


$lastMonthStart = date('Y-m-01', strtotime('0 month'));
$lastMonthEnd = date('Y-m-t', strtotime('0 month'));


$sql = "SELECT
            device_name,
            SUM(CASE WHEN device_status = 1 THEN 1 ELSE 0 END) AS activaciones,
            SUM(CASE WHEN device_status = 0 THEN 1 ELSE 0 END) AS inactivaciones
        FROM registro
        WHERE fecha_hora BETWEEN '$lastMonthStart' AND '$lastMonthEnd'
        GROUP BY device_name
        ";
//LIMIT 5

$result = mysqli_query($conn, $sql);

$data = array();


if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
} else {
  echo "Error en la consulta: " . mysqli_error($conn);
}

mysqli_close($conn);



?>

<!DOCTYPE HTML>
<html>

<head>
  <link rel="icon" type="image/png" href=" ../img/favicon-32x32.png">
  <script>
    // Suponiendo que tienes los datos de PHP en el arreglo $data

    // Convertir los datos de PHP a JavaScript

    var data = <?php echo json_encode($data); ?>;
    console.log(data);

    var deviceNames = [];
    var activaciones = [];
    var inactivaciones = [];

    data.forEach(function(entry) {
      deviceNames.push(entry.device_name);
      activaciones.push(parseInt(entry.activaciones));
      inactivaciones.push(parseInt(entry.inactivaciones));
    });
    console.log(activaciones);
    window.onload = function() {
      var chart = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        animationEnabled: true,
        title: {
          text: "CCTV"
        },

        axisX: {
          title: "Estados"
        },
        axisY: {
          title: "Online",
          titleFontColor: "#4F81BC",
          lineColor: "#4F81BC",
          labelFontColor: "#4F81BC",
          tickColor: "#4F81BC",
          includeZero: true
        },
        axisY2: {
          title: "OffLine",
          titleFontColor: "#C0504E",
          lineColor: "#C0504E",
          labelFontColor: "#C0504E",
          tickColor: "#C0504E",
          includeZero: true
        },
        toolTip: {
          shared: true
        },
        legend: {
          cursor: "pointer",
          itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Online",
            showInLegend: true,
            yValueFormatString: "#,##0.# Units",
            dataPoints: deviceNames.map(function(name, index) {
              return {
                label: name,
                y: activaciones[index]
              };
            })
          },
          {
            type: "column",
            name: "Offline",
            axisYType: "secondary",
            showInLegend: true,
            yValueFormatString: "#,##0.# Units",
            dataPoints: deviceNames.map(function(name, index) {
              return {
                label: name,
                y: inactivaciones[index]
              };
            })
          }
        ]
      });
      chart.render();

      function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
          e.dataSeries.visible = false;
        } else {
          e.dataSeries.visible = true;
        }
        e.chart.render();
      }

    }
  </script>
</head>

<body>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  <script src="../assets/canvasjs-chart/canvasjs.min.js"></script>

</body>

</html>