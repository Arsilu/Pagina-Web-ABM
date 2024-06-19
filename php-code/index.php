<?php
if (isset($_GET["pagina"]))
    $pagina = $_GET["pagina"];
else
	 $pagina = "principal.php";
?>
<!DOCTYPE html>"
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
   <?php 
      include("menu.php"); 
      echo "<hr>";
      if (file_exists($pagina))
          include($pagina);
      else
          echo "Archivo inexistente";     
    ?>
</body>
</html>
