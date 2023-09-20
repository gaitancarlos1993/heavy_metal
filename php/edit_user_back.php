<?php
include("config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['btn_Editar'])) {
    // ambil data dari form
    $nombre_usuario = $_POST['edit_nombres'];
    $apellido_usuario = $_POST['edit_apellidos'];
    $num_documento  = $_POST['edit_num_doc'];
    $seudonimo = $_POST['edit_seudo'];
    $telefono = $_POST['edit_telefono'];
    $correo = $_POST['edit_correo'];
    $fecha_nacimiento = $_POST['edit_fecha-nacimiento'];
    $estados_idestados  = 1;
    $roles_idroles  = $_POST['edit_rol'];
    $estado = $_POST['edit_estado'];
    $tipo_doc = $_POST['tipo-doc'];


    // query
    $sql = "UPDATE usuarios 
    SET nombre_usuario='$nombre_usuario', 
    apellido_usuario='$apellido_usuario', 
    seudonimo='$seudonimo', 
    telefono='$telefono', 
    correo='$correo' ,
    fecha_nacimiento='$fecha_nacimiento' ,
    correo='$correo',
    roles_idroles='roles_idroles = '$roles_idroles',
    estados_idestados = '$estado',
    id_tipo_documento = '$tipo_doc'
    WHERE num_documento = '$num_documento'";
    $query = mysqli_query($db, $sql);




    // cek apa query berhasil disimpan?
    
} else
    die("Acceso denegado...");