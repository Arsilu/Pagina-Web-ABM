<?php 
include("conexion.php");

$qrystr = "SELECT * FROM 
              usuario
           ORDER BY
              usuario_apellido,
              usuario_nombre";

$stmt = $pdo->prepare($qrystr);
$stmt->execute();
?>
<center>
<table>
   <tr>
      <th colspan='3'><a href="editar.php?id=-1">Agregar</a></th>
   </tr>
   <tr>
      <th>Apellido</th>
      <th>Nombre</th>
      <th>Acciones</th>
   </tr>   

<?php
while($row = $stmt->fetch()) {
     $id = $row["usuario_id"];
     $apellido = $row["usuario_apellido"];
     $nombre = $row["usuario_nombre"];
     echo "<tr>";
     echo "<td>$apellido</td>";
     echo "<td>$nombre</td>";
     echo "<td>";
     echo "<a href='editar.php?id=$id'>Editar</a>";
     echo " | ";
     echo "<a href='eliminar.php?id=$id'>Eliminar</a>";
     echo "</td>";
     echo "</tr>";
  };  

?>
</table>
</center>