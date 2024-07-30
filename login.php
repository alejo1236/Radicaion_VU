<?php

session_start(); // Iniciar la sesión

$host ='localhost';
$bd ='radicados';
$user ='postgres';
$pass ='admin123';
$port ='5433'; // EN VPS INFI ES 5433

$conexion = pg_connect("host=$host port=$port dbname=$bd user=$user password=$pass");

if (!$conexion) {
    die("Error: No se ha podido conectar a la base de datos");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta a la base de datos para verificar el usuario y la contraseña
    $query = "SELECT * FROM usuarios WHERE username = $1 AND password = crypt($2, password)";
    $result = pg_query_params($conexion, $query, array($username, $password));

    if (pg_num_rows($result) > 0) {
        // Inicio de sesión exitoso
        echo "Inicio de sesión exitoso";
        // Redirigir al usuario a la página principal
        header("Location: index.php");
    } else {
        // Credenciales incorrectas
        echo "Usuario o contraseña incorrectos";
    }
}

// Cerrar la conexión
pg_close($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión - Gestión Documental</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f0f0;
            }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 8px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
    <div class="login-container">
        <h2>Inicio de sesión</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>



