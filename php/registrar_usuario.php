<?php
include("config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['Registro'])) {
    // ambil data dari form
    $nombre_usuario = $_POST['nombre'];
    $apellido_usuario = $_POST['apellidos'];
    $num_documento  = $_POST['num_documento'];
    $seudonimo = $_POST['seudonimo'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['password'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha-nacimiento'];
    $estados_idestados  = 1;
    $id_tipo_documento  = $_POST['tipo-doc'];
    $roles_idroles  = $_POST['rol'];
   
    $hash_contraseña = password_hash($contraseña, PASSWORD_BCRYPT);

    // Verificar si se subió una imagen

    // query
    $sql = "INSERT INTO usuarios
    VALUES($num_documento, '$seudonimo', '$apellido_usuario', '$nombre_usuario', $telefono, 
    '$contraseña', '$correo', '$fecha_nacimiento', 'img/perfil_carlos.jpeg', $roles_idroles, $estados_idestados, 
    $id_tipo_documento, '$hash_contraseña')";
    $query = mysqli_query($db, $sql);

    // Comprueba qué consultas se guardaron correctamente.

} else {
    die("Acceso prohibido...");
}
?>
