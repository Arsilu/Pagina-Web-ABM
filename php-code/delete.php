<?php 
include("conexion.php");

$item_id = 4;
$qrystr = "DELETE FROM item 
           WHERE item_id = :item_id";
$stmt = $pdo->prepare($qrystr);
$stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
$stmt->execute();
if ($stmt->execute())
    echo "La eliminación se realizó con éxito";
else
    echo "La eliminación no se pudo realizar";