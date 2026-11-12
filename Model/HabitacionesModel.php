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

