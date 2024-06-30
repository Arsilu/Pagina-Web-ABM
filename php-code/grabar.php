<?php 
include("conexion.php");

$id = $_POST["id"];
$apellido = $_POST["apellido"];
$nombre = $_POST["nombre"];

if ($id == -1){
// Insert   
   $qrystr = "INSERT INTO usuario
                (usuario_apellido,
                 usuario_nombre)
              VALUES
                ('$apellido',
                 '$nombre')";
}
else {
// Update   
   $qrystr = "UPDATE usuario
              SET 
                 usuario_apellido = '$apellido',
                 usuario_nombre = '$nombre'
              WHERE
                 usuario_id = $id";
}
//echo "$qrystr<br>";
$stmt = $pdo->prepare($qrystr);
$stmt->execute();

header("location:index.php?pagina=lista_datos.php");
?>