<?php

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}


if (isset($_SESSION) && !empty($_SESSION)) {

    $id = $_SESSION["id_usuario"];
    $nombre = $_SESSION["nombre"];
    $apellidos = $_SESSION["apellidos"];
    $email = $_SESSION["email"];
    $fecha_alta = $_SESSION["fecha_alta"];
    require("models/pets_model.php");
    require_once("views/home/home_header_view.php");

    if (isset($_GET) && isset($_GET["id_edit_mascota"])) {
        if (isset($_POST) && !empty($_POST)) {

            $id_mascota = $_GET["id_edit_mascota"];
            $nombre = $_POST["nombre"];
            $raza = $_POST["raza"];
            $descripcion = $_POST["descripcion"];
            $tipo = $_POST["tipo"];

            $newMascota = array(
                "id_mascota" => $id_mascota,
                "nombre" => $nombre,
                "raza" => $raza,
                "descripcion" => $descripcion,
                "tipo" => $tipo
            );
            if (isPetValid($newMascota)) {
                $respuesta = updatePet($newMascota);
                if ($respuesta != null) header("location: /hotelmascotasmvc/home/mascotas");
                else header("location: /hotelmascotasmvc/sadkitty");
            } else header("location: /hotelmascotasmvc/sadkitty");
        }
    } else if (isset($_GET) && isset($_GET["id_editform_mascota"])) {

        $id_mascota = $_GET["id_editform_mascota"];
        $mascota = getOnePet($id_mascota);
        require_once("views/pets/pet_edit_view.php");
    } else if (isset($_GET) && isset($_GET["id_createform_mascota"])) {
        require_once("views/pets/pet_create_view.php");
    } else if (isset($_GET) && isset($_GET["id_delete_mascota"])) {

        $id_mascota = $_GET["id_delete_mascota"];
        $respuesta = deletePet($id_mascota);

        if ($respuesta != null){
            $url = "/hotelmascotasmvc/home/mascotas";
            echo "<script>window.open('".$url."','_self');</script>";

        } else header("location: /hotelmascotasmvc/sadpuppy");
    
    } else {
        if (isset($_POST) && !empty($_POST)) {

            $nombre = $_POST["nombre"];
            $raza = $_POST["raza"];
            $descripcion = $_POST["descripcion"];
            $tipo = $_POST["tipo"];

            $newMascota = array(
                "nombre" => $nombre,
                "raza" => $raza,
                "descripcion" => $descripcion,
                "tipo" => $tipo,
            );
            if (isPetValid($newMascota)) {
                $respuesta = savePet($newMascota, $id);
                console_log($respuesta);
                if ($respuesta) {
                    $url = "/hotelmascotasmvc/home/mascotas";
                    echo "<script>window.open('".$url."','_self');</script>";
                }
                else header("Location: /hotelmascotasmvc/sadkitty", true);
            } else header("Location: /hotelmascotasmvc/sadkitty", true);
        }
    }
    require_once("views/scripts.html");
    require_once("views/home/home_footer_view.php");
} else header("location: login");

?>