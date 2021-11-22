<?php

$hostname_conexion = "localhost";
$database_conexion = "textrefomar";
$username_conexion = "uv3283_text";
$password_conexion = "czK_hN9bRV";

    // $conexion = mysqli_connect("localhost","root","","refomar1","3306");
    $conexion =@mysqli_connect($hostname_conexion, $username_conexion, $password_conexion,$database_conexion);
    mysqli_set_charset($conexion,"uft8");