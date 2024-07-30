<?php

session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'admin';
    echo "SESION INICIADA CORRECTAMENTE";
    header("Location: login.php");
}
else if (isset($_SESSION['username'])) {
    $_SESSION['username'] = 'VENTANILLA UNICA';
    //header("Location: index.php");
}

?>

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
        
        .banner {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            text-align: right;
            padding: 15px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .banner span {
            margin-right: 30px;
        }
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

        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>

<div class="banner">
        <span>Bienvenido, <?php echo "Has iniciado Sesion como: ".$_SESSION['username']; ?></span>
        <a href="login.php" id="CerrarSesion">//   - Cerrar Sesion</a>
    </div>
    
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

        <div class="text-center mt-3">
        <button id="volverindex" class="btn btn-danger" onclick="redireccionar5('index.php')">Volver al menu inicial</button>
        </div> 

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
$query = "SELECT * FROM $tiporadicado"; 

// Ejecutar la consulta
$result = pg_query($conn, $query);

if (!$result) {
    die("Error en la consulta: " . pg_last_error());
}

switch ($tiporadicado) {
    case 'entrada': // caso de seleccion entrada
    // Generar la tabla HTML
    echo "<table border='1'>
    <tr>
        <th>Numero Radicado</th>
        <th>Asunto</th>
        <th>Nombre del remitente</th>
        <th>Empresa del remitente Radicado</th>
        <th>correo</th>  
        <th>Nombre del funcionario</th>
        <th>Area del funcionario</th>
        <th>Canal de recepcion</th>       
        <th>Comentarios</th>        
    </tr>";

    // Obtener los datos y mostrarlos en la tabla
    while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['radicadofinal']}</td>
        <td>{$row['asunto']}</td> 
        <td>{$row['nombreremitente']}</td>
        <td>{$row['empresaremitente']}</td>
        <td>{$row['correo']}</td>   
        <td>{$row['nombrefuncionario']}</td>
        <td>{$row['areafuncionario']}</td>
        <td>{$row['canalrepcion']}</td> 
        <td>{$row['comentarios']}</td>             
    </tr>";
    }
        break;

    case 'salida': // caso de seleccion Salida
    echo "<table border='1'>
    <tr>
        <th>Numero Radicado</th>
        <th>Asunto</th>
        <th>Tipo docuemntal</th>
        <th>Nombre del Funcionario</th>
        <th>Area de funcionario</th>
        <th>Nombre de destinatario</th>  
        <th>Empresa destinataria</th>
        <th>cargo Destinatario</th>
        <th>Documento destinatario</th>
        <th>Canal de envio</th>       
        <th>Comentarios</th>        
    </tr>";

    // Obtener los datos y mostrarlos en la tabla
    while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['radicadofinal']}</td>
        <td>{$row['asunto']}</td> 
        <td>{$row['documentodestinatario']}</td> 
        <td>{$row['nombrefuncionario']}</td>
        <td>{$row['areafuncionario']}</td>
        <td>{$row['nombredestinatario']}</td>   
        <td>{$row['empresadestinatario']}</td>
        <td>{$row['cargodestinatario']}</td>
        <td>{$row['documentodestinatario']}</td> 
        <td>{$row['canalenvio']}</td> 
        <td>{$row['comentarios']}</td>             
    </tr>";
    }break;

    case 'interno':// caso de seleccion interno
    echo "<table border='1'>
    <tr>
        <th>Numero Radicado</th>
        <th>Asunto</th>
        <th>Nombre del funcionario remitente</th>
        <th>Area del funcionario remitente</th>
        <th>Nombre del funcionario destino</th>  
        <th>Area del funcionario destino</th>
        <th>Tipo documental</th>
        <th>Canal de envio</th>       
        <th>Comentarios</th>        
    </tr>";

    // Obtener los datos y mostrarlos en la tabla
    while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['radicadofinal']}</td>
        <td>{$row['asunto']}</td> 
        <td>{$row['nombrefuncionarioremitente']}</td>
        <td>{$row['areafuncionariorem']}</td>
        <td>{$row['nombrefuncionariodestino']}</td>   
        <td>{$row['areafuncionariodestino']}</td>
        <td>{$row['tipodocumental']}</td>
        <td>{$row['canalenvio']}</td> 
        <td>{$row['comentarios']}</td>             
    </tr>";
    }break;
}

echo "</table>";
pg_free_result($result);
pg_close($conn);
?>

        <div class="text-center mt-3">
        <button id="volverindex" class="btn btn-danger" onclick="redireccionar5('index.php')">Volver al menu inicial</button>
        </div> 

        <script>
        function redireccionar5(pagina) {
                        window.location.href = pagina;
                        alert("Has seleccionado: Volver al menu inicial , pulsa aceptar para continuar");
                    }
        </script> 

</body>
</html>