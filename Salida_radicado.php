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
</head>
<body>

    <!-- EN ESTE DIV SE ENCUENTRA EL ENCABEZADO DE RADICACION -->
    <div class="container text-center mt-5">
        <h2>Datos de Radicacion de salida</h2>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h5>Usuario que radica</h5>
                <p> LUZ KARIME ORTEGA</p> 
            </div>
            <div class="col-sm-3">
                <h5>Fecha de radicacion</h5>
                
                <p id="fecha"   ></p>
                <script>asignarfecha()</script>

            </div>
            <div class="col-sm-3" , >
                <h5>Número de radicado</h5>
                <p id="radicado"></p>
                    <script>
                        
                        
                        //FUNCION PARA GENERAR EL NUMERO DE RADICADO
                        // Generar el número de radicado
                        var numeroRadicado = generarNumeroRadicado();
                        document.getElementById('radicado').textContent = numeroRadicado;
        
                        function generarNumeroRadicado(numeroConsecutivo) {
                        
                        var numeroConsecutivo = 1; // Inicializamos el número consecutivo
                        function guardarRadicado() {
                        var numeroRadicado = generarNumeroRadicado(numeroConsecutivo);
                        document.getElementById('radicado').textContent = numeroRadicado;
                        numeroConsecutivo++; // Incrementamos el número consecutivo
                        }
                        // Obtener la fecha actual
                        var fecha = new Date();
                        // Formatear la fecha como ddmmaaaa
                        var dia = agregarCeros(fecha.getDate());
                        var mes = agregarCeros(fecha.getMonth() + 1);
                        var año = fecha.getFullYear().toString().slice(-2);
                        // Construir el número de radicado con el formato Eddmmaaaa-xxxx
                        var numeroRadicado = 'S' + dia + mes + año + '-' + numeroConsecutivo;
                        return numeroRadicado;
                        }
        
                        function agregarCeros(numero) {
                            return numero < 10 ? '0' + numero : numero;
                        }

                        function ImprimirSello(numeroRadicado,numeroConsecutivo){
                        alert('SU NUMERO DE RADICADO ES ' + numeroRadicado + ' REVISE QUE SE ENCUENTRE BIEN DILIGENCIADO EL RADICADO Y ACEPTE PARA CONTINUAR CON LA IMPRESION DEL SELLO')
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
<form method="POST" action="imagensellosalida.php"> 
        
<div class="container text-center mt-5">
        <h2>Datos del remitente</h2>
        <hr>
        <div class="form-group">
            <input type="text" id="nombrefuncionario" name="nombrefuncionario" class="form-control" placeholder="Nombre del funcionario que remite" required><br>
                
            <h5>  Area del funcionario: 
            <select class="form-control"  name="areafuncionario"  placeholder=" Area a la que se adjudica " required>
                <option value="GERENCIA">GERENCIA</option>
                <option value="AREA FINANCIERA">AREA FINANCIERA</option>
                <option value="COMERCIAL">COMERCIAL</option>
                <option value="JURIDICA">JURIDICA</option>
                <option value="CONTROL">CONTROL</option>
                <option value="TECNICA">TECNICA</option>
                <option value="TALENTO HUMANO">TALENTO HUMANO</option>
                <option value="GESTION DOCUMENTAL">GESTION DOCUMENTAL</option>
            </select> </h5>
            <h5>Direccion de respuesta</h5>
                <p> Correo: ventanilla@infitulua.gov.co  -  Direccion: Cra 26 #24-2, Tuluá primer piso, Valle del Cauca </p> 
        </div>
    </div>

<div class="container text-center mt-5">
            <h2>Datos del Destinatario</h2>
            <hr>
            <div class="form-group">
                <input type="text-center" id="nombredestinatario" name="nombredestinatario" class="form-control" placeholder="Nombre del destinatario" required><br>
                <input type="text" id="empresadestinatario" name="empresadestinatario" class="form-control" placeholder="Empresa del destinatario" required><br>
                <input type="text" id="cargodestinatario" name="cargodestinatario" class="form-control" placeholder="Cargo del destinatario" required><br>
                <input type="number" id="documentodestinatario" name="documentodestinatario" class="form-control" placeholder="Documento NIT/CC/CE/Pasaporte/ del destinatario" required>
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
            <h5>  Seleccione el tipo documental de la salida: 
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
        <input type="submit" class="btn btn-success" value="Guardar y continuar el proceso de radicacion" id="btnGuardar" onclick="ImprimirSello(numeroRadicado,numeroConsecutivo)">
        <input type="button" class="btn btn-danger" value="Eliminar" id="btnEliminar">
    </div>            

</form>
</body>
</html>