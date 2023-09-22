<?php

// Conexión a la base de datos
$conexion = new PDO("mysql:host=localhost;dbname=como_me_llamo", "root", "");

// Obtener el ID de la imagen que se desea mostrar
//$idImagen = $_POST['id'];
$idImagen = 7;

// Consulta SQL para obtener los datos de la imagen
$sql = "SELECT imagen FROM tarjetas WHERE id = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $idImagen, PDO::PARAM_INT);
$stmt->execute();

// Verificar si se encontró la imagen
if ($stmt->rowCount() > 0) {
    // Obtener los datos binarios de la imagen
    $imagen = $stmt->fetch(PDO::FETCH_ASSOC)['imagen'];
    // Mostrar la imagen
    echo "<img src='data:image/png; base64,'" . base64_encode ($idImagen) . "'>";
} else {
    // Si la imagen no se encuentra en la base de datos
    echo "Imagen no encontrada";
}

// Cerrar la conexión
$conexion = null;

?>