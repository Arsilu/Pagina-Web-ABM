<?php 
include("conexion.php");

$id = $_GET["id"];

$qrystr = "SELECT * FROM 
              usuario
           WHERE 
              usuario_id = $id";

$stmt = $pdo->prepare($qrystr);
$stmt->execute();
if($row = $stmt->fetch()){
   $apellido = $row["usuario_apellido"];
   $nombre = $row["usuario_nombre"];
}
else {
   $apellido = "";
   $nombre = "";
}



echo "<form method='post' action='grabar.php'>";
echo "<input type='hidden' name='id' value='$id'><br>";
echo "Apellido: <input type='text' name='apellido' value='$apellido'><br>";
echo "Nombre: <input type='text' name='nombre' value='$nombre'><br>";
echo "<input type='submit' value='Grabar'>";
echo "</form>";
?>