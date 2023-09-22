<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Arrastrar y Soltar</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h1 id="titulo">¿Cómo me llamo?</h1>
    <div id="temporizador">Tiempo: 60 segundos</div>
    <?php include ("php/mostrar_img.php"); ?>
    <img id="dibujo" src="<?php echo 'php/uploads/$imagen'; ?>" alt="">
    <div id="zonaDrop"></div>
    
    <div class="drag">
        <div class="elemento" id="elemento1">SUTO</div>
        <div class="elemento" id="elemento2">SETA</div>
        <div class="elemento" id="elemento3">SETO</div>
        <div class="elemento" id="elemento4">SOTO</div>
    </div>
    <p id="resultado">...</p>
    <input type="button" id="boton_siguiente" value="Siguiente">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/index.js"></script>
</body>
</html>
