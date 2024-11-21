<?php
$host = "localhost";  // Cambia esto si usas un host diferente
$usuario = "root";    // Tu usuario de MySQL
$password = "";       // Tu contraseña de MySQL
$base_de_datos = "parqueadero";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $password, $base_de_datos);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>