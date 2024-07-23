<?php
// Recoger las variables enviadas por POST
error_reporting(0);
$asunto = isset($_POST['asunto']) ? htmlspecialchars($_POST['asunto']) : '';
$radicadofinal = isset($_POST['radicadofinal']) ? htmlspecialchars($_POST['radicadofinal']) : '';
$numfolios = isset($_POST['numfolios']) ? htmlspecialchars($_POST['numfolios']) : '';
$anexos = isset($_POST['comentarios']) ? htmlspecialchars($_POST['comentarios']) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
    <style>
        /* Estilo para el contenedor de la imagen y el texto */
        .container {
            width: 248px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .box {
            border: 1px solid rgb(61, 61, 61);
            height: 124px;
            width: 248px;
            max-width: 80%;
            align-items: center;
            text-align: center;
        }

        img {
            max-width: 100%; /* Ajusta el ancho máximo de la imagen */
            height: auto; /* Mantiene la proporción de la imagen */
        }

        /* Estilo para el texto */
        p {
            margin: 0; /* Elimina el margen */
            font-size: 9px; /* Tamaño de letra más pequeño */
            max-width: 100%; /* Límite de ancho del texto */
            overflow: hidden; /* Oculta el texto que sobrepasa el límite de ancho */
            text-overflow: ellipsis; /* Agrega puntos suspensivos (...) al final del texto cortado */
        }
    </style>
</head>
<body>
    <div class="box" id="downloadBox">
        <!--<div class="container">-->
            <img src="imagenes/LOGO INFITULUA.svg" alt="Imagen" width="248" height="80">
            <div>
                <p>Asunto:<span id="Asunto"></span>
                - Radicado:<span id="Radicado"></span>
                - Folios:<span id="NumFolios"></span>
                - Anexos:<span id="anexos"></span>
                - Fecha y hora actual: <span id="fechaHora"></span></p>
            </div>
        <!--</div>-->
    </div>

    <a href="#" id="downloadLink" download="SelloRadicado.jpg">Descargar Sello</a>
    
    
    <script>

        // Obtener la fecha y hora actual
        var fechaHoraActual = new Date();
        var fechaHoraFormato = fechaHoraActual.toLocaleString('es-ES');

        // Mostrar la fecha y hora actual en el elemento con id="fechaHora"
        document.getElementById("fechaHora").innerText = fechaHoraFormato;

        // Función para descargar el contenido del box como una imagen JPG
      function descargarBox() {
        var box = document.getElementById("downloadBox");

        // Utilizar html2canvas para convertir el contenido HTML en una imagen
        html2canvas(box, {onrendered: function (canvas) {
            // Convertir la imagen en formato base64
            var imgData = canvas.toDataURL("image/png");

            // Crear un enlace de descarga
            var link = document.getElementById("downloadLink");
            link.href = imgData;
          },
        });
      }

        window.onload = function() {
             // Función trae el valor del asunto
             var Asunto = "<?php echo $asunto; ?>";
            document.getElementById("Asunto").innerText = Asunto; // Asigna el valor deseado
            
            // Función trae el valor de los folios
            var NumFolios = "<?php echo $numfolios; ?>"; // Asigna el valor deseado
            document.getElementById("NumFolios").innerText = NumFolios;

            var Radicado = "<?php echo $radicadofinal; ?>"; // Asigna el valor deseado
            document.getElementById("Radicado").innerText = Radicado;

            var anexos = "<?php echo $anexos; ?>"; // Asigna el valor deseado
            document.getElementById("anexos").innerText = anexos;

            // Llamar a la función de descarga al cargar la página
            descargarBox();
        };

        function submitForm(event) {
        // Prevenir que el formulario se envíe inmediatamente
        event.preventDefault();

        // Esperar 5 segundos antes de redireccionar
        setTimeout(function() {
            // Verificar si el formulario es válido
            if (document.getElementById('enviopdf').checkValidity()) {

                alert('El Radicado se ha guardado de manera exitosa');
                //href="index.php"
                document.getElementById('enviopdf').submit();
            } else {
                alert('Por favor, cargue el documento con el sello escaneado en formato PDF para terminar');
            }
        }); 
    }

        function redireccionar5(pagina) {
                        window.location.href = pagina;
                        alert("Has seleccionado: Volver al menu inicial , pulsa aceptar para continuar");
                    }

    </script>

    <!-- FALTA DIRECCION DEL SERVIDOR PARA CARGAR DOCUMENTOS  -->
    <br></br>
    <br></br>

    <h2>Cargue el documento con el sello ESCANEADO a continuacion</h2>
    <br></br>
    <!-- ACA SE CARGAN LOS ARCHIVOS RADICADOS -->

    <div>
        <div>
            <h2>Subir documentos en PDF</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="documento" id="" class="btn btn-success">
                <input type="submit" class="btn btn-danger">
            </form>
        </div>
    </div>

    <div class="text-center mt-3">
        <button id="volverindex" class="btn btn-danger" onclick="redireccionar5('index.php')">VOLVER AL MENU INICIAL</button>
    </div> 

</body>
</html>

<?php

$tamanio = 20000;

if(isset($_FILES['documento']) && $_FILES['documento']['type'] == 'application/pdf'){

    if( $_FILES['documento']['size'] < ($tamanio * 1024) ){
        move_uploaded_file( $_FILES['documento']['tmp_name'], 'documentoscargados/internos/' . $_FILES['documento']['name']);
        echo
        '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                 El documento se ha guardado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        
        ';

    }else{
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
               Error al subir el documento peso superior al permitido !.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        
        ';
    }

}else if(isset($_FILES['documento']) && $_FILES['documento']['type'] != 'application/pdf'){
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
             Solo se admiten documentos PDF
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    
    ';
}

$host = 'localhost';
$bd = 'radicados';
$user = 'postgres';
$pass = 'admin123';
$port ='5433';

$conexion = pg_connect("host=$host port=$port dbname=$bd user=$user password=$pass");

  $query = ("INSERT INTO public.interno(nombrefuncionarioremitente, areafuncionariorem, nombrefuncionariodestino, areafuncionariodestino, canalenvio, tipodocumental, numfolios, asunto, comentarios, radicadofinal)
  
  VALUES('$_REQUEST[nombrefuncionarioremitente]', '$_REQUEST[areafuncionariorem]', '$_REQUEST[nombrefuncionariodestino]', '$_REQUEST[areafuncionariodestino]', '$_REQUEST[canalenvio]','$_REQUEST[tipodocumental]' , '$_REQUEST[numfolios]', '$_REQUEST[asunto]', '$_REQUEST[comentarios]', '$_REQUEST[radicadofinal]')");

$consulta = pg_query($conexion,$query);
pg_close();
echo 'EL RADICADO A SIDO GUARDADO DE FORMA EXITOSA';
?>
