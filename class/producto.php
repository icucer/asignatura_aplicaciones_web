<?php

/* @autor Ion Cucer */

// Incluye la clase de conexión a la base de datos
require_once 'conexion.php';

class Producto {
    // Declaración de variables privadas
    private $id;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $precio;
    private $id_categoria;

    // Constructor de la clase
    public function __construct(
        $nombre = "",
        $imagen = "",
        $descripcion = "",
        $precio = 0.0,
        $id_categoria = 0) {
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->id_categoria = $id_categoria;
    }

    // Métodos getter y setter para acceder y modificar las variables privadas
    public function getproductoID() {
        return $this->id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCategoria() {
        return $this->id_categoria;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getImagen() {
        return $this->imagen;
    }

    // Método para agregar un producto a la base de datos
    public function agregarProducto() {
        // Obtener conexión a la base de datos
        $conexion = Conexion::getInstance()->getConnection();
        // Preparar la consulta SQL
        $stmt = $conexion->prepare(
            "INSERT INTO `productos`(`nombre_producto`, `imagenProducto`, `descripcion_producto`, `precio_producto`, `categoriaID`)
            VALUES (?, ?, ?, ?, ?)"
        );
    
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }
        
        // Vincular parámetros a la consulta
        $stmt->bind_param("sssdi", $this->nombre, $this->imagen, $this->descripcion, $this->precio, $this->id_categoria);
        $result = $stmt->execute();  // Ejecutar la consulta
    
        // Mostrar mensaje de éxito o error
        if ($result) {
            echo "<script>
                    alert('Producto agregado exitosamente.');
                    window.location.href = '../index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error al agregar el producto: ' . $stmt->error);
                    window.location.href = '../index.php';
                </script>";
        }

        return $result;  // Devolver el resultado de la ejecución
    }

    // Método para seleccionar un producto específico de la base de datos
    public function seleccionarProducto($productoID) {
        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare("SELECT * FROM productos WHERE productoID = ?");
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        $stmt->bind_param("i", $productoID);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();

        return $producto;
    }

    // Método para modificar un producto existente en la base de datos
    public function modificarProducto($productoID) {
        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare(
            "UPDATE productos SET nombre_producto = ?, imagenProducto = ?, descripcion_producto = ?, precio_producto = ?, categoriaID = ? 
            WHERE productoID = ?"
        );

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        $stmt->bind_param("sssdi", $this->nombre, $this->imagen, $this->descripcion, $this->precio, $this->id_categoria, $productoID);
        $result = $stmt->execute();

        if ($result) {
            echo "Producto modificado exitosamente.";
        } else {
            echo "Error al modificar el producto: " . $stmt->error;
        }

        return $result;
    }

    // Método para eliminar un producto de la base de datos
    public function eliminarProducto($productoID) {
        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare("DELETE FROM productos WHERE productoID = ?");
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        $stmt->bind_param("i", $productoID);
        $result = $stmt->execute();

        if ($result) {
            echo "Producto eliminado exitosamente.";
        } else {
            echo "Error al eliminar el producto: " . $stmt->error;
        }

        return $result;
    }

    // Método para seleccionar todos los productos de la base de datos
    public function seleccionarProductos() {
        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare(
            "SELECT productos.*, categorias.nombre_categoria 
            FROM productos 
            LEFT JOIN categorias ON productos.categoriaID = categorias.categoriaID"
        );

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $productos = $result->fetch_all(MYSQLI_ASSOC);

        return $productos;
    }
}
?>