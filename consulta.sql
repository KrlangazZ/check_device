$sql = "SELECT
            device_name,
            SUM(CASE WHEN device_status = 1 THEN 1 ELSE 0 END) AS activaciones,
            SUM(CASE WHEN device_status = 0 THEN 1 ELSE 0 END) AS inactivaciones
        FROM registro
        WHERE fecha_hora BETWEEN '$lastMonthStart' AND '$lastMonthEnd'
        GROUP BY device_name";


$result = mysqli_query($conn, $sql);

if ($result) {

  while ($row = mysqli_fetch_assoc($result)) {
    $device = $row['device_name'];
    $activaciones = $row['activaciones'];
    $inactivaciones = $row['inactivaciones'];
  }

  //echo "En el último mes:\n";
  //echo "Total de activaciones: $activaciones\n";
  //echo "Total de inactivaciones: $inactivaciones\n";
} else {
  echo "Error en la consulta: " . mysqli_error($conn);
}