<?php

function Conectar()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return new mysqli("127.0.0.1:3307","root","","mn_bd");
}

function Cerrar($context)
{
    $context -> close();
}

function RegistrarError($exc, $accion)
{
    $context = Conectar();

    $error = $context -> real_escape_string($exc -> getMessage());
    $idUsuario = 0;

    $sql = "CALL spRegistrarError('$error','$accion','$idUsuario')";
    $response = $context -> query($sql);

    Cerrar($context);
}