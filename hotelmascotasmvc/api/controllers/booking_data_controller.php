<?php
//Rodrigo Cano
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
require_once("models/booking_data_model.php");
$rol_usuario="cliente";
//Poner errores aqui
$error_Mensaje = "";
$arrayReservasHistorial=[];//Tabla de las reservas
try { 
    if($rol_usuario=="admin")
        $arrayReservasHistorial=getAllReservasHistorial();
    else if($rol_usuario=="cliente")
        $arrayReservasHistorial=getAllReservasHistorialCliente($email);
        require_once("views/booking/booking_data_view.php");
} catch (\Throwable $th) {
    $error_Mensaje = "Error: " . $th->getMessage();
}


?>