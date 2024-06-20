<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Radicados</title>
    <head>
    <meta charset="UTF-8">
    <title>RADICADO</title>
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="js\funciones.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleEntrada.css">
    <script src="js/bootstrap.js"></script>
    </head>
    <style>
        .center-text {
            text-align: center;
        }
        .center-button {
            display: flex;
            justify-content: center;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-control {
            width: 200px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2 class="center-text">Seleccione el tipo de radicado que desea consultar:</h2>
    
        <form method="POST" action="">
            <select class="form-control" name="tiporadicado" required>
                <option value="entrada">Radicado de ENTRADA</option>
                <option value="salida">Radicado de SALIDA</option>
                <option value="interno">Radicado INTERNO</option>
            </select>
            <div class="center-button">
                <input type="submit" class="btn btn-success" value="Consultar">
            </div>
        </form>
    

<?php
error_reporting(0);
// Configuración de la conexión a la base de datos
$host = 'localhost';
$db = 'radicados';
$user = 'postgres';
$pass = 'admin123';
$port = '5433';

// Crear la conexión a la base de datos
$conn = pg_connect("host=$host dbname=$db user=$user password=$pass port=$port");

if (!$conn) {
    die("Error en la conexión: " . pg_last_error());
}

$tiporadicado = $_POST['tiporadicado'];
// Definir la consulta SQL
$query = "SELECT * FROM $tiporadicado"; // Reemplaza 'nombre_de_la_tabla' por el nombre de tu tabla

// Ejecutar la consulta
$result = pg_query($conn, $query);

if (!$result) {
    die("Error en la consulta: " . pg_last_error());
}

// Generar la tabla HTML
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Numero Radicado</th>
            <th>Asunto</th>            
        </tr>";

// Obtener los datos y mostrarlos en la tabla
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['radicadofinal']}</td>
            <td>{$row['asunto']}</td>            
          </tr>";
}

echo "</table>";

// Liberar el resultado
pg_free_result($result);

// Cerrar la conexión
pg_close($conn);
?>

</body>
</html>