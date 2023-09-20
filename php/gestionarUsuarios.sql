DELIMITER //

CREATE FUNCTION DesencriptarContraseña(num_documento INT) RETURNS VARCHAR(45)
BEGIN
    DECLARE contraseña VARCHAR(45);

    -- Utiliza AES_DECRYPT para desencriptar la contraseña basada en num_documento
    SELECT AES_DECRYPT(contraseña_hash, 'tu_clave_secreta') INTO contraseña
    FROM usuarios
    WHERE num_documento = num_documento
    LIMIT 1; -- Agregar LIMIT 1 para asegurar una sola fila

    -- Retorna la contraseña desencriptada
    RETURN contraseña;
END //

DELIMITER ;


SELECT DesencriptarContraseña(1234567890) AS contraseña_desencriptada;


-- Inserción 1
CALL GestionarUsuario('i', 
1234567890, 
'usuario1', 
'Apellido1', 
'Nombre1', 
3001234567, 
'contraseña1', 
'usuario1@example.com', 
'1990-01-01', 
'imagen1.jpg', 
1, 
1, 
1);

-- Inserción 2
CALL GestionarUsuario('i', 1234567891, 'usuario2', 'Apellido2', 'Nombre2', 3101234567, 'contraseña2', 'usuario2@example.com', '1990-02-02', 'imagen2.jpg', 1, 1, 1);

-- Inserción 3
CALL GestionarUsuario('i', 1234567892, 'usuario3', 'Apellido3', 'Nombre3', 3001234568, 'contraseña3', 'usuario3@example.com', '1990-03-03', 'imagen3.jpg', 1, 1, 1);

-- Inserción 4
CALL GestionarUsuario('i', 1234567893, 'usuario4', 'Apellido4', 'Nombre4', 3101234568, 'contraseña4', 'usuario4@example.com', '1990-04-04', 'imagen4.jpg', 1, 1, 1);



DELIMITER //

CREATE PROCEDURE GestionarUsuario(
    IN opcion CHAR(1),
    IN num_documento INT,
    IN seudonimo VARCHAR(45),
    IN apellido_usuario VARCHAR(45),
    IN nombre_usuario VARCHAR(45),
    IN telefono INT,
    IN contraseña VARCHAR(45),
    IN correo VARCHAR(45),
    IN fecha_nacimiento DATETIME,
    IN imagen TEXT,
    IN roles_idroles INT,
    IN estados_idestados INT,
    IN id_tipo_documento INT
)
BEGIN
    DECLARE rowCount INT;
    
    IF opcion = 'i' THEN
        INSERT INTO usuarios
         (num_documento, 
         seudonimo, 
         apellido_usuario, 
         nombre_usuario, 
         telefono, 
         contraseña, 
         correo, 
         fecha_nacimiento, 
         imagen, 
         roles_idroles, 
         estados_idestados, 
         id_tipo_documento, 
         contraseña_hash)
        VALUES (num_documento, 
        seudonimo, 
        apellido_usuario, 
        nombre_usuario, 
        telefono, 
        contraseña,
        correo, 
        fecha_nacimiento, 
        imagen, 
        roles_idroles, 
        estados_idestados, 
        id_tipo_documento,
        AES_ENCRYPT(contraseña, 'tu_clave_secreta'));
        SELECT 'Usuario insertado correctamente.' AS mensaje;
    ELSEIF opcion = 'u' THEN
        UPDATE usuarios SET
            seudonimo = seudonimo,
            apellido_usuario = apellido_usuario,
            nombre_usuario = nombre_usuario,
            telefono = telefono,
            contraseña = contraseña,
            correo = correo,
            fecha_nacimiento = fecha_nacimiento,
            imagen = imagen,
            roles_idroles = roles_idroles,
            estados_idestados = estados_idestados,
            id_tipo_documento = id_tipo_documento,
            contraseña_hash = AES_ENCRYPT(contraseña, 'tu_clave_secreta')
        WHERE num_documento = num_documento;
        SELECT 'Usuario actualizado correctamente.' AS mensaje;
    ELSEIF opcion = 'd' THEN
        DELETE FROM usuarios WHERE num_documento = num_documento;
        SELECT 'Usuario eliminado correctamente.' AS mensaje;
    ELSE
        SELECT 'Opción inválida. Debe ser "i" para insertar, "u" para actualizar o "d" para eliminar.' AS mensaje;
    END IF;
END //

DELIMITER ;
