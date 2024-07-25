<?php

/* @autor Ion Cucer */

class Conexion {
    // Atributos de la clase
    private $host = 'localhost';
    private $db = 'categoria_producto';
    private $user = 'root';
    private $password = '';

    // Instancia de la conexión
    private static $instance = null;
    private $connection;

    // Constructor privado para evitar la creación de instancias
    private function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);

        // Verificar si hay errores en la conexión
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Método para obtener la instancia de la conexión
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Conexion();
        }
        return self::$instance;
    }

    // Método para obtener la conexión
    public function getConnection() {
        return $this->connection;
    }

    // Clonar y deserializar están deshabilitados
    private function __clone() {}
    public function __wakeup() {}
}
?>