<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$opcion_correcta=$_POST["opcion_correcta"];
$ruta_imagen="uploads/";
$imagen=$_FILES["imagen"];
$nombre_imagen=$_FILES["imagen"]["name"];
$tipo_imagen=$_FILES["imagen"]["type"];
$tamaño_imagen=$_FILES["imagen"]["size"];
$imagen_tmp=$_FILES["imagen"]["tmp_name"];
$opcion1=$_POST["opcion1"];
$opcion2=$_POST["opcion2"];
$opcion3=$_POST["opcion3"];
$opcion4=$_POST["opcion4"];

    // Conexion:
    try{
        $conexion=new PDO("mysql:host=localhost; dbname=como_me_llamo", "root", "");
        
        echo "Conexion exitosa<br>";

        // Las excepciones tb son objetos y en esta sentencia se crea el objeto de tipo excepcion:
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Caracteres españoles:
        $conexion->exec("SET CHARACTER SET utf8");

        // Apuntar a la imagen
        $imagen_objetivo = fopen($ruta_imagen . $nombre_imagen, "r");

        // Leer los bytes de la imagen
        $contenido = fread ($imagen_objetivo, $tamaño_imagen);

        fclose($imagen_objetivo);
        
        // Sentencia preparada sql:
        $sql = "INSERT INTO `tarjetas`(`imagen`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `opcion_correcta`) VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $result = $conexion->prepare($sql);
            
            $result->bindParam(1, $contenido, PDO::PARAM_LOB);
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