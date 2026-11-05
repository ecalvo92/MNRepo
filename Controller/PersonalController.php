<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/InicioModel.php';

if(isset($_POST['btnCambiarContrasenna'])) {
    $contrasennaActual = $_POST['txtContrasenaActual'];
    $contrasennaNueva = $_POST['txtContrasenaNueva'];
    $consecutivoUsuario = $_SESSION['ConsecutivoUsuario'];
    
    $response = ActualizarContrasennaModel($consecutivoUsuario,$contrasennaNueva,$contrasennaActual);

    if($response) {

        $plantilla = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/MNRepo/View/template/CambiarAcceso.html');
        $plantilla = str_replace("{{FECHAHORA}}", date("Y-m-d H:i:s"), $plantilla);
        $plantilla = str_replace("{{NOMBRE}}", $_SESSION['NombreUsuario'], $plantilla);

        EnviarCorreoElectronico("Cambio de Acceso", $plantilla, $_SESSION['CorreoElectronico']);

        $_POST["mensajePassword"] = "Su información se ha actualizado correctamente";
    } 
    else {
        $_POST["mensajePassword"] = "Su información no se ha podido actualizar correctamente, verifique sus datos";
    }
}
