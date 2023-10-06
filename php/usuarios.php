<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>imagen</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Número de Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Nombre de Usuario</th>
                        <th>Tipo de Documento</th>
                        <th>Número de Documento</th>
                        <th>Rol</th>
                        <th>Estado</th>
                       
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta SQL para obtener los registros de usuarios
                    $sql = "SELECT
                    nombre_usuario,
                    apellido_usuario,
                    fecha_nacimiento,
                    telefono,
                    correo,
                    nombre_usuario,
                    td.nombre_tipo_doc,
                    num_documento,
                    rol.nombre,
                    e.estadoscol
                    	
                      FROM usuarios AS u
                      JOIN tipos_documentos AS td
                      ON id_tipo_doc = id_tipo_documento
                      JOIN roles AS rol
                      ON roles_idroles = idroles
                      JOIN estados AS e
                      ON idestados = estados_idestados";
                    $result = mysqli_query($db, $sql);

                    // URL de una imagen aleatoria de gato (puedes cambiarla por la que prefieras)
                    $randomImageURL = "https://via.placeholder.com/100";

                    // Itera a través de los resultados y genera filas para cada registro
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td><img src='$randomImageURL' alt='Imagen de usuario' width='100'></td>";
                        echo "<td>" . $row['nombre_usuario'] . "</td>";
                        echo "<td>" . $row['apellido_usuario'] . "</td>";
                        echo "<td>" . $row['fecha_nacimiento'] . "</td>";
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        echo "<td>" . $row['nombre_usuario'] . "</td>";
                        echo "<td>" . $row['nombre_tipo_doc'] . "</td>";
                        echo "<td>" . $row['num_documento'] . "</td>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['estadoscol'] . "</td>";
                        // Puedes agregar botones de acciones aquí (Editar, Eliminar, etc.)
                        echo "<td>";
                        echo "<form method='post' action='editar_usuario_template.php'>";
                        echo "<input type='hidden' name='num_documento' value='" . $row['num_documento'] . "'>";
                        echo "<button type='submit' class='btn btn-primary' name='edit_button'>";
                        echo "<i class='bi bi-pencil'></i> Editar";
                        echo "</button>";
                        echo "</form>";
                        echo "<form method='post' action='delete_usuarios.php'>";
                        echo "<button type='submit' class='btn btn-danger' name='delete_button' value='" . $row['num_documento'] . "'>";
                        echo "<i class='bi bi-trash'></i> Eliminar";
                        echo "</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<script>
    // JavaScript (utilizando jQuery)
    $(document).ready( function() {
        $('.edit-button').click(function() {
            var userId = $(this).data('id');

            // Realiza una solicitud AJAX para obtener los datos del usuario
            $.ajax({
                url: 'n', // Ruta a tu script PHP que obtiene los datos del usuario
                type: 'GET',
                data: {
                    userId: userId
                },
                success: function(response) {
                    // Parsea la respuesta JSON y prellena el formulario
                    var userData = JSON.parse(response);
                    $('#edit_nombres').val(userData.nombre);
                    $('#edit_apellidos').val(userData.apellido);
                    $('#edit_num_doc').val(userData.num_documento);
                    $('#edit_seudo').val(userData.seudonimo);
                    $('#edit_correo').val(userData.correo);
                    $('#edit_fecha-nacimiento').val(userData.fecha_nacimiento);
                    $('#edit_telefono').val(userData.telefono);
                    $('#edit_rol').val(userData.rol);
                    $('#edit_estado').val(userData.estadoscol);
                    $('#edit_tipo-doc').val(userData.id_tipo_documento);
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">