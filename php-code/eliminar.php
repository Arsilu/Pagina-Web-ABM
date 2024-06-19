<?php 
include("conexion.php");

$id = $_GET["id"];

// Delete   
   $qrystr = "DELETE FROM usuario
              WHERE
                 usuario_id = $id";

//echo "$qrystr<br>";
$stmt = $pdo->prepare($qrystr);
$stmt->execute();

header("location:index.php?pagina=lista_datos.php");
?>