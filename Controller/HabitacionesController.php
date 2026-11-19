<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/HabitacionesModel.php';

function ConsultarHabitacionesAdmin()
{
    return ConsultarHabitacionesAdminModel();
}

if(isset($_POST['action']) && $_POST['action'] == 'btnInactivarHabitacion')
{
    $habitacionId = $_POST['habitacionId'];
    $response = InactivarHabitacionModel($habitacionId);
    echo json_encode($response);
}