<?php

function IncludeCSS()
{
    echo '
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proyecto Web - MN</title>

            <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
            <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/libs/bootstrap-icons/bootstrap-icons.css">
            <link rel="stylesheet" href="../assets/css/main.css">
        </head>
    ';
}

function IncludeJS()
{
    echo '
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/auth.js"></script>
    ';
}