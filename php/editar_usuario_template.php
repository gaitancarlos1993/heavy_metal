<?php include("./config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $sql = "SELECT * FROM usuarios WHERE 	num_documento  = ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="edit_user_back.php" method="post">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" placeholder="Ingresa tus nombres" name="edit_nombres">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos" name="edit_apellidos">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" name="password" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Repite tu contraseña</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" maxlength="10" placeholder="Repite tu contraseña">
                    </div>
                    <div class="form-group">
                        <label for="fecha-nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha-nacimiento" name="edit_fecha-nacimiento">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Número de teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="edit_telefono" maxlength="13" placeholder="Ingresa tu número de teléfono">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="edit_correo" placeholder="Ingrese su correo">
                    </div>
                    <div class="form-group">
                        <label for="foto">Sube tu foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="edit_seudo" maxlength="20" placeholder="Ingresa tu nombre de usuario">
                    </div>
                    <div class="form-group">
                        <label for="tipo-doc">Tipo de documento</label>
                        <select class="form-control" id="tipo-doc" name="tipo-doc">
                            <option value="3">NIT</option>
                            <option value="1">Cédula de ciudadanía</option>
                            <option value="5">Pasaporte</option>
                            <option value="4">Cédula de extranjería</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol:</label>
                        <select class="form-control" id="rol" name="edit_rol">
                            <option value="1">Administrador</option>
                            <option value="2">Asesor</option>
                            <option value="4">Admin Bodega</option>
                            <option value="5">Domiciliario</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_estado">Rol:</label>
                        <select class="form-control" id="edit_estado" name="edit_estado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numero-doc">Número de documento</label>
                        <input type="text" class="form-control" id="numero-doc" disabled name="edit_num_doc">
                    </div>

                    <button type="submit" class="btn btn-primary" name="btn_Editar">Editar</button>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">