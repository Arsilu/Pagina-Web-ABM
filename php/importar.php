<?php
include ("./conexion.php");

try {
    if(isset($_POST["submit"])) {
        $file = $_FILES['file']['tmp_name'];
        if(($archivo=fopen($file,"r"))!== false){
            $pdo->beginTransaction();
            $sql = $pdo->prepare("INSERT INTO pedido (codigo,nombre,cantidad,sabores,estado,evento)VALUES(?,?,?,?,?,?)");

            while(($datos= fgetcsv($archivo,1000,","))!== false){
                if(count($datos)==6){
                    $sql->execute($datos);
                }
                else 
                echo implode(",", $datos);
            }
            $pdo->commit();
            fclose($archivo);

            echo '<script type="text/javascript">
            confirm("Los datos del archivo CSV han sido insertados correctamente.");
            window.location.href = "/Index.html";
          </script>';
        }
        else{
             echo '<script type="text/javascript">
            confirm("Ha ocurrido un error, y los datos no han podido ser insertados.");
            window.location.href = "/Index.html";
          </script>';
        }
    }
}
catch (PDOException $error){
    if($pdo->inTransaction()){
    $pdo->rollBack();
    }
    echo $error->getMessage();
}

$pdo = null;

?>

<!DOCTYPE html>
<html lang="es">
    <link rel="stylesheet" href="/estilos/importar.css">
    <link rel="stylesheet" href="/estilos/header.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar</title>
</head>

<header>
    <img src="/cositos/osito.png" alt="osito" class="imagen_osito" />
    <span class="texto_usuario">Bienvenido Empleado</span>
</header>

<body>
<div class="body">
  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <span>
            Seleccione el archivo CSV.
        </span>
        <input type="file" name="file" class="file_ped">
        <div class="botones">
            <a href="/Index.html">Volver</a>
            <button type="submit" name="submit">Importar</button>

        </div>
    </form>
  </div> 
  </div> 
</body>
</html>
