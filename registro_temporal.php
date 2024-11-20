<?php
// Incluir archivo de conexión
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $placa = $_POST['placa'];
    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];

    // Preparar la consulta para evitar inyecciones SQL (uso de sentencias preparadas)
    $stmt = $conn->prepare("INSERT INTO registro_temporal (placa, nombre, cedula, correo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $placa, $nombre, $cedula, $correo);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        header("Location: registro_exitoso.html"); // Redirigir a una página de éxito
        exit(); // Terminar la ejecución después de la redirección
    } else {
        echo "Error al registrar: " . $stmt->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();
}
?>
