<?php
//ini_set("allow_url_fopen", 1);
$archivoGZ = gzfile('https://smn.cna.gob.mx//webservices/?method=1');
$json = file_get_contents($archivoGZ);
// convierte ese array a una cadena de texto
$cadenaGZ = implode("", $archivoGZ);

// conviértela a un objeto procesable por PHP
$jsonGZ = json_decode($cadenaGZ,true);

$estado= "MEX";
$nameAnterior= "";
$arreglo ="cityName =[";

   foreach ($jsonGZ as $key => $value )  {
     if ($estado==$jsonGZ[$key]['StateAbbr']){
        $nameCiudad=$jsonGZ[$key]['Name'];
        if ($nameCiudad==$nameAnterior) continue;
        else {
         $nameAnterior=$nameCiudad;
         $arreglo = $arreglo."\"".$jsonGZ[$key]['CityId']."\"=>\"".$nameCiudad."\",";
         /*
          echo '<p>CityId : '.$jsonGZ[$key]['CityId'].'</p>';
          echo '<p>Nombre : '.$nameCiudad.'</p>';
          echo '<p>Fecha : '.$jsonGZ[$key]['LocalValidDate'].'</p>';
          */
         }
       }
     }
     $arreglo=$arreglo."]";
     echo $arreglo;
  echo "Termino la búsqueda";


 ?>
