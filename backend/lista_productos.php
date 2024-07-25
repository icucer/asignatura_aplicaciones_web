<?php

/* @autor Ion Cucer */

require_once '../class/autoload.php';

$producto = new Producto("");
$productos = $producto->seleccionarProductos();

include 'views/lista_productos.html';
?>