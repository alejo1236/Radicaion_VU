<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU INICIAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleindex.css">

</head>

<body>

    <div class="image-container">
        <img src="imagenes/LOGOGRANDE.jpg" alt="Descripción de la imagen">
    <div class="container">
        <h1>Seleccione el tipo de radicacion que desea comenzar</h1>
        <button class="btn btn-success" onclick="redireccionar1('Entrada_radicado.html')">ENTRADA</button>
        <button class="btn btn-warning" onclick="redireccionar2('SALIDA ')">SALIDA</button> <!--COLOCAR EL HTML DE SALIDA_RADICADO.HTML-->
        <button class="btn btn-info" onclick="redireccionar3('INTERNO')">INTERNO</button><!--COLOCAR EL HTML DE INTERNO_RADICADO.HTML-->
        <button class="btn btn-secondary" onclick="redireccionar4('CONSULTA')">CONSULTA </button><!--COLOCAR EL HTML DE CONSULTA_RADICADO.HTML-->
    </div>

    <script>

        // Función para redireccionar a la página correspondiente
        function redireccionar1(pagina) {
            alert("Empezaras un radicado de ENTRADA, pulsa aceptar para continuar");
            window.location.href = pagina;
        }

        function redireccionar2(pagina) {
            window.location.href = pagina;
            alert("Has seleccionado: SALIDA");
        }

        function redireccionar3(pagina) {
            window.location.href = pagina;
            alert("Has seleccionado: INTERNO");
        }

        function redireccionar4(pagina) {
            window.location.href = pagina;
            alert("Has seleccionado: CONSULTA");
        }
       
    </script>
</body>
</html>

        <!--
        <input type="button" class="btn btn-success" value="Guardar" id="btnGuardar">
        <input type="button" class="btn btn-dark" value="Modificar" id="btnModificar">
        <input type="button" class="btn btn-danger" value="Eliminar" id="btnEliminar">
        -->