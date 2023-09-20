$(document).ready(function () {
    var tiempoRestante = 60;
    var temporizador;

    // Función para iniciar el temporizador
    function iniciarTemporizador() {
        temporizador = setInterval(function () {
            tiempoRestante--;
            $("#temporizador").text("Tiempo: " + tiempoRestante + " segundos");

            if (tiempoRestante === 0) {
                clearInterval(temporizador);
                alert("¡Tiempo agotado!");
            }
        }, 1000);
    }

    // Iniciar el temporizador cuando se carga la página
    iniciarTemporizador();

    // Hacer que los elementos sean arrastrables
    $(".elemento").draggable({
        revert: "invalid",
        helper: "clone"
    });

    // Hacer que la zona de soltar acepte los elementos arrastrables
    $("#zonaDrop").droppable({
        accept: ".elemento",
        drop: function (event, ui) {
            var elementoArrastrado = ui.helper.attr("id");

            // Comprobar si el elemento soltado es el correcto
            if (elementoArrastrado === "elemento1" || elementoArrastrado === "elemento3") {
                $(this).css("background-color", "#2ecc71");
                alert("¡Correcto!");
            } else {
                $(this).css("background-color", "#e74c3c");
                alert("Incorrecto, intenta de nuevo.");
            }

            // Reiniciar el temporizador
            clearInterval(temporizador);
            tiempoRestante = 60;
            iniciarTemporizador();
        }
    });
});
