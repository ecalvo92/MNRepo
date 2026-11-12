<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/ConfigModel.php';

function ConsultarUsuarioModel($consecutivo)
{
    try{
        $context = Conectar();

        $sql = "CALL spConsultarUsuario('$consecutivo')";
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
        RegistrarError($exc, "ConsultarUsuarioModel");
        return null;
    }
}

function ActualizarDatosCuentaModel($consecutivoUsuario, $identificacion, $nombre, $correoElectronico)
{
    try{
        $context = Conectar();

        $sql = "CALL spActualizarDatosCuenta('$consecutivoUsuario','$identificacion', '$nombre', '$correoElectronico')";
        $response = $context -> query($sql);

        $actualizado = (bool) $response -> fetch_row()[0];

        Cerrar($context);
        return $actualizado;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "ActualizarDatosCuentaModel");
        return false;
    }
}