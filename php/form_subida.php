<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Subir imagen y tarjetas</h1>
    <form action="subir_tarjetas_carpeta.php" method="post" enctype="multipart/form-data" id="form_up_img">
        <table>
            <tr>
                <td><label for="opcion_correcta">Nombre:</label></td>
                <td><input type="text" name="opcion_correcta" id="opcion_correcta"></td>
            </tr>
            <tr>
                <td><label for="imagen">Imagen:</label></td>
                <td><input type="file" name="imagen" id="imagen"></td>
            </tr>
            <tr>
                <td><label for="opcion1">Opción 1:</label></td>
                <td><input type="text" name="opcion1" id="opcion1"></td>
            </tr>
            <tr>
                <td><label for="opcion2">Opción 2:</label></td>
                <td><input type="text" name="opcion2" id="opcion2"></td>
            </tr>
            <tr>
                <td><label for="opcion3">Opción 3:</label></td>
                <td><input type="text" name="opcion3" id="opcion3"></td>
            </tr>
            <tr>
                <td><label for="opcion4">Opción 4:</label></td>
                <td><input type="text" name="opcion4" id="opcion4"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Enviar" name="boton_enviar" id="boton_enviar"></td>
            </tr>
        </table>
    </form>
</body>
</html>