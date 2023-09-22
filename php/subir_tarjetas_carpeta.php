<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$opcion_correcta=$_POST["opcion_correcta"];
$imagen=$_FILES["imagen"];
$nombre_imagen=$_FILES["imagen"]["name"];
$tipo_imagen=$_FILES["imagen"]["type"];
$tamaño_imagen=$_FILES["imagen"]["size"];
$imagen_tmp=$_FILES["imagen"]["tmp_name"];
$carpeta="/Como_me_llamo/php/uploads/";
$opcion1=$_POST["opcion1"];
$opcion2=$_POST["opcion2"];
$opcion3=$_POST["opcion3"];
$opcion4=$_POST["opcion4"];

// Crear directorio para guardar los archivos
if(!is_dir($carpeta)){
    mkdir ("uploads");
}

    // Conexion:
    try{
        $conexion=new PDO("mysql:host=localhost; dbname=como_me_llamo", "root", "");
        
        echo "Conexion exitosa<br>";

        // Las excepciones tb son objetos y en esta sentencia se crea el objeto de tipo excepcion:
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Caracteres españoles:
        $conexion->exec("SET CHARACTER SET utf8");

        // Ruta de la carpeta de destino
        $ruta_destino=$_SERVER["DOCUMENT_ROOT"] . $carpeta;

        // De carpeta temporal a carpeta destino:
        if (move_uploaded_file($imagen_tmp, $ruta_destino . $nombre_imagen) == false) {
            echo "Error en la subida de imagen";
        }
        
        // Sentencia preparada sql:
        $sql = "INSERT INTO `tarjetas`(`imagen`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `opcion_correcta`) VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $result = $conexion->prepare($sql);
            
            $result->bindParam(1, $nombre_imagen);
            $result->bindParam(2, $opcion1);
            $result->bindParam(3, $opcion2);
            $result->bindParam(4, $opcion3);
            $result->bindParam(5, $opcion4);
            $result->bindParam(6, $opcion_correcta);
            
            $result->execute();

            echo "Registro insertado";

        } catch (Exception $e) {
            die("Error: " . $e->GetMessage());
        }
        
    }catch(Exception $e){
        die("Error: " . $e->GetMessage());
    }

}
?>