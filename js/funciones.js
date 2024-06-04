                    
                    
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
                        alert("Has seleccionado: Volver al menu inicial , pulsa aceptar para continuar");
                    }
                   
            

                    function asignarfecha(){
                        var fechaActual = new Date();
                        var opcionesFecha = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                        var fechaFormateada = fechaActual.toLocaleDateString('es-ES', opcionesFecha);
                        var fechafinal = document.getElementById('fecha').textContent = fechaFormateada;
                        }

                        var numeroConsecutivo = 1; // Inicializamos el número consecutivo
                        function guardarRadicado() {
                        var numeroRadicado = generarNumeroRadicado(numeroConsecutivo);
                        document.getElementById('radicado').textContent = numeroRadicado;
                        numeroConsecutivo++; // Incrementamos el número consecutivo
                        }
                        //FUNCION PARA GENERAR EL NUMERO DE RADICADO
                        // Generar el número de radicado
                        var numeroRadicado = generarNumeroRadicado();
                        document.getElementById('radicado').textContent = numeroRadicado;
        
                        function generarNumeroRadicado(numeroConsecutivo) {
                        // Obtener la fecha actual
                        var fecha = new Date();
                        // Formatear la fecha como ddmmaaaa
                        var dia = agregarCeros(fecha.getDate());
                        var mes = agregarCeros(fecha.getMonth() + 1);
                        var año = fecha.getFullYear().toString().slice(-2);
                        // Construir el número de radicado con el formato Eddmmaaaa-xxxx
                        var numeroRadicado = 'E' + dia + mes + año + '-' + numeroConsecutivo;
                        return numeroRadicado;
                        }
        
                        function agregarCeros(numero) {
                            return numero < 10 ? '0' + numero : numero;
                        }
                    

                    //FUNCION PARA VALIDAR LOS CAMPOS DEL FORMULARIO 
                    function validarCampos() {
                       /* // Obtener valores de los campos del formulario
                        var nombreRemitente = document.getElementById('txtNombreRemitente').value;
                        var empresaRemitente = document.getElementById('txtEmpresaRemitente').value;
                        var cargoRemitente = document.getElementById('txtCargoRemitente').value;
                        var dirRespuesta = document.getElementById('txtDirRespuesta').value;
                        var documento = document.getElementById('txtDocumento').value;
                        var correo = document.getElementById('txtCorreo').value;
                        var nombreFuncionario = document.getElementById('txtNombreFuncionario').value;
                        var areaFuncionario = document.getElementsByName('AreaFuncionario')[0].value;
                        var canalRecepcion = document.getElementsByName('CanalRepcion')[0].value;
                        var tipoDocumental = document.getElementsByName('TipoDocumental')[0].value;
                        var numFolios = document.getElementById('txtNumFolios').value;
                        var serie = document.getElementById('txtSerie').value;
                        var subserie = document.getElementById('txtSubserie').value;
                        var asunto = document.getElementById('Asunto').value;

                        // Verificar si todos los campos están completos
                        if (nombreRemitente && empresaRemitente && cargoRemitente && dirRespuesta && documento && correo &&
                            nombreFuncionario && areaFuncionario && canalRecepcion && tipoDocumental && numFolios && serie && subserie && asunto) {
                            // Todos los campos están completos
                            ImprimirSello(numeroRadicado,numeroConsecutivo); 
                            return true; // Se envía el formulario
                        } else {
                            // Al menos un campo está vacío
                            alert("Por favor, completa todos los campos requeridos .");
                            return false; // No se envía el formulario
                        }*/
                        }

                   /* function ImprimirSello(numeroRadicado,numeroConsecutivo){
                    alert('SU NUMERO DE RADICADO ES ' + numeroRadicado + numeroConsecutivo + ' REVISE QUE SE ENCUENTRE BIEN DILIGENCIADO EL RADICADO Y ACEPTE PARA CONTINUAR CON LA IMPRESION DEL SELLO')
                    }   */                    