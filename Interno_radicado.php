<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RADICADO</title>
    <script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="js\funciones.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styleEntrada.css">
    <script src="js/bootstrap.js"></script>
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
    </style>
</head>


<?php 

session_start();

if (!isset($_SESSION['username'])) { // valida la contraseña si el valor no devuelve nulo
    $_SESSION['username'] = 'admin'; // valida nombre del usuario
    echo "SESION INICIADA CORRECTAMENTE";
    header("Location: login.php");
}
else if (isset($_SESSION['username'])) { 
    $_SESSION['username'] = 'VENTANILLA UNICA';
    //header("Location: index.php");
}


// conexion  a la base de datos
$host = 'localhost';
$bd = 'radicados';
$user = 'postgres';
$pass = 'admin123';
$port ='5433';

$conexion = pg_connect("host=$host port=$port dbname=$bd user=$user password=$pass");

$query2=("SELECT * FROM interno ORDER BY id DESC LIMIT 1");

$consulta = pg_query($conexion,$query2);

if($consulta){

    if(pg_num_rows($consulta)>0){

        while($obj=pg_fetch_object($consulta)){

            
            $ULTIMOID = $obj->id."<br>";
            echo $idfinal = (int)$ULTIMOID + 1 ;    // saca el numero que se plasmara en el radicado 
            echo "-----------------------------------------<br>";
        }
        
    }
}
pg_close();

?>

<body>

<div class="banner">
        <span>Bienvenido, <?php echo "Has iniciado Sesion como: ".$_SESSION['username']; ?></span>
        <a href="login.php" id="CerrarSesion">//   - Cerrar Sesion</a>
    </div>
    
<form method="POST" action="imagensellointerno.php"> 
    <!-- EN ESTE DIV SE ENCUENTRA EL ENCABEZADO DE RADICACION -->
    <div class="container text-center mt-5">
        <h2>Datos de Radicacion interno</h2>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h5>Usuario que radica</h5>
                <p> GUSTAVO LOPEZ TORRES</p> 
            </div>
            <div class="col-sm-3">
                <h5>Fecha de radicacion</h5>
                
                <p id="fecha"   ></p>
                <script>asignarfecha()</script>

            </div>
            <div class="col-sm-3" , >
                <h5>Número de radicado</h5>
                <input type="hidden" id="radicadofinal" name="radicadofinal" value="">
                <p id="radicado"></p>

                <script>
                        
                        //FUNCION PARA GENERAR EL NUMERO DE RADICADO
                        // Generar el número de radicado
                        var numeroradicadointerno = generarnumeroradicado();
                        document.getElementById('radicado').textContent = numeroradicadointerno;
                        document.getElementById('radicadofinal').value = numeroradicadointerno; // se carga el id en el radicado final
                        
                        
                        function generarnumeroradicado() {
                        var numeroConsecutivo = "<?php echo $idfinal ?>"; // Inicializamos el número consecutivo
                        function guardarRadicado() {
                        var numeroradicadointerno = generarnumeroradicado(numeroConsecutivo);
                        document.getElementById('radicado').textContent = numeroradicadointerno;
                        numeroConsecutivo++;
                        }
                        // Obtener la fecha actual
                        var fecha = new Date();
                        // Formatear la fecha como ddmmaaaa
                        var dia = agregarCeros(fecha.getDate());
                        var mes = agregarCeros(fecha.getMonth() + 1);
                        var año = fecha.getFullYear().toString().slice(-2);
                        // Construir el número de radicado con el formato Eddmmaaaa-xxxx
                        let numeroradicadointerno = 'IN' + dia + mes + año + '-' + numeroConsecutivo;
                        return numeroradicadointerno;
                        
                        }
        
                        function agregarCeros(numero) {
                            return numero < 10 ? '0' + numero : numero;
                        }

                        function imprimirinterno(numeroradicadointerno,numeroConsecutivo){
                        alert('SU NUMERO DE RADICADO ES ' + numeroradicadointerno + ' REVISE QUE SE ENCUENTRE BIEN DILIGENCIADO EL RADICADO Y ACEPTE PARA CONTINUAR CON LA IMPRESION DEL SELLO')
                        }
                        
                    </script> 

            </div>
            <div class="col-sm-3">
                <h5>Area que radica</h5>
                <p>VENTANILLA UNICA</p>
            </div>
        </div>
        <hr>  
    </div>

        
