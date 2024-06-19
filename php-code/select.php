<?php 
include("conexion.php");

$item_id = $_GET["id"];

$qrystr = "SELECT * FROM 
              item
           WHERE     
              item_id = :i_id";

$stmt = $pdo->prepare($qrystr);
$stmt->bindParam(':i_id', $item_id, PDO::PARAM_INT);
$stmt->execute();
if($row = $stmt->fetch()) {
    echo "Item: " . $row["item_id"] . "|" . $row["item_desc"] . " Precio: $" . $row["item_monto"] . "Rubro:" . $row["rubro_desc"] . "<br>";
  }
else
   echo "No se encontro el item con id $item_id";  
 





/*
SELECT -> devuelven un conjunto de datos


INSERT
UPDATE -> realizan una acción, pero no devuelven datos
DELETE  
*/
?>