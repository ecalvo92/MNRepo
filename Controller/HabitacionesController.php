<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/HabitacionesModel.php';

function ConsultarHabitacionesAdmin()
{
    return ConsultarHabitacionesAdminModel();
}

function ConsultarHabitacion($idHabitacion)
{
    return ConsultarHabitacionModel($idHabitacion);
}

if(isset($_POST['action']) && $_POST['action'] == 'btnInactivarHabitacion')
{
    $habitacionId = $_POST['habitacionId'];
    $response = InactivarHabitacionModel($habitacionId);
    echo json_encode($response);
}

if(isset($_POST["btnAgregarHabitacion"]))
{
    $capacidad = $_POST["txtCapacidad"];
    $precio = $_POST["txtPrecio"];
    $caracteristicas = $_POST["txtCaracteristicas"];
    $imagen = $_POST["txtImagen"];

    $response = AgregarHabitacionModel($capacidad, $precio, $caracteristicas, $imagen);
    
    if($response) {
        header("Location: ../../View/Habitaciones/habitaciones.php");
        exit();
    }

    $_POST["mensaje"] = "La información de la habitación no se ha podido registrar correctamente";
}

if(isset($_POST["btnActualizarHabitacion"]))
{
    $habitacionId = $_POST["txtHabitacionId"];
    $capacidad = $_POST["txtCapacidad"];
    $precio = $_POST["txtPrecio"];
    $caracteristicas = $_POST["txtCaracteristicas"];
    $imagen = $_POST["txtImagen"];

    $response = ActualizarHabitacionModel($habitacionId, $capacidad, $precio, $caracteristicas, $imagen);
    
    if($response) {
        header("Location: ../../View/Habitaciones/habitaciones.php");
        exit();
    }

    $_POST["mensaje"] = "La información de la habitación no se ha podido actualizar correctamente";
}