<div class="container text-center mt-5">
        <h2>Datos del remitente</h2>
        <hr>
        <div class="form-group">
            <input type="text" id="nombrefuncionarioremitente" name="nombrefuncionarioremitente" class="form-control" placeholder="Nombre del funcionario que remite" required><br>
                
            <h5>  Area del funcionario: 
            <select class="form-control"  name="areafuncionariorem"  placeholder=" Area a la que se adjudica " required>
                <option value="GERENCIA">GERENCIA</option>
                <option value="AREA FINANCIERA">AREA FINANCIERA</option>
                <option value="COMERCIAL">COMERCIAL</option>
                <option value="JURIDICA">JURIDICA</option>
                <option value="CONTROL">CONTROL</option>
                <option value="TECNICA">TECNICA</option>
                <option value="TALENTO HUMANO">TALENTO HUMANO</option>
                <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
            </select> </h5>
        </div>
    </div>

<div class="container text-center mt-5">
            <h2>Datos del Destinatario</h2>
            <hr>
            <div class="form-group">
            <input type="text" id="nombrefuncionariodestino" name="nombrefuncionariodestino" class="form-control" placeholder="Nombre del funcionario destinatario" required><br>
                
                <h5>  Area del funcionario: 
                <select class="form-control"  name="areafuncionariodestino"  placeholder=" Area a la que se adjudica " required>
                    <option value="GERENCIA">GERENCIA</option>
                    <option value="AREA FINANCIERA">AREA FINANCIERA</option>
                    <option value="COMERCIAL">COMERCIAL</option>
                    <option value="JURIDICA">JURIDICA</option>
                    <option value="CONTROL">CONTROL</option>
                    <option value="TECNICA">TECNICA</option>
                    <option value="TALENTO HUMANO">TALENTO HUMANO</option>
                    <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
                </select> </h5>
            </div>
        </div>
    
    
    <div class="container text-center mt-5">
        <h2>Datos del Comunicado</h2>
        <hr>
        <div class="form-group">
            <h5>  Cual es el canal de Envio: 
            <select class="form-control" name="canalenvio" required>
                <option value="Fisico">Fisico</option>
                <option value="Electronico">Electronico</option>
                <option value="Mensajeria">Mensajeria</option>    
            </select></h5>
            <h5>  Seleccione el tipo documental: 
            <select class="form-control" name="tipodocumental" required>
                <option value="Respuesta">Respuesta</option>
                <option value="Correspondencia">Correspondencia</option>
                <option value="Facturas">Facturas</option>
                <option value="Contratos y acuerdos">Contratos y acuerdos</option>
                <option value="Formularios">Formularios</option>
                <option value="Informes">Informes</option> 
                <option value="Documentos internos">Documentos internos</option>
                <option value="Documentos legales y regulatorios">Documentos legales y regulatorios</option>
                <option value="Documentos de recursos humanos">Documentos de recursos humanos</option>
                <option value="Solicitudes">Solicitudes</option>  
                <option value="Recibos">Recibos</option>   
                <option value="Documentos tecnicos">Documentos tecnicos</option>       
            </select></h5><br>
            <input type="number" id="numfolios" name="numfolios" class="form-control" placeholder="Numero de folios" required><br>
            <textarea id="asunto" rows="2" class="form-control" name="asunto" placeholder="Asunto del radicado" required></textarea><br>
            <textarea id="comentarios" rows="2" class="form-control" name="comentarios" placeholder="Comentarios o Anexos (CDs, USB)"></textarea>
            
        </div>
    </div>

    <div class="text-center mt-3">
        <input type="submit" class="btn btn-success" value="Guardar y continuar el proceso de radicacion" id="btnGuardarSalida" onclick="imprimirinterno(numeroradicadointerno,numeroConsecutivo)">
        <!--<input type="button" class="btn btn-danger" value="Eliminar" id="btnEliminar">   -->
        <button id="volverindex" class="btn btn-danger" onclick="redireccionar5('index.php')">Volver al menu inicial</button>
    </div>  

</form>
        <script>
        function redireccionar5(pagina) {
                        window.location.href = pagina;
                        alert("Has seleccionado: Volver al menu inicial , pulsa aceptar para continuar");
                    }
        </script> 
</body>
</html>