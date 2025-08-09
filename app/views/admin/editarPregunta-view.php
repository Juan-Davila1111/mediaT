<?php require_once("./app/views/inc/admin/header.php"); ?>
<?php require_once("./app/views/inc/admin/aside.php");


use app\controllers\quizController;

$insQuiz = new quizController();
$id = $insLogin->limpiarCadena($url[1]);
$pregunta = $insLogin->seleccionarDatos("Unico", "preguntas", "id", $id);

$datosQuiz = $insLogin->seleccionarDatosTodo("temas");
$datosQuiz = $datosQuiz->fetchAll();




?>
<main class="mainTotal">
    <h1 class="titulo">Editar Quiz</h1>

    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>
    <?php if ($pregunta->rowCount() == 1) {
        $pregunta = $pregunta->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="contenedor-tecnicas">
        <div class="contenido-box">

            <div class="contenido activo ">
                <form class="quizForm formAjax" action="<?php echo APP_URL ?>app/ajax/quizAjax.php" method="post">
                    <input type="hidden" name="modulo_quiz" value="editarPregunta">
                    <input type="hidden" name="quiz_id" value="<?php echo $id ?>">

                    <div class="fila">
                        <label for="tema">Tema:</label>

                        <div class="temaCrear">
                            <select id="tema" name="tema">
                                <?php foreach ($datosQuiz as $quiz) { ?>
                                    <?php if ($quiz['tema_id'] == $pregunta['tema']) { ?>
                                        <option value="<?php echo  $quiz['tema_id'] ?>" selected>
                                            <?php echo $quiz['nombre'] ?>
                                        </option>
                                    <?php } else { ?>
                                        <option value="<?php echo $quiz['tema_id'] ?>">
                                            <?php echo $quiz['nombre'] ?>
                                        </option>
                                    <?php } ?>

                                <?php } ?>

                            </select>

                        </div>

                    </div>

                    <div class="fila">
                        <label class="" for="pregunta">Pregunta:</label>
                        <input type="text" class="pregunta" name="pregunta" value="<?php echo $pregunta["pregunta"] ?>">
                    </div>

                    <div class="opciones">
                        <div class="opcion">
                            <label for="">Opción A:</label>
                            <input type="text" name="opcion_a" value="<?php echo $pregunta["opcion_a"] ?>">
                        </div>

                        <div class="opcion">
                            <label for="">Opcion B:</label>
                            <input type="text" name="opcion_b" value="<?php echo $pregunta["opcion_b"] ?>">
                        </div>
                        <div class="opcion">
                            <label for="">Opcion C:</label>
                            <input type="text" name="opcion_c" value="<?php echo $pregunta["opcion_c"] ?>">
                        </div>
                    </div>

                    <div class="opcion">
                        <label for="">Correcta</label>
                        <select name="correcta" id="" class="correcta">

                            <option value="A" <?php if ($pregunta['correcta'] == 'A') {
                                                    echo "selected";
                                                } ?>>A</option>
                            <option value="B" <?php if ($pregunta['correcta'] == 'B') {
                                                    echo "selected";
                                                } ?>>B</option>
                            <option value="C" <?php if ($pregunta['correcta'] == 'C') {
                                                    echo "selected";
                                                } ?>>C</option>
                        </select>
                    </div>

                    <div class="fila submit">
                        <button type="submit">Editar pregunta</button>
                    </div>

                </form>
            </div>

            <div class="contenedorCrear">
                <span class="material-symbols-sharp cerrar">
                    close
                </span>
            </div>


        </div>

        <div class="right">
            <?php require_once("./app/views/inc/admin/info.php") ?>

        </div>


    </div>

    <?php }else {?>
       <?php  require_once("./app/views/inc/admin/alertaDatos.php"); ?>

    <?php }?>


</main>
<div>
    <script src="<?php echo  APP_URL ?>/app/views/assets/js/admin/tablasAjax.js"></script>
    <script src="<?php echo APP_URL ?>app/views/assets/js/admin/header.js"></script>

    </body>