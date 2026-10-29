<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/InicioModel.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Controller/ConfigController.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

        $_SESSION['NombreUsuario'] = $response['Nombre'];
        $_SESSION['NombreRol'] = $response['NombreRol'];

        header("Location: ../../View/Inicio/home.php");
        exit();
    }

    $_POST["mensaje"] = "Su información no se ha podido validar correctamente";
}

if(isset($_POST['btnRecuperarContrasenna'])) {
    $identificacion = $_POST['txtIdentificacion'];

    $response = ConsultarIdentificacionModel($identificacion);

    if($response) {
        $contrasennaTemporal = GenerarContrasennaTemporal();
    
        $responseUpdate = ActualizarContrasennaModel($response['Consecutivo'], $contrasennaTemporal);

        if($responseUpdate) {

            $plantilla = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/MNRepo/View/template/RecuperarAcceso.html');
            $plantilla = str_replace("{{TEMPORAL}}", $contrasennaTemporal, $plantilla);
            $plantilla = str_replace("{{NOMBRE}}", $response['Nombre'], $plantilla);

            EnviarCorreoElectronico("Recuperación de Acceso", $plantilla, $response['CorreoElectronico']);

            header("Location: ../../View/Inicio/login.php");
            exit();   
        }
    }

    $_POST["mensaje"] = "No se ha podido recuperar su acceso al sistema";
}

if(isset($_POST['btnCerrarSesion'])) {
    session_destroy();
    header("Location: ../../View/Inicio/login.php");
    exit();
}