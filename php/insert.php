<?php
include("conexion.php");

try {
    $qrystr = "INSERT INTO pedido (nombre,cantidad,sabores,evento,estado)
    VALUES (:nombre,:cantidad,:sabores,:evento,:estado)";

    $stmt = $pdo->prepare($qrystr);
    
    $cnombre = $_POST["cnombre"];
    $cantidad = $_POST["cantidad"];
    $sabores = $_POST["sabores"];
    $evento = $_POST["ocasion"];
    $estado = "pendiente";


    
    $stmt->bindParam(':nombre', $cnombre, PDO::PARAM_STR);
    $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
    $stmt->bindParam(':sabores', $sabores, PDO::PARAM_STR);
    $stmt->bindParam(':evento', $evento, PDO::PARAM_STR);
    $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);

   
    $stmt->execute();
    echo '<script type="text/javascript">
        confirm("datos insertados correctamente!");
        window.location.href = "/Index.html";
      </script>';
} catch (PDOException $e) {
    echo "<script type='text/javascript'>
            confirm('Error: " . $e->getMessage() . "');
          </script>";
        }
?>