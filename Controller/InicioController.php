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

function GenerarContrasennaTemporal()
{
    $caracteres = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789';
    $longitud = 6;
    $resultado = '';

    for ($i = 0; $i < $longitud; $i++) {
        $resultado .= $caracteres[random_int(0, strlen($caracteres) - 1)];
    }

    return $resultado;
}

function EnviarCorreoElectronico($asunto, $contenido, $destinatario)
{
    try
        {
            require 'PHPMailer/src/PHPMailer.php';
            require 'PHPMailer/src/SMTP.php';

            $correoSalida = "@gmail.com";
            $contrasennaSalida = "";

            if($contrasennaSalida == "")
            {
                return true; // Simulación de envío exitoso
            }

            $mail = new PHPMailer();
            $mail->CharSet = 'UTF-8';

            $mail->IsSMTP();
            $mail->IsHTML(true);
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = $correoSalida;
            $mail->Password = $contrasennaSalida;

            $mail->SetFrom($correoSalida);
            $mail->Subject = $asunto;
            $mail->MsgHTML($contenido);
            $mail->AddAddress($destinatario);
            $mail->send();
            return true;
        }
        catch (Exception $e)
        {
            AddError($e, 'EnviarCorreo');
            return false;
        }
}