<?php
require_once("../config/conexion.php");

$db = new Conexion();
$conn = $db->getConexion();

$result = $conn->query("SELECT * FROM productos");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<h1>Productos</h1>

<a href="crearProducto.php" class="btn btn-success" style="margin: 0 0 0 70px">Crear Producto</a>

<div class="container">
    <div class="row">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Stock</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <?php while($fila = $result->fetch_assoc() ){    ?>
    <tr>
      <th scope="row"><?=  $fila["id"]   ?></th>
      <td><?=  $fila['nombre']   ?></td>
      <td><?=  $fila['precio']   ?></td>
      <td><?=  $fila['stock']   ?></td>
      <td><a href="editarProducto.php?id=<?=  $fila["id"] ?>" class="btn btn-warning">Editar</a></td>
    </tr>
    <?php  } ;  ?>
  </tbody>
</table>


    </div>
</div>


    
</body>
</html>