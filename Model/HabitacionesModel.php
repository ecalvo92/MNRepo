<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/ConfigModel.php';

function ConsultarHabitacionesAdminModel($pAdmin)
{
    try{
        $context = Conectar();

        $sql = "CALL spConsultarHabitacionesAdmin('$pAdmin')";
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

function ConsultarHabitacionModel($idHabitacion)
{
    try{
        $context = Conectar();

        $sql = "CALL spConsultarHabitacion('$idHabitacion')";
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
        RegistrarError($exc, "ConsultarHabitacionModel");
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

function AgregarHabitacionModel($capacidad, $precio, $caracteristicas, $imagen, $nombre, $inventario)
{
    try{
        $context = Conectar();

        $sql = "CALL spRegistrarHabitacion('$capacidad', '$precio', '$caracteristicas', '$imagen', '$nombre', '$inventario')";
        $response = $context -> query($sql);

        Cerrar($context);
        return $response;
    } 
    catch (Exception $exc) {
        RegistrarError($exc, "AgregarHabitacionModel");
        return false;
    }
}

function ActualizarHabitacionModel($habitacionId, $capacidad, $precio, $caracteristicas, $imagen, $nombre, $inventario)
    {
        try{
            $context = Conectar();

            $sql = "CALL spActualizarHabitacion('$habitacionId', '$capacidad', '$precio', '$caracteristicas', '$imagen', '$nombre', '$inventario')";
            $response = $context -> query($sql);

            $actualizado = (bool) $response -> fetch_row()[0];

            Cerrar($context);
            return $actualizado;
        } 
        catch (Exception $exc) {
            RegistrarError($exc, "ActualizarHabitacionModel");
            return false;
        }
}
