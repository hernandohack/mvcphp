<?php

//MODELO

require_once("../config/conexion.php");

class Producto{

    private $id;
    private $nombre;
    private $precio;
    private $stock;

    function __construct($nombre, $precio, $stock){
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function setPrecio($p) {
        if($p > 0){
            $this->precio = $p;
            return true;
        }else{
            return false;
        }        
    }

    function setNombre($n){
        //   <>.+}
        $this->nombre = $n;
    }

    function setStock($s) {
        if($s > 0){
            $this->stock = $s;
            return true;
        }else{
            return false;
        }  
    }

    function guardar() {
        
        $db = new Conexion();
        $conn = $db->getConexion();

        $consulta = $conn->prepare("INSERT INTO productos (nombre, precio, stock) values(?, ?, ?)");
        $consulta->bind_param('sdi',$this->nombre, $this->precio, $this->stock);

        if($consulta->execute()){
            $consulta->close();
            $conn->close();

            header('Location: ../views/listarProductos.php');
            exit;

        }else{
            echo("Error:". $consulta->error);
        }
        
        $consulta->close();
        $conn->close();
    }

    public static function obtenerPorId($id) {

        $db = new Conexion();
        $conn = $db->getConexion();

        $consulta = $conn->prepare("SELECT * FROM productos WHERE id = ?");
        $consulta->bind_param('i',$id);

        $consulta->execute();

        $resutado = $consulta->get_result();
        $producto = $resutado ->fetch_assoc();

        $consulta->close();
        $conn->close();

        return $producto;
        
    }

    public function actualizar($id) {

        $db = new Conexion();
        $conn = $db->getConexion();

        $consulta = $conn->prepare("UPDATE productos SET nombre = ? , precio = ?, stock = ? WHERE id = ?");
        $consulta->bind_param('sdii',$this->nombre, $this->precio, $this->stock, $id);

        if($consulta->execute()){
           $consulta->close();
        $conn->close();
            header('Location: ../views/listarProductos.php');
            exit;

        }else{
            echo("Error:". $consulta->error);
        }
        

    }
}


?>
