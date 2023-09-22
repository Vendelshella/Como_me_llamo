$(document).ready(function () {
    var tiempoRestante = 60;
    var temporizador;

    $("#resultado").hide();

    // Función para iniciar el temporizador
    function iniciarTemporizador() {
        // setInterval ejecuta una función de forma reiterada, con un retardo de tiempo fijo entre cada llamada
        temporizador = setInterval(function () {
            tiempoRestante--;
            $("#temporizador").text("Tiempo: " + tiempoRestante + " segundos");

            if (tiempoRestante === 0) {
                // clearInterval se utiliza para detener más ejecuciones de la función especificada en el método setInterval ()
                clearInterval(temporizador);
                alert("¡Tiempo agotado!");
            }
        }, 1000);
    }

    // Iniciar el temporizador cuando se carga la página
    iniciarTemporizador();
    /*
    // Llamar al servidor para obtener la imagen
    $.ajax({
        url: "obtener_imagen.php", // Nombre de tu archivo PHP para obtener la imagen
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.success) {
                // La imagen se ha obtenido con éxito
                $("#dibujo").attr("src", "data:image/png;base64," + data.imagen);
            } else {
                // Ocurrió un error al obtener la imagen
                console.error(data.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error en la llamada AJAX: " + error);
        }
    });
    */
    // Hacer que los elementos sean arrastrables
    $(".elemento").draggable({
        revert: "true",
        helper: "original" // Arrastra el elemento original
    });

    // Hacer que la zona de soltar acepte los elementos arrastrables
    $("#zonaDrop").droppable({
        accept: ".elemento",
        drop: function (event, ui) {
            var elementoArrastrado = ui.helper.attr("id");
            var elemento = $("#dibujo");

            // Comprobar si el elemento soltado es el correcto
            if (elementoArrastrado === "elemento2") {
                $(this).css("background-color", "#2ecc71");
                $("#resultado").text("¡Correcto!").fadeIn();

                // Detener el temporizador permanentemente
                clearInterval(temporizador);
                
                // Detener el movimiento de las tarjetas
                $(".elemento").draggable({
                    revert: "true",
                    helper: "clone" //Arrastra un clon de la tarjeta
                });

                function agitarDeArribaAbajo() {
                    elemento.animate({
                        top: '-=20px' // Mueve el elemento hacia arriba
                    }, 100, 'linear').animate({
                        top: '+=40px' // Mueve el elemento hacia abajo, más que la distancia hacia arriba
                    }, 100, 'linear').animate({
                        top: '-=20px' // Mueve el elemento hacia arriba para volver a su posición original
                    }, 100, 'linear');
                }
    
                // Inicia el efecto de agitación de arriba a abajo 2 veces
                agitarDeArribaAbajo();
                agitarDeArribaAbajo();
            } else {
                $(this).css("background-color", "#e74c3c");
                $("#resultado").text("Incorrecto, inténtalo de nuevo.");
                
                // Aplica el efecto de agitación utilizando la función shake() de jQuery UI
                elemento.effect("shake", { times: 5, distance: 10 }, 1000);
            }
        }
    });
});
