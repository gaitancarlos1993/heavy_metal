<?php include("./config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    </head>

<body>

    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Registro</h2>
                <form action="registrar_usuario.php" method="post">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" placeholder="Ingresa tus nombres" name="nombre">
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" placeholder="Ingresa tus apellidos" name="apellidos">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" name="password" maxlength="10">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Repite tu contraseña</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" maxlength="10"
                            placeholder="Repite tu contraseña">
                    </div>
                    <div class="form-group">
                        <label for="fecha-nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha-nacimiento" name="fecha-nacimiento">
                    </div>
                    
                    <div class="form-group">
                        <label for="telefono">Número de teléfono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" maxlength="13"
                            placeholder="Ingresa tu número de teléfono">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo electronico</label>
                        <input type="email" class="form-control" id="correo" name="correo"
                            placeholder="Ingrese su correo">
                    </div>
                    <div class="form-group">
                        <label for="foto">Sube tu foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="seudonimo" maxlength="20"
                            placeholder="Ingresa tu nombre de usuario">
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
                        <select class="form-control" id="rol" name="rol">
                            <option value="1">Administrador</option>
                            <option value="2">Asesor</option>
                            <option value="4">Admin Bodega</option>
                            <option value="5">Domiciliario</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="numero-doc">Número de documento</label>
                        <input type="text" class="form-control" id="numero-doc"
                            placeholder="Ingresa tu número de documento" name="num_documento">
                    </div>

                    <button type="submit" class="btn btn-primary" name="Registro">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalExito" tabindex="-1" role="dialog" aria-labelledby="modalExitoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalExitoLabel">Registro Exitoso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¡Tu registro se ha realizado con éxito!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
    <script>
  // JavaScript para mostrar el modal de éxito
  <?php
  // Verificar si la inserción en la base de datos fue exitosa (simplemente verifica si $query es verdadero)
  if ($query) {
    echo '$(document).ready(function() { $("#modalExito").modal("show"); });';
  }
  ?>
</script>

</html>