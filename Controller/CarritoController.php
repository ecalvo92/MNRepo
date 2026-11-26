<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/CarritoModel.php';

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['action']) && $_POST['action'] == 'btnAgregarHabitacionCarrito')
{
    $consecutivoUsuario = $_SESSION['ConsecutivoUsuario'];
    $habitacionId = $_POST['habitacionId'];
    $cantidad = 1;
    
    $response = AgregarHabitacionCarritoModel($consecutivoUsuario, $habitacionId, $cantidad);
    echo json_encode($response);
}

function ConsultarResumenCarrito()
{
    $consecutivoUsuario = $_SESSION['ConsecutivoUsuario'];
    $response = ConsultarResumenCarritoModel($consecutivoUsuario);

    $_SESSION['CantidadTotal'] = $response['CantidadTotal'] ?? 0;
    $_SESSION['PrecioTotal'] = $response['PrecioTotal'] ?? 0;
}

