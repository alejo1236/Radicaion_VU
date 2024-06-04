<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU INICIAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleindex.css">
    <script type="text/javascript" src="js\funciones.js"></script>


</head>
<body>

    <div class="image-container">
        <img src="imagenes/LOGOGRANDE.jpg" alt="Descripción de la imagen">
    <div class="container">
        <h1>Seleccione el tipo de radicacion que desea comenzar</h1>
        <button class="btn btn-success" onclick="redireccionar1('Entrada_radicado.php')">ENTRADA</button>
        <button class="btn btn-warning" onclick="redireccionar2('Salida_radicado.php')">SALIDA</button> <!--COLOCAR EL HTML DE SALIDA_RADICADO.HTML-->
        <button class="btn btn-info" onclick="redireccionar3('Interno_radicado.php')">INTERNO</button><!--COLOCAR EL HTML DE INTERNO_RADICADO.HTML-->
        <button class="btn btn-secondary" onclick="redireccionar4('CONSULTA2')">CONSULTA </button><!--COLOCAR EL HTML DE CONSULTA_RADICADO.HTML-->
    </div>

</body>
</html>