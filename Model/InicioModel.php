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
    catch (Exception $e) {
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
    catch (Exception $e) {
        return null;
    }
}