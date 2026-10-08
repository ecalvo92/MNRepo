<?php

if(isset($_POST['btnRegistro'])) {
    
    $identificacion = $_POST['txtIdentificacion'];
    $nombre = $_POST['txtNombre'];
    $correoElectronico = $_POST['txtCorreoElectronico'];
    $contrasenna = $_POST['txtContrasenna'];

    if($identificacion == "304590415") {
        $_POST["mensaje"] = "La identificación ya existe.";
    }

}

if(isset($_POST['btnInicioSesion'])) {

    $identificacion = $_POST['txtIdentificacion'];
    $contrasenna = $_POST['txtContrasenna'];
}

if(isset($_POST['btnRecuperarContrasenna'])) {

    $identificacion = $_POST['txtIdentificacion'];
}
