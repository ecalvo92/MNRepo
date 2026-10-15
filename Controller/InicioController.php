<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/InicioModel.php';

if(isset($_POST['btnRegistro'])) {
    $identificacion = $_POST['txtIdentificacion'];
    $nombre = $_POST['txtNombre'];
    $correoElectronico = $_POST['txtCorreoElectronico'];
    $contrasenna = $_POST['txtContrasenna'];

    $response = RegistroModel($identificacion,$nombre,$correoElectronico,$contrasenna);

    if($response) {
        header("Location: ../../View/Inicio/login.php");
        exit();
    }

    $_POST["mensaje"] = "Su información no se ha podido registrar correctamente";
}

if(isset($_POST['btnInicioSesion'])) {
    $identificacion = $_POST['txtIdentificacion'];
    $contrasenna = $_POST['txtContrasenna'];

    $response = InicioSesionModel($identificacion,$contrasenna);

    if($response) {
        header("Location: ../../View/Inicio/home.php");
        exit();
    }

    $_POST["mensaje"] = "Su información no se ha podido validar correctamente";
}

if(isset($_POST['btnRecuperarContrasenna'])) {
    $identificacion = $_POST['txtIdentificacion'];
}
