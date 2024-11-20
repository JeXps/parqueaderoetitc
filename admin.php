<?php
// Incluir archivo de conexión
include 'conexion.php';

// Iniciar sesión PHP
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos para validar las credenciales
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Credenciales correctas, redirigir al dashboard
        $_SESSION['admin'] = $correo; // Guardar sesión
        header("Location: dashboard.html");
        exit();
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        $error = "Correo o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Administrador</title>
    <style>
        /* Estilos similares al código original */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('fondo.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #2e7d32;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #2e7d32;
        }
        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #2e7d32;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #2e7d32;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1b5e20;
        }
        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Iniciar Sesión</h1>
        <form method="POST" action="login.php">
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>

            <button type="submit">Iniciar Sesión</button>
        </form>

        <!-- Mostrar error si las credenciales son incorrectas -->
        <?php if (isset($error)): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>

        <a href="automatizacion.html" class="button back-button">Volver al Inicio</a>
    </div>

</body>
</html>
