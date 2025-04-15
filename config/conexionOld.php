<?php


$mysqli = new mysqli("localhost", "root", "", "php", 3306);


if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}
return $mysqli;

?>