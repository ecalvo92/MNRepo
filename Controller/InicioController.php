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