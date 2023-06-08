<?php
$archivoGZ = file_get_contents('https://smn.conagua.gob.mx/webservices/?method=1');
$cadenaGZ = gzdecode($archivoGZ);
$jsonGZ = json_decode($cadenaGZ, true);

$cityId = filter_input(INPUT_GET, "ciudadesMx");
$idEs = "19";
?>

<!DOCTYPE html>
<html lang="es-mx">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pronóstico de clima</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
  <!--ENLACE A ICONOS-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="../css/pronostico.css">
</head>
<body>
  <h1>Pronóstico para:</h1>
  <?php
  print '<h2>IdMunicipio : '. $cityId .'</h2>';
  $dia = 1;
      foreach ($jsonGZ as $key => $value)  {
        if (($cityId==$jsonGZ[$key]['idmun']) and ($idEs==$jsonGZ[$key]['ides'])) {
           if ($dia==1){
             print '<h2>Nombre : '.$jsonGZ[$key]['nmun'].'</h2>';
             print "<section class=\"pronostico\">";
           
           } 
            print ('<section class=\"dia\">');  
            $fecha = substr($jsonGZ[$key]['dloc'], 1);
            $fechaFormateada = date("l, d F Y", strtotime($fecha));
            print ('<p> Fecha: '.$jsonGZ[$key]['dloc'].'</p>');
            print '<p> Pronóstico de día : '.$jsonGZ[$key]['desciel'].'</p>';
            print '<p> Temperatura maxima : '.$jsonGZ[$key]['tmax'].'</p>';
            print '<p> Temperatura minima: '.$jsonGZ[$key]['tmin'].'</p>';
            print '<p> velocidad del viento : '.$jsonGZ[$key]['velvien'].'</p>';
            print ('</section>');
            $dia++;
        }
     }
   
  ?>
</section>
</body>
</html>






