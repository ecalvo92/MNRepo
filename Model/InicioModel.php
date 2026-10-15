<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/ConfigModel.php';

function RegistroModel($identificacion,$nombre,$correoElectronico,$contrasenna)
{
    try{
        $context = Conectar();

        $sql = "CALL spRegistrarUsuario('$identificacion','$nombre','$correoElectronico','$contrasenna')";
        $response = $context -> query($sql);

        Cerrar($context);
        return $response;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "RegistroModel");
        return false;
    }
}

function InicioSesionModel($identificacion,$contrasenna)
{
    try{
        $context = Conectar();

        $sql = "CALL spIniciarSesionUsuario('$identificacion','$contrasenna')";
        $response = $context -> query($sql);

        $data = null;
        While($row = $response -> fetch_assoc())
        {
            $data = $row;
        }

        Cerrar($context);
        return $data;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "InicioSesionModel");
        return null;
    }
}

function ConsultarIdentificacionModel($identificacion)
{
    try{
        $context = Conectar();

        $sql = "CALL spConsultarIdentificacion('$identificacion')";
        $response = $context -> query($sql);

        $data = null;
        While($row = $response -> fetch_assoc())
        {
            $data = $row;
        }

        Cerrar($context);
        return $data;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "ConsultarIdentificacionModel");
        return null;
    }
}

function ActualizarContrasennaModel($consecutivo, $contrasenna)
{
    try{
        $context = Conectar();

        $sql = "CALL spActualizarContrasenna('$consecutivo','$contrasenna')";
        $response = $context -> query($sql);

        Cerrar($context);
        return $response;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "ActualizarContrasennaModel");
        return false;
    }
}
