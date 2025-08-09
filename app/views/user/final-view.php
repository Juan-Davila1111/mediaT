<?php require_once("./app/views/inc/user/header.php");

use app\controllers\quizController;
use app\controllers\userController;

// echo $_SESSION["quiz_ganado2"];

$insUsuarioA = new userController();

$insQuiz = new quizController();
$quizesParaCertificado = 5;
$id = $_SESSION["id"];

$consulta_usuario_quiz = $insQuiz->seleccionarDatos("Unico", "tbl_usuarios", "usuarios_id", $id);
$consulta_usuario_quiz = $consulta_usuario_quiz->fetch();
$quizesRestantes = $consulta_usuario_quiz["usuario_quiz_ganado"];

if ($consulta_usuario_quiz && !empty($consulta_usuario_quiz["usuario_quiz_ganado"])) {

    $completados = explode(',', $consulta_usuario_quiz["usuario_quiz_ganado"]);
    $quizzes_ganados = count(array_filter($completados));
} else {
    $quizzes_ganados = 0;
}
$quizzes_ganados = $consulta_usuario_quiz["usuario_quiz_ganado"] + 1;


// Verificar si el usuario ganó o perdió
if ($_SESSION["score"] >= 75) {
    if (!isset($_SESSION['quiz_ganado'])) {
        $usuario_datos_up = [
            [
                "campo_nombre" => "usuario_quiz_ganado",
                "campo_marcador" => ":Ganado",
                "campo_valor" => $quizzes_ganados

            ]

        ];

        $condicion = [
            "condicion_campo" => "usuarios_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];
        $actualizar = $insUsuarioA->actualizarDatos("tbl_usuarios", $usuario_datos_up, $condicion);
        $_SESSION['quiz_ganado'] = "true";
    }

    $mensajeResultado = "¡Felicidades! Has ganado el quiz.";


    // Recomendaciones para puntajes altos
    $recomendaciones = "Tu puntaje indica un gran conocimiento en el área. Te sugerimos que continúes explorando temas avanzados y mantengas tu conocimiento actualizado con los últimos avances tecnológicos.";
} else {
    $mensajeResultado = "Lo siento, no has ganado el quiz esta vez.";

    // Recomendaciones para puntajes bajos
    $recomendaciones = "Considera revisar los temas en los que te sientes menos seguro. Puede ser útil estudiar más sobre las áreas que te resultaron difíciles para mejorar tus habilidades.";
}

$quizesRestantes = max(0, $quizesParaCertificado - $quizzes_ganados);


$consulta_usuario_quiz = $insQuiz->seleccionarDatos("Unico", "tbl_usuarios", "usuarios_id", $id);
$consulta_usuario_quiz = $consulta_usuario_quiz->fetch();

if ($consulta_usuario_quiz && !empty($consulta_usuario_quiz["usuario_quiz"])) {

    $completados = explode(',', $consulta_usuario_quiz["usuario_quiz"]);
    $quizzes_completados = count(array_filter($completados));
} else {
    $quizzes_completados = 0;
}


$quizzes_completados = $consulta_usuario_quiz["usuario_quiz"] + 1;


if (!isset($_SESSION['quiz_ganado2'])) {
    $usuario_datos_up = [
        [
            "campo_nombre" => "	usuario_quiz",
            "campo_marcador" => ":Completado",
            "campo_valor" => $quizzes_completados

        ]

    ];

    $condicion = [
        "condicion_campo" => "usuarios_id",
        "condicion_marcador" => ":ID",
        "condicion_valor" => $id
    ];
    $actualizar = $insUsuarioA->actualizarDatos("tbl_usuarios", $usuario_datos_up, $condicion);
    $_SESSION['quiz_ganado2'] = "true";
}

// echo $consulta_usuario_quiz["usuario_quiz_ganado"];

if ($consulta_usuario_quiz["usuario_quiz_ganado"] >= 5) {
    $_SESSION["permiso"] = "true";
    $fechaActual = date("Y-m-d");
    $_SESSION['fecha_actual'] = $fechaActual;
} else {
    $_SESSION["permiso"] = "false";
}


?>
<div class="container-final" id="container-final">
    <div class="infoQuiz">
        <div class="datosQuiz">
            <h2>Quiz media T</h2>
            <p>Nombre: <span><?php echo $_SESSION["nombre"] ?></span> </p>
            <p>Apellido: <span><?php echo $_SESSION["apellido"] ?></span> </p>
            <p>Usuario: <span><?php echo $_SESSION["usuario"] ?></span></p>
            <p>Fecha: <span><?php echo $_SESSION["fecha"] ?></span></p>
        </div>
        <div class="score">
            <div class="box">
                <div class="chart" data-percent="<?php echo $_SESSION['score'] ?>">
                    <?php echo $_SESSION['score'] ?>%
                </div>
                <h2>Puntaje</h2>
            </div>
        </div>
    </div>

    <div class="correctaInco">
        <div class="cajaCorrec">
            <h2>Total de preguntas</h2>
            <p>10</p>
        </div>

        <div class="cajaCorrec">
            <h2 class="corre"><i class="fa-solid fa-check"></i>Correctas</h2>
            <p><?php echo $_SESSION['correctas'] ?></p>
        </div>

        <div class="cajaCorrec">
            <h2 class="inco"><i class="fa-solid fa-x"></i>Incorrectas</h2>
            <p><?php echo $_SESSION['incorrectas'] ?></p>
        </div>
    </div>

    <div class="informacionRes">
        <h2><?php echo $mensajeResultado; ?></h2>
        <p><?php echo $recomendaciones; ?></p>

        <h3>Información sobre los Quizzes</h3>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Valor</t>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quizzes ganados hasta ahora</td>
                    <td><?php echo $quizzes_ganados; ?></td>
                </tr>
                <tr>
                    <td>Quizzes necesarios para obtener el certificado</td>
                    <td><?php echo $quizesParaCertificado; ?></td>
                </tr>
                <tr>
                    <td>Quizzes restantes para obtener el certificado</td>
                    <td><?php echo $quizesRestantes; ?></td>
                </tr>

                <tr>
                    <td>Quizzes completados hasta ahora</td>
                    <td><?php echo $quizzes_completados; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
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
            size: 180,
            barColor: "#158fd7",
            scaleLength: 0,
            lineWidth: 15,
            trackColor: "#525151",
            lineCap: "circle",
            animate: 2000,
        });
    });
</script>
</body>