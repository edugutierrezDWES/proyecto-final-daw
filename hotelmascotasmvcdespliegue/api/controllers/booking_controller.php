<?php
//Rodrigo Cano
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
function limpiarCampo($campoformulario)
{
    $campoformulario = trim($campoformulario); //elimina espacios en blanco por izquierda/derecha
    $campoformulario = stripslashes($campoformulario); //elimina la barra de escape "\", utilizada para escapar caracteres
    $campoformulario = htmlspecialchars($campoformulario);
    return $campoformulario;
}

if (isset($_SESSION) && !empty($_SESSION)) {

    $id = $_SESSION["id_usuario"];
    $nombre = $_SESSION["nombre"];
    $apellidos = $_SESSION["apellidos"];
    $email = $_SESSION["email"];
    $fecha_alta = $_SESSION["fecha_alta"];
    $rol_usuario = $_SESSION["rol"];
    /* require_once("views/home/home_header_view.php"); */
    require_once("models/bookingRoom_model.php");
    require_once("models/pets_model.php");
    require_once("views/home/home_header_view.php");
    require_once("models/booking_info_model.php");
    //Poner errores aqui
    $error_Mensaje = "";
    $todo_Correcto = "";
    try {

        $arrayMascotas = getAllPets($id);
        if (count($arrayMascotas) == 0)
            throw new Exception("No se han encontrado mascotas");

        $arrayTipoHabitaciones = getAllTipoHabitaciones();
        if (count($arrayTipoHabitaciones) == 0)
            throw new Exception("No se han encontrado los tipos de habitaciones");

        $arrayTipoServicios=getAllTipoServicio();
         if (count($arrayTipoServicios)==0) 
            throw new Exception("No se han encontrado los tipos de servicio");
        
             

        if ($_SERVER["REQUEST_METHOD"] == "POST") { //Se obtiene los datos
            if (isset($_POST['reserva']) && isset($_GET['NewRS'])) {
                console_log($_POST);
                console_log($_GET['NewRS']);

                $tipoReserva = limpiarCampo($_POST["tipoReserva"]);

                if ($_POST["datoEntrada"] == "" || $_POST["datoSalida"] == "")
                    throw new Exception("No se ha introducido fechas");
                if (!isset($_POST['mascotas']))
                    throw new Exception("No se ha seleccionado ninguna mascota");

                $datoEntrada = str_replace("/", "-", $_POST["datoEntrada"]);

                $datoSalida = str_replace("/", "-", $_POST["datoSalida"]);

                $tipoHabitacion = limpiarCampo($_POST["tipoHabitacion"]);


                $mascotas = $_POST["mascotas"];

                $hoy = date("Y-m-d"); //Crear en reserva fecha de reserva -------------------------------------------
                //Crear precio en reserva -------------------------------------------

                //Convierte las fechas a formato Y-m-d H:i:s
                $dateEntrada = date("Y-m-d", strtotime($datoEntrada));
                $dateSalida = date("Y-m-d", strtotime($datoSalida));

                    if ($hoy < $dateEntrada && $dateEntrada < $dateSalida) {
                        $dteStart = new DateTime($dateEntrada);
                        $dteEnd   = new DateTime($dateSalida);

                        $diferecia  = $dteStart->diff($dteEnd);

                        $diasDireferencia = $diferecia->days; //Esto da la diferencias entre dos fechas en dias


                        $precio_noche_habitacion = 0;

                        foreach ($arrayTipoHabitaciones as $Fila => $arrayTipo) {
                            $tipo_Hab= $arrayTipo['tipo_Hab'];
                            if ($tipo_Hab == $tipoHabitacion)
                            $precio_noche_habitacion=$arrayTipo['precio_noche'];
                        }
                        $precio_noche_servicio=0;
                        foreach ($arrayTipoServicios as $Fila => $arrayTipo) {
                            $tipo_reserva= $arrayTipo['tipo'];
                            if($tipo_reserva == $tipoReserva)
                                $precio_noche_servicio=$arrayTipo['precio_noche'];
                        }
                        if($precio_noche_habitacion==0 || $precio_noche_servicio==0)
                            throw new Exception("El tipo de habitacion o de servicio es incorrecta");
    
                        $Precio_Total= $diasDireferencia * ($precio_noche_habitacion + $precio_noche_servicio);

                        $hoy = date("Y-m-d H:i:s");
                        $correcto = controlador_reservaHabitacionMascotas($datoEntrada, $datoSalida, $id, $tipoReserva, $mascotas, $dateEntrada, $dateSalida, $hoy, $tipoHabitacion, $Precio_Total);
                        $todo_Correcto = "La reserva se ha creado correctamente";
                    } else throw new Exception("Las fecha de entrada tiene que ser anterior a la fecha de salida y posterior a hoy");
                
            }
           }  
         } catch (\Throwable $th) {
            $error_Mensaje = "Error: " . $th->getMessage();
    
        }


        if (isset($_GET['RS'])){
            /* require_once("models/booking_info_model.php"); */
            $id_reserva=$_GET['RS'];
            if($rol_usuario=="admin"){
                $arrayReserva=ReservaInfo($id_reserva);
                if(count($arrayReserva)==0)
                    throw new Exception("La Reserva no existe");
            }
            else if($rol_usuario=="cliente"){
                $arrayReserva = ReservaInfoCliente($id, $id_reserva);
                //else no tiene permisos
            }
            if(count($arrayReserva)!=0){
                $arrayMascotasReserva = getAllMascotaReserva($id_reserva);
            }

            require_once("views/booking/booking_info_view.php");
            
        } else if (isset($_GET['RSupdate']) && isset($_GET['newStatus'])){
            $id_reserva=$_GET['RSupdate'];
            $NewEstado = $_GET['newStatus'];
            console_log($id_reserva);
            console_log($NewEstado);
            $arrayReserva=ReservaInfo($id_reserva);
            if(count($arrayReserva)!=0){
                
                $OldEstado=$arrayReserva[0]['estado_reserva'];
                
                $posiblesCambios = [
                    "en espera" => ["cancelado","abandonado", "en progreso"],
                    "en progreso" => ["finalizado","abandonado"],
                ];
                $cambiosPermisos = [
                    //No se puede cambiar el estado a 'en espera'
                    //"en espera" => ['admin'],
                    "en progreso" => ["admin"],
                    "finalizado" => ["admin"],
                    "abandonado" => ["admin"],
                    "cancelado" => ["admin","cliente"]
                ];
                $hoy = date("Y-m-d");
                $fecha_Fin=date($arrayReserva[0]['fecha_final']);
                if(array_key_exists($OldEstado, $posiblesCambios) && in_array($NewEstado,$posiblesCambios[$OldEstado]) && in_array($rol_usuario,$cambiosPermisos[$NewEstado]) && !($NewEstado == "finalizado" && $hoy < $fecha_Fin)){
    
                    if($rol_usuario=="admin"){
                        $correcto = Update_EstadoReserva_Admin($id_reserva, $NewEstado);
                    }
                    else if($rol_usuario=="cliente"){
                        $correcto = Update_EstadoReserva_Cliente($id_reserva, $id, $NewEstado);
                    }
                    console_log($correcto);
                     if($correcto){
                       navigateTo("/reserva/info/$id_reserva");
                    }    
                }
            } 
         
        } else {
            require_once("views/booking/bookingRoom_view.php");
        }

        require_once("views/home/home_footer_view.php");
  
    
} else navigateTo("/login");

?>
