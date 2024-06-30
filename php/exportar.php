<?php

include ("./conexion.php");

try { header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=pedidos.csv');
    $output = fopen("php://output","w");
    $sql = $pdo->query("SELECT * FROM pedido");

    while($fila = $sql->fetch(PDO::FETCH_ASSOC)){
        fputcsv($output,$fila);
    }
fclose($output);
}
catch(PDOException $error){
    echo $error->getMessage();
}

$pdo = null;