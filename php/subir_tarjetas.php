<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
$opcion_correcta=$_POST["opcion_correcta"];
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

        // Lee la imagen como datos binarios
        $datosImagen = file_get_contents($imagen_tmp);
        
        // Sentencia preparada sql:
        $sql = "INSERT INTO `tarjetas`(`imagen`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `opcion_correcta`) VALUES (?, ?, ?, ?, ?, ?)";

        try {
            $result = $conexion->prepare($sql);
            
            $result->bindParam(1, $datosImagen, PDO::PARAM_LOB);
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