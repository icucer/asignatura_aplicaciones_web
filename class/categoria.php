<?php

/* @autor Ion Cucer */

require_once 'conexion.php';

class Categoria {
    private $id;
    private $nombre;

    public function __construct($nombre) {
        $this->nombre=$nombre;
    }

    public function getCategoriaID() {
        return $this->id;
    }

    public function getNombreCategoria() {
        return $this->nombre;
    }

    // Método para insertar una nueva categoría
    public function insertar() {
        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare("INSERT INTO `categorias`(`nombre_categoria`) VALUES (?)");
        $stmt->bind_param("s", $this->nombre);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Categoría insertada exitosamente.');
                    window.location.href = '../index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Error al insertar la categoría: ' . $stmt->error);
                    window.location.href = '../index.php';
                </script>";
        }
    }

    // Método para modificar una categoría existente
    public function modificar() {
        if ($this->id == null) {
            echo "ID de categoría no especificado.";
            return;
        }

        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare("UPDATE categorias SET nombre = ? WHERE id = ?");
        $stmt->bind_param("si", $this->nombre, $this->id);

        if ($stmt->execute()) {
            echo "Categoría modificada exitosamente.";
        } else {
            echo "Error al modificar la categoría: " . $stmt->error;
        }
    }

    // Método para seleccionar una categoría por ID
    public static function seleccionar($id) {
        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare("SELECT * FROM categorias WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Método para eliminar una categoría por ID
    public static function eliminar($id) {
        $conexion = Conexion::getInstance()->getConnection();
        $stmt = $conexion->prepare("DELETE FROM categorias WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Categoría eliminada exitosamente.";
        } else {
            echo "Error al eliminar la categoría: " . $stmt->error;
        }
    }

    // Método para seleccionar todas las categorías
    public static function seleccionarTodo() {
        $conexion = Conexion::getInstance()->getConnection();
        $result = $conexion->query("SELECT * FROM categorias");

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>