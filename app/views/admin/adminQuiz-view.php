<?php require_once("./app/views/inc/admin/header.php"); ?>
<?php require_once("./app/views/inc/admin/aside.php");


use app\controllers\quizController;

$insQuiz = new quizController();

$datosQuiz = $insLogin->seleccionarDatosTodo("temas");
$datosQuiz = $datosQuiz->fetchAll();

$datosPregunta = $insQuiz->obtenerTotalPreguntas();
$datosTema = $insQuiz->obtenerCategorias();

$todasPreguntas = $insQuiz->obetenerTodasLasPreguntas();



?>
<main class="mainTotal">
    <h1 class="titulo">Quiz</h1>

    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>

    <div class="contenedor-tecnicas">
        <div class="tab_box">
            <button class="tab_btn activo">Temas</button>
            <button class="tab_btn">Nueva pregunta</button>
            <button class="tab_btn">Listado de preguntas</button>
            <div class="linea"></div>
        </div>

        <div class="contenido-box">
            <div class="contenido activo tema">
                <div class="cajasTecnicas">
                    <div class="caja-tecnica total">
                        <p>Total</p>
                        <span><?php echo $datosPregunta ?></span>
                        <p>Preguntas</p>
                    </div>

                    <?php foreach ($datosTema as $tema) { ?>
                        <div class="caja-tecnica">
                            <p><?php echo $datosNombre = $insQuiz->obtenerNombreTema($tema["tema"]); ?></p>
                            <span><?php echo $datosCategoria = $insQuiz->totalPreguntasPorCategoria($tema["tema"]); ?></span>
                            <p>Preguntas</p>
                        </div>
                    <?php } ?>

                </div>

            </div>

            <div class="contenido ">
                <form class="quizForm formAjax" action="<?php echo APP_URL ?>app/ajax/quizAjax.php" method="post">
                    <input type="hidden" name="modulo_quiz" value="agregarPreguntas">

                    <div class="fila">
                        <label for="tema">Tema:</label>

                        <div class="temaCrear">
                            <select id="tema" name="tema">
                                <?php foreach ($datosQuiz as $quiz) { ?>
                                    <option value="<?php echo  $quiz['tema_id'] ?>">
                                        <?php echo $quiz['nombre'] ?>
                                    </option>
                                <?php } ?>

                            </select>

                            <div class="crear">
                                <span class="material-symbols-sharp crear">
                                    add_circle
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class="fila">
                        <label class="" for="pregunta">Pregunta:</label>
                        <input type="text" class="pregunta" name="pregunta">
                    </div>

                    <div class="opciones">
                        <div class="opcion">
                            <label for="">Opción A:</label>
                            <input type="text" name="opcion_a">
                        </div>

                        <div class="opcion">
                            <label for="">Opcion B:</label>
                            <input type="text" name="opcion_b">
                        </div>
                        <div class="opcion">
                            <label for="">Opcion C:</label>
                            <input type="text" name="opcion_c">
                        </div>
                    </div>

                    <div class="opcion">
                        <label for="">Correcta</label>
                        <select name="correcta" id="" class="correcta">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>

                    <div class="fila submit">
                        <button type="submit">Guardar pregunta</button>
                    </div>

                </form>
            </div>

            <div class="contenedorCrear">
                <span class="material-symbols-sharp cerrar">
                    close
                </span>
                <div class="textoTema">
                    <form action="<?php echo APP_URL ?>app/ajax/quizAjax.php" class="formAjax" method="post">
                        <p>Agregar Nuevo tema</p>
                        <input type="text" placeholder="Nuevo tema" name="nombreTema">
                        <input type="hidden" name="modulo_quiz" value="agregar">
                        <input type="file" name="foto" accept=".jpg, .png, .jpeg">
                        <button type="submit" class="btnCrearTema">Guargar tema</button>
                    </form>
                </div>
            </div>

            <div class="contenido ">
                <div class="contenedorPreguntas">
                    <?php foreach ($todasPreguntas as $preguntas) { ?>

                        <div class="contenedorPregunta">
                            <div class="temaIcons">
                                <span class="tipoTema"><?php echo $datosNombre = $insQuiz->obtenerNombreTema($preguntas["tema"]); ?></span>
                                <div class="iconosOp">
                                    <form action="">
                                        <a href="<?php echo APP_URL?>editarPregunta/<?php echo $preguntas["id"] ?>"><span class="material-symbols-sharp">edit</span></a>
                                    </form>

                                    <form class="quizForm formAjax" action="<?php echo APP_URL ?>app/ajax/quizAjax.php" method="post">
                                        <input type="hidden" name="modulo_quiz" value="eliminarPregunta">
                                        <input type="hidden" name="quiz_id" value="<?php echo $preguntas["id"] ?>">


                                        <label for="">
                                            <button type="submit" class="btnNose">
                                                <span class="material-symbols-sharp">delete</span>
                                            </button>
                                        </label>
                                    </form>

                                </div>
                            </div>
                            <div class="preguntaRes">
                                <p><?php echo $preguntas["pregunta"] ?></p>
                                <div class="respuetas">
                                    <div class="respuesta">
                                        <div class="respuestaOpcion <?php echo ($preguntas["correcta"] == "A") ? "opcionCorrecta" : "" ?>"> <span>A</span><?php echo $preguntas["opcion_a"] ?></div>
                                    </div>

                                    <div class="respuesta">
                                        <div class="respuestaOpcion <?php echo ($preguntas["correcta"] == "B") ? "opcionCorrecta" : "" ?>"> <span>B</span> <?php echo $preguntas["opcion_b"] ?>
                                        </div>
                                    </div>

                                    <div class="respuesta">
                                        <div class="respuestaOpcion <?php echo ($preguntas["correcta"] == "C") ?  "opcionCorrecta" : "" ?>"> <span>C</span> <?php echo $preguntas["opcion_c"] ?> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

            </div>
        </div>

        <div class="right">
            <?php require_once("./app/views/inc/admin/info.php") ?>

        </div>


    </div>
</main>
<div>
    <script src="<?php echo  APP_URL ?>/app/views/assets/js/admin/tablasAjax.js"></script>
    <script src="<?php echo APP_URL ?>app/views/assets/js/admin/header.js"></script>
    <script src="<?php echo APP_URL ?>/app/views/assets/js/admin/quiz.js"></script>

    </body>