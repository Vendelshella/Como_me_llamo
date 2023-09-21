<?php

// Conexión a la base de datos
$conexion = new PDO("mysql:host=localhost;dbname=como_me_llamo", "root", "");

// Obtener el ID de la imagen que deseas mostrar (puedes pasarlo como un parámetro GET o POST)
//$idImagen = $_POST['id']; // Asegúrate de validar y sanear esta entrada
$idImagen = 1;

// Consulta SQL para obtener los datos de la imagen
$sql = "SELECT imagen FROM tarjetas WHERE id = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $idImagen, PDO::PARAM_INT);
$stmt->execute();

// Verificar si se encontró la imagen
if ($stmt->rowCount() > 0) {
    // Obtener los datos binarios de la imagen
    $imagen = $stmt->fetch(PDO::FETCH_ASSOC)['imagen'];

    // Establecer las cabeceras para mostrar la imagen
    header("Content-type: image/png"); // Cambia el tipo MIME según el tipo de imagen

    // Mostrar la imagen
    echo $imagen;
} else {
    // Si la imagen no se encuentra en la base de datos, puedes mostrar una imagen predeterminada o un mensaje de error
    echo "Imagen no encontrada";
}

// Cerrar la conexión
$conexion = null;

?>