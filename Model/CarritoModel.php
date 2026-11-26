<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/ConfigModel.php';

function AgregarHabitacionCarritoModel($consecutivoUsuario, $habitacionId, $cantidad)
{
    try{
        $context = Conectar();

        $sql = "CALL spRegistrarHabitacionCarrito('$consecutivoUsuario', '$habitacionId', '$cantidad')";
        $response = $context -> query($sql);

        Cerrar($context);
        return $response;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "AgregarHabitacionCarritoModel");
        return false;
    }
}

function ConsultarResumenCarritoModel($ConsecutivoUsuario)
{
    try{
        $context = Conectar();

        $sql = "CALL spConsultarResumenCarrito('$ConsecutivoUsuario')";
        $response = $context -> query($sql);

        $data = null;
        while($row = $response -> fetch_assoc())
        {
            $data = $row;
        }

        Cerrar($context);
        return $data;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "ConsultarResumenCarritoModel");
        return null;
    }
}
