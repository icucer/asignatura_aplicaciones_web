<?php

/* @autor Ion Cucer */

require_once '../class/autoload.php';

$categoria = new Categoria("");
$categorias = $categoria->seleccionarTodo();

include 'views/lista_categorias.html';
?>