<?php
try{
    // Conexión a la base de datos
    $conexion = new PDO("mysql:host=localhost;dbname=como_me_llamo", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el ID de la imagen que se desea mostrar
    //$idImagen = $_POST['id'];
    $idImagen = 3;

    // Consulta SQL para obtener los datos de la imagen
    $sql = "SELECT imagen FROM tarjetas WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $idImagen, PDO::PARAM_INT);
    $stmt->execute();

    // Verificar si se encontró la imagen
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        $imagen = $row['imagen'];

        $ruta_imagen = "uploads/$imagen";

        echo "<img src='$ruta_imagen' alt='Imagen'>";
    } else {
        // Si la imagen no se encuentra en la base de datos
        echo "Imagen no encontrada";
    }
}catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
    

    // Cerrar la conexión
    $conexion = null;

?>