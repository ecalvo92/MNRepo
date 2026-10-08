<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Model/InicioModel.php';

if(isset($_POST['btnRegistro'])) {
    $identificacion = $_POST['txtIdentificacion'];
    $nombre = $_POST['txtNombre'];
    $correoElectronico = $_POST['txtCorreoElectronico'];
    $contrasenna = $_POST['txtContrasenna'];

    $reponse = RegistroModel($identificacion,$nombre,$correoElectronico,$contrasenna);
}

if(isset($_POST['btnInicioSesion'])) {
    $identificacion = $_POST['txtIdentificacion'];
    $contrasenna = $_POST['txtContrasenna'];

    $reponse = InicioSesionModel($identificacion,$contrasenna);
}

if(isset($_POST['btnRecuperarContrasenna'])) {
    $identificacion = $_POST['txtIdentificacion'];
}
