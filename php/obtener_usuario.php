// obtener_usuario.php
<?php
include("config.php");

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE num_documento = $userId";
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
        echo json_encode($userData);
    } else {
        echo json_encode(array()); // Devolver un objeto vacío si no se encontraron datos
    }
}
?>
