<?php

require_once("../models/producto.php");

class productoController{

    public function crear(){
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            $producto = new Producto($nombre, $precio, $stock);
            $producto->guardar();
        }
    }

    function actualizar($id){

        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            $producto = new Producto($nombre, $precio, $stock);
            $producto->actualizar($id);
        }
        
    }

}

$controlador = new productoController();
if (isset($_POST["crear"])){
    $controlador->crear();
}

if (isset($_POST["editar"])){
    $id = $_POST["id"];
    $controlador->actualizar($id);
}

?>