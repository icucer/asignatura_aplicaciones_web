<?php

/* @autor Ion Cucer */

// Autoload de clases
$classMap = [
    'Conexion' => __DIR__ . '/conexion.php',
    'Categoria' => __DIR__ . '/categoria.php',
    'Producto' => __DIR__ . '/producto.php',
    'FileUploader' => __DIR__ . '/fileUploader.php',
];

spl_autoload_register(function ($class) use ($classMap) {
    if (isset($classMap[$class])) {
        require_once $classMap[$class];
    }
});
?>