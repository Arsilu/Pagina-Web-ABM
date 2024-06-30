<?php 
include("conexion.php");

$item_desc = 'Mouse Inalambrico';
$item_id = 4;
$qrystr = "UPDATE item 
           SET item_desc = :item_desc
           WHERE item_id = :item_id";

$stmt = $pdo->prepare($qrystr);
$stmt->bindParam(':item_desc', $item_desc, PDO::PARAM_STR,100);
$stmt->bindParam(':item_id', $item_id, PDO::PARAM_INT);
if ($stmt->execute())
    echo "La actualización se realizó con éxito";
else
    echo "La actualización no se pudo realizar";