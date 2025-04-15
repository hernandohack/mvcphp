<?php

class Conexion {

    private $host = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $baseDatos = "php";
    private $puerto = 3306;
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli(
            $this->host,
            $this->usuario,
            $this->clave,
            $this->baseDatos,
            $this->puerto
        );

        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}