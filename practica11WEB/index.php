<?php
$cityName = array(
  "020" => "General Bravo",
  "021" => "General Escobedo",
  "022" => "General Terán",
  "023" => "General Treviño",
  "024" => "General Zaragoza",
  "025" => "General Zuazua",
  "026" => "Guadalupe",
  "027" => "Las Herreras",
  "028" => "Higueras",
  "029" => "Hualauises"
);

$ides="19";
?>
<!DOCTYPE html>
<html lang="es-mx">
<head>
  <title>Nuevo León</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
<!--ENLACE A ICONOS-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
<div class="container">
 <h1>ㅤㅤㅤPronóstico de Clima</h1>

 <form method="get" name="forecast" action="app/getJsonM1.php">
  <table>
   <tr>
   <th style="background-color: pink;">ㅤLista de ciudades</th>
   <td>
   <select name="ciudadesMx">
   <?php foreach ($cityName as $city => $Name){ ?>
        <option value="<?= $city?>"><?= $Name?></option>
   <?php } ?>
   </select>
   </td>
   <th style="background-color: pink;">&nbsp;</th>
   <td><input type="submit" value="Ok"></td>
   </tr>
 </table>
 </form>
</div>
</body>
</html>
