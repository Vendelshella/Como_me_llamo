$(document).ready(function () {
    var tiempoRestante = 60;
    var temporizador;

    // Mostrar el texto de ayuda
    $("#ayuda").fadeIn(1000);

    // Ocultar el texto de ayuda
    setTimeout(function () {
        $("#ayuda").fadeOut(1000);
    }, 3000);

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

    // Hacer que los elementos sean arrastrables
    $(".elemento").draggable({
        revert: "true",
        helper: "original"
    });

    // Hacer que la zona de soltar acepte los elementos arrastrables
    $("#zonaDrop").droppable({
        accept: ".elemento",
        drop: function (event, ui) {
            var elementoArrastrado = ui.helper.attr("id");

            // Comprobar si el elemento soltado es el correcto
            if (elementoArrastrado === "elemento2") {
                $(this).css("background-color", "#2ecc71");
                $("#resultado").text("¡Correcto!");
                
                // Detener el temporizador permanentemente
                clearInterval(temporizador);
                
                // Detener el movimiento de las tarjetas
                $(".elemento").draggable({
                    revert: "true",
                    helper: "clone"
                });
            } else {
                $(this).css("background-color", "#e74c3c");
                $("#resultado").text("Incorrecto, inténtalo de nuevo.");
            }
        }
    });
});
