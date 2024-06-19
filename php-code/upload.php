<?php 

    $name = $_FILES["archivo"]["name"];
    $type = $_FILES["archivo"]["type"];
    $size = $_FILES["archivo"]["size"];
    $tml_name = $_FILES["archivo"]["tmp_name"];
    $error = $_FILES["archivo"]["error"];
    $path = "";
    $filename = "datos_upload.csv";
    $fichero_subido = $path . $filename;
       
     move_uploaded_file($tml_name, $fichero_subido);

     $f = fopen("datos_upload.csv","r");
     $linea = fgets($f);
     $ar_titulos = explode(";",$linea);
     while  (!feof($f)) {
          $linea = fgets($f);
          $ar_datos = explode(";",$linea);
          for ($i=0;$i<count($ar_titulos);$i++){
              echo $ar_titulos[$i] . ": " . $ar_datos[$i] . "<br>";
           } // Fin del for
     echo "************************<br>";  
 }
fclose($f);
  unlink("datos_upload.csv")  
 ?>     