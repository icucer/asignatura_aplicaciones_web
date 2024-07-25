<?php

/* @autor Ion Cucer */

// Ensure the autoload file is included to load the necessary classes
require_once 'class/autoload.php';

// Get the database connection instance
$conexion = Conexion::getInstance()->getConnection();

// Include the home view
include 'views/home.html';
?>