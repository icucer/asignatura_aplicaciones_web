<?php

/* @autor Ion Cucer */

require_once '../class/autoload.php';
require_once '../class/FileUploader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        $productoID = $_POST['productoID'] ?? null;
        $nombre_producto = $_POST['nombre_producto'];
        $descripcion_producto = $_POST['descripcion_producto'];
        $precio_producto = $_POST['precio_producto'];
        $id_categoria = $_POST['categoriaID'];
        
        // Inicializa la variable de imagen como null
        $imagenProducto = null;

        // Verifica si se ha enviado un archivo y si no hay errores
        if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']['error'] === UPLOAD_ERR_OK) {
            $fileUploader = new FileUploader();
            $imagenProducto = $fileUploader->upload($_FILES['imagenProducto']);
            
            if (strpos($imagenProducto, "Lo siento") === false) {
                // La imagen se cargó exitosamente
                // La variable $imagenProducto contiene el nombre del archivo
            } else {
                echo $imagenProducto;
                exit;
            }
        }
        
        // En función de la acción, crea un nuevo objeto Producto y ejecuta el método correspondiente
        switch ($accion) {
            case 'insertar':
                $producto = new Producto($nombre_producto, $imagenProducto, $descripcion_producto, $precio_producto, $id_categoria);
                $producto->agregarProducto();
                break;
            case 'modificar':
                if ($productoID) {
                    $producto = new Producto($nombre_producto, $imagenProducto, $descripcion_producto, $precio_producto, $id_categoria);
                    $producto->modificarProducto($productoID);
                }
                break;
            case 'eliminar':
                if ($productoID) {
                    $producto = new Producto();
                    $producto->eliminarProducto($productoID);
                }
                break;
        }
    }
}
?>