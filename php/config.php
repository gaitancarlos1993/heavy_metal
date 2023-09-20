<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "heavy_metal";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db)
    die("Error al conectarse con la base de datos: " . mysqli_connect_error());
