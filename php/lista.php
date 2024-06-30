<?php 
include "./conexion.php";
$data = [];
$name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);

    if (empty($name)) {
        $sql = "SELECT * FROM pedido";
        $result = $pdo->query($sql);
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
    } else {
        $sql = $pdo->prepare("SELECT * FROM pedido WHERE nombre LIKE :nombre");
        $nombre = "%$name%";
        $sql->bindParam(":nombre", $nombre);
        $sql->execute();
        $data = array();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
    }

    if (!empty($name)) {
        $sql = null;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/estilos/lista.css" />
  <link rel="stylesheet" href="/estilos/header.css">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pedidos</title>
</head>
<header>
    <img src="/cositos/osito.png" alt="osito" class="imagen_osito" />
    <span class="texto_usuario">Bienvenido Empleado</span>
</header>


<body>
    <div class="container">
        <span class="lista-text">Pedidos</span>
        <form method="post" class="busqueda-form">
            <span class="text">Busqueda: </span>
            <input type="text" name="name" placeholder="Nombre" class="search"
                value="<?php echo htmlspecialchars($name ?? ''); ?>" />
            <button type="submit" class="button">Obtener pedidos</button>
            <a href="/Index.html" class="button">Pagina principal</a>
        </form>

        <div id="lista" class="lista">
            <table class="tabla">
                <tr class="titulos">
                    <td>Codigo</td>
                    <td>Nombre</td>
                    <td>Cantidad</td>
                    <td>Sabores</td>
                    <td>Estado</td>
                    <td>Evento</td>
                    <td>Opciones</td>
                </tr>
                <tbody>
                    <?php foreach ($data as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['codigo']); ?></td>
                        <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                        <td><?php 
                            if($item['cantidad']==0){
                            echo "A elegir";
                            }else echo htmlspecialchars($item['cantidad']);?>
                        </td>
                        <td><?php echo htmlspecialchars($item['sabores']); ?></td>
                        <td><?php echo htmlspecialchars($item['estado']); ?></td>
                        <td><?php echo htmlspecialchars($item['evento']); ?></td>
                        <td class="botones">
                            <form method="post" action="" class="form">
                                <input type="hidden" name="id" value='<?php echo $item['codigo']; ?>' />
                                <button type="submit" class="button">Modify</button>
                            </form>
                            <form method="post" action="" class="form">
                                <input type="hidden" name="id" value='<?php echo $item['codigo']; ?>' />
                                <button type="submit" class="button">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>