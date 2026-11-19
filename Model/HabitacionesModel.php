<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/ConfigModel.php';

function ConsultarHabitacionesAdminModel()
{
    try{
        $context = Conectar();

        $sql = "CALL spConsultarHabitacionesAdmin()";
        $response = $context -> query($sql);

        $data = [];
        while($row = $response -> fetch_assoc())
        {
            $data[] = $row;
        }

        Cerrar($context);
        return $data;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "ConsultarHabitacionesAdminModel");
        return null;
    }
}

function InactivarHabitacionModel($habitacionId)
{
    try{
        $context = Conectar();

        $sql = "CALL spInactivarHabitacion('$habitacionId')";
        $response = $context -> query($sql);

        $actualizado = (bool) $response -> fetch_row()[0];

        Cerrar($context);
        return $actualizado;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "InactivarHabitacionModel");
        return false;
    }
}

