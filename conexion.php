<?php
$host = "basededatosparqueadero.mysql.database.azure.com";
$db = "parqueadero";
$user = "JeXps@parqueadero";
$pass = "admin1234*";

// Conectar a la base de datos
$conn = mysqli_connect($host, $user, $pass, $db);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
echo "Conexión exitosa a la base de datos";
?>
