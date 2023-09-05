<?php
require 'connect_db.php';
date_default_timezone_set("America/Santiago");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrapmin.css?v=1" rel="stylesheet">
  <link href="assets/fontawesome/css/all.css?v=1" rel="stylesheet">
  <link href="assets/fontawesome/css/v4-shims.css" rel="stylesheet">
  <link rel="icon" type="image/png" href=" img/favicon-32x32.png">

  <title>Check Device</title>
</head>

<body>

  <div class="container">


    <div class="row">
      <div class="col-sm-3">
        <img src="img/logo-asiste.jpg" class="rounded" alt="Asiste Security">
      </div>



      <div class="col-sm-2 offset-md-5">
        <img src="img/logo-cial-alimentos1.png" class="rounded" alt="CiAL Alimentos">
      </div>


    </div>

    <div class="row">
      <h1 class="text-center text-primary-emphasis fw-bold">Estado de Dispositivos</h1>

      <div class="row">
        <div class="col-sm-2">
          <a href="views/grafico.php" class="btn btn-primary" role="button" target="_blank">Estado del Servicio
            General</a>
        </div>

        <div class="col-sm-2">
          <a href="views/grafico_cam.php" class="btn btn-primary" role="button" target="_blank">Estado del Servicio
            Detallado</a>
        </div>

      </div>

      <table class=" table table-striped table-hover">
        <tr class="bg-primary">
          <th>
            <p class="text-white fs-5">NOMBRE DEL DISPOSITIVO</p>
          </th>
          <th>
            <p class="text-white fs-5">IP</p>
          </th>
          <th>
            <p class="text-white fs-5">ESTADO</p>
          </th>
        </tr>

        <?php

        /*
        <i class="fa-solid fa-video"></i>
        <i class="fa-solid fa-server"></i>
        <i class="fa-solid fa-network-wired"></i>
        <i class="fa-solid fa-ethernet"></i>
        <i class="fa-solid fa-satellite-dish"></i>
        */

        $device_name = '';
        $device_ip = '';
        $device_status = 0;
        $device_type = 0;
        $device_location = '';
        $planta_id = 1;
        $servidor_nvr = '';
        $fecha = date("d/m/Y - H:i:s");

        echo '<p class="fs-6 text-end"> ÚLTIMA ACTUALIZACIÓN RECIBIDA EL: ' . $fecha . '</p>';



        $res = shell_exec("ping -n 1 150.0.74.6");

        $device_name = 'NVR 74.6';
        $device_ip = '150.0.74.6';
        $device_user = 'admin';
        $device_type = 1;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Sala de Servidores';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.6';

        echo '<tr>';
        echo '<td> ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-server fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-server fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql = "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';
        $res2 = shell_exec("ping -n 1 150.0.74.36");

        $device_name = 'Lateral 1 Concha y Toro';
        $device_ip = '150.0.74.36';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Produccion';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";



        echo '</tr>';



        $res2 = shell_exec("ping -n 1 150.0.74.35");


        $device_name = 'Lateral 2 Concha y Toro';
        $device_ip = '150.0.74.35';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Produccion';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.37");

        $device_name = 'Patio Grandes Volumenes 1';
        $device_ip = '150.0.74.37';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Produccion';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.38");

        $device_name = 'Patio Grandes Volumenes 2';
        $device_ip = '150.0.74.38';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Produccion';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";



        echo '</tr>';



        $res = shell_exec("ping -n 1 150.0.74.7");
        $device_name = 'NVR 74.7';
        $device_ip = '150.0.74.7';
        $device_user = 'admin';
        $device_type = 1;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Sala de Servidores';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.7';

        echo '<tr>';
        echo '<td> ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-server fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-server fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";

        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.245");

        $device_name = 'Peatonal Porteria 2';
        $device_ip = '150.0.74.245';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Porteria 2';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.7';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.247");

        $device_name = 'Ingreso NCD';
        $device_ip = '150.0.74.247';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Porteria 2';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.7';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";

        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.246");

        $device_name = 'Riles Exterior';
        $device_ip = '150.0.74.246';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Riles';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.7';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";

        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.205");

        $device_name = 'Ingreso Camion de Valores';
        $device_ip = '150.0.74.205';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Perimetro Estanco';
        $planta_id = 1;
        $servidor_nvr = '150.0.74.7';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';




        $res2 = shell_exec("ping -n 1 150.0.75.6");

        $device_name = 'NVR 75.6';
        $device_ip = '150.0.75.6';
        $device_user = 'admin';
        $device_type = 1;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Sala de Servidores';
        $planta_id = 1;
        $servidor_nvr = '150.0.75.6';

        echo '<tr>';
        echo '<td> ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-server fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-server fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.126");


        $device_name = 'Sala de Botas';
        $device_ip = '150.0.74.126';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Producción Piso 2';
        $planta_id = 1;
        $servidor_nvr = '150.0.75.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.180");


        $device_name = 'Ing Gerencia Operaciones';
        $device_ip = '150.0.74.180';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Producción Piso 2';
        $planta_id = 1;
        $servidor_nvr = '150.0.75.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";



        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.181");

        $device_name = 'Sala de Capacitaciones';
        $device_ip = '150.0.74.181';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Producción Piso 2';
        $planta_id = 1;
        $servidor_nvr = '150.0.75.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";



        echo '</tr>';

        $res2 = shell_exec("ping -n 1 150.0.74.207");


        $device_name = 'Bodega ALKAR';
        $device_ip = '150.0.74.207';
        $device_user = 'admin';
        $device_type = 0;
        $device_pwd = 'Asiste_8111980';
        $device_location = 'Producción Piso 2';
        $planta_id = 1;
        $servidor_nvr = '150.0.75.6';

        echo '<tr>';
        echo '<td> -- ' . $device_name . ' </td>';
        echo '<td> ' . $device_ip . ' </td>';
        if (strpos($res, "Host de destino inaccesible") || strpos($res, "Tiempo de espera agotado")) {
          echo '<td><i class="fa-solid fa-video fa-2xl" style="color: #ff0000;"></i> </td>';
          $device_status = 0;
        } else {
          echo '<td> <i class="fa-solid fa-video fa-2xl" style="color: #11ff00 ;"></i> </td>';
          $device_status = 1;
        }

        $sql .= "INSERT INTO registro (device_name, device_ip, device_status, device_type, device_user, device_pwd, device_location, planta_id, servidor_nvr, fecha_hora) 
              VALUES ('$device_name','$device_ip','$device_status','$device_type','$device_user','$device_pwd','$device_location','$planta_id','$servidor_nvr',NOW());";


        echo '</tr>';


        if ($conn->multi_query($sql) === TRUE) {

          $mensaje = "Datos Ingresados";
          $script = "<script>console.log('$mensaje');</script>";

          echo $script;
        } else {
          echo "Error en las inserciones: ";
        }


        echo '</tr>';


        ?>
      </table>
    </div>


  </div>

  <?php
  // Cerrar la conexión
  $conn->close();
  ?>
  <script type="text/javascript">
  function actualizarPagina() {
    location.reload();
  }
  setInterval(actualizarPagina, 300000);
  </script>
  <script src="js/fontawesome.js?v=1"></script>
  <script src="js/bootstrap_531.js?v=1">
  </script>
</body>

</html>