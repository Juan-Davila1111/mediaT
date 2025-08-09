<?php require_once("./app/views/inc/user/header.php");

use app\controllers\quizController;

$insQuiz = new quizController();

//Variables que contral la partida


if (isset($_POST['siguiente'])) { //Ya esta jugando
    //Aumento 1 en las estadísticas

    //Controlar si la respuesta esta bien
    if ($_SESSION['respuesta_correcta'] == $_POST['respuesta']) {
        $_SESSION['correctas'] = $_SESSION['correctas'] + 1;
    }

    //
    $_SESSION['numPreguntaActual'] = $_SESSION['numPreguntaActual'] + 1;
    if ($_SESSION['numPreguntaActual'] < 10) {
        $preguntaActual = $insQuiz->obtenerPreguntaPorId($_SESSION['idPreguntas'][$_SESSION['numPreguntaActual']]);
        $_SESSION['respuesta_correcta'] = $preguntaActual['correcta'];
    } else {
        // Calculo la cantidad de respuestas incorrectas y lo guardo en una variable global
        $_SESSION['incorrectas'] = 10 - $_SESSION['correctas'];

        // Obtengo el nombre de la categoría y lo pongo en una variable global
        $_SESSION['nombreCategoria'] = $insQuiz->obtenerNombreTema($_SESSION['idCategoria']);

        // Calculo el puntaje
        $_SESSION['score'] = ($_SESSION['correctas'] * 100) / 10;
        $fechaEspecifica = "2024-09-14";
        $fechaFormateada = date("d-m-Y", strtotime($fechaEspecifica));
        $_SESSION['fecha'] = $fechaFormateada;
        unset($_SESSION['quiz_ganado']);
        unset($_SESSION['quiz_ganado2']);



        // Verifico si los encabezados ya han sido enviados
        if (headers_sent()) {
            echo '
                <script>
                window.location.href = "' . APP_URL . 'final";
                </script>
            ';
        } else {
            header("Location: " . APP_URL . "final");
            exit(); // Asegura que el script se detiene después de redirigir
        }
    }
} else { //comenzó a jugar$_SESSION['correctas']=0;
    $_SESSION['correctas'] = 0;
    $_SESSION['numPreguntaActual'] = 0;
    $_SESSION['preguntas'] = $insQuiz->obtenerIdsPreguntasPorCategoria($_SESSION['idCategoria']);
    $_SESSION['idPreguntas'] = array();

    foreach ($_SESSION['preguntas'] as $idPregunta) {
        array_push($_SESSION['idPreguntas'], $idPregunta['id']); // Item agregado
    }

    shuffle($_SESSION['idPreguntas']);

    // Obtener la pregunta actual usando el primer ID del arreglo desordenado
    $preguntaActual = $insQuiz->obtenerPreguntaPorId($_SESSION['idPreguntas'][0]);
    $_SESSION['respuesta_correcta'] = $preguntaActual['correcta'];
}
?>

<!-- Contenedor de el quiz -->
<div class="contedirRespuestaQuizPadre">
    <div class="contenedorRobot">
        <div id="sketch-board-con">
            <div id="sketch-board">
                <div id="head">
                    <div id="lens">
                        <div id="upper-shadow"></div>
                        <div id="rect"></div>
                        <div id="eyes"></div>
                    </div>
                </div>
                <div id="ear">
                    <div id="ear-antenna"></div>
                </div>

                <div id="small-cap"></div>

                <div id="body">
                    <div id="shadow-box"></div>
                    <div id="pocket-area">
                        <div id="pocket"></div>
                    </div>
                </div>

                <div id="hands">
                    <div class="hand"></div>
                    <div class="hand"></div>
                </div>
            </div>
            <div id="robot-shadow"></div>

        </div>
    </div>

    <div class="contedirRespuestaQuiz">
        <div class="temasBa">
            <div class="temasBa2" >
                <h2><?php echo $datosNombre = $insQuiz->obtenerNombreTema(id: $preguntaActual["tema"]); ?> </h2>
                <div class="preguntaTotal">
                    <p>Pregunta <?php echo $_SESSION["numPreguntaActual"] +1 ?> de 10</p>
                </div>
            </div>
            <div class="rayaa"></div>

            <div class="preguntaTexto">
                <p><?php echo $preguntaActual['pregunta'] ?></p>
            </div>
        </div>
        <form action="" class="formQuiz" method="post">
            <div class="radio-section">
                <div class="radio-list">
                    <div class="radio-item">
                        <input type="radio" name="respuesta" value="A" id="radio1" required>
                        <label for="radio1" class="op1" onclick="seleccionar(this)"> <?php echo htmlspecialchars($preguntaActual['opcion_a']); ?> </label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="respuesta" value="B" id="radio2" required>
                        <label for="radio2" class="op2" onclick="seleccionar(this)"> <?php echo htmlspecialchars($preguntaActual['opcion_b']); ?> </label>
                    </div>
                    <div class="radio-item">
                        <input type="radio" name="respuesta" value="C" id="radio3" required>
                        <label for="radio3" class="op3" onclick="seleccionar(this)"> <?php echo htmlspecialchars($preguntaActual['opcion_c']); ?> </label>
                    </div>
                </div>
            </div>
            <div class="botonQuiz">
                <input type="submit" value="Siguiente" name="siguiente">
            </div>
        </form>



    </div>

</div>



<?php require_once("./app/views/inc/user/footer.php"); ?>
<script>
    function seleccionar(labelSeleccionado) {
        var labels = document.getElementsByTagName("label");
        labels[0].className = "";
        labels[1].className = "";
        labels[2].className = "";

        labelSeleccionado.className = "opcionSeleccionada";

    }

    $(function() {
        $('.chart').easyPieChart({
            size: 160,
            barColor: "#36e617",
            scaleLength: 0,
            lineWidth: 15,
            trackColor: "#525151",
            lineCap: "circle",
            animate: 2000,
        });
    });
</script>
</body>