<?php

/* @autor Ion Cucer */

require_once '../class/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        $nombre_categoria = $_POST['nombre_categoria'];
        $id_categoria = $_POST['categoriaID'] ?? null;

        switch ($accion) {
            case 'insertar':
                $categoria = new Categoria($nombre_categoria);
                $categoria->insertar($nombre_categoria);
                break;
            case 'modificar':
                if ($id_categoria) {
                    $categoria = new Categoria($nombre_categoria, $id_categoria);
                    $categoria->modificar();
                }
                break;
            case 'eliminar':
                if ($id_categoria) {
                    Categoria::eliminar($id_categoria);
                }
                break;
        }
    }
}
?>