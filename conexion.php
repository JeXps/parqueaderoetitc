<?php
$host = "basededatosparqueadero.mysql.database.azure.com";  // Cambia esto si usas un host diferente
$usuario = "JeXps";    // Tu usuario de MySQL
$password = "admin1234*";       // Tu contraseña de MySQL
$base_de_datos = "parqueadero";  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $password, $base_de_datos);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>