<?php

function RegistroModel($identificacion,$nombre,$correoElectronico,$contrasenna)
{
    $context = Conectar();

    $sql = "CALL spRegistrarUsuario('$identificacion','$nombre','$correoElectronico','$contrasenna')";
    $response = $context -> query($sql);

    Cerrar($context);
    return $response;
}

function InicioSesionModel($identificacion,$contrasenna)
{
    $context = Conectar();

    $sql = "CALL spIniciarSesionUsuario('$identificacion','$contrasenna')";
    $response = $context -> query($sql);

    $data = null;
    While($row = $response -> fetch_assoc())
    {
        $data = $row;
    }

    Cerrar($context);
    return $data;
}



function Conectar()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return new mysqli("127.0.0.1:3307","root","","mn_bd");
}

function Cerrar($context)
{
    $context -> close();
}