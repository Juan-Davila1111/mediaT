<?php require_once("./app/views/inc/user/header.php");
$datosFitnes = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "fitnes");
$datosFitnes = $datosFitnes->fetchAll();

$datosForos  = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "fitnes");
$datosForos = $datosForos->fetchAll();
?>

<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan">Transformando Cuerpos</h2>
        <p class="textoSlogan">Transforma tu energía, ¡únete al ritmo del fitness!</p>
    </div>
        <!-- slider que representa a la media tecnica -->
        <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/aplicacion-de-fitness.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/aptitud-fisica.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/aptitud-virtual.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/corriendo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/hacer-subir.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/mujer.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/rutina-de-ejercicio.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/yoga.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/aptitud-virtual.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/corriendo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/hacer-subir.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/mujer.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/rutina-de-ejercicio.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/yoga.png" alt="">
            </div>
        </div>
                
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Media técnica de Ejecución de clases grupales orientadas al Fitness</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/fitnes1.png" alt="">
            </div>
            <div class="texto-item">
                <h3 class="h3Item">Fitness</h3>
                <p>El objetivo principal se refiere a un estilo de vida activo y saludable que incluye la práctica regular de ejercicio físico, una alimentación balanceada y saludable, y hábitos que promueven el bienestar general. Es una forma de cuidar tu cuerpo y mente para mantenerlos en óptimas condiciones y prevenir enfermedades. 
                </p>
                <p>
                Entre los beneficios que se tienen al llevar a cabo, este estilo de vida es la mejora de la capacidad cardiorrespiratoria, la fuerza, la flexibilidad y la composición corporal, así como la coordinación, la agilidad, el equilibrio y la velocidad.
                </p>
                <p>Aquellas personas que practican el fitness en sus vidas son menos propensas a padecer de enfermedades como estrés, ansiedad, depresión, fatiga e insomnio, además de prevenir otras enfermedades del corazón, cerebrovasculares y diabetes.</p>
            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/fitnes2.jpg" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Mejora de la salud física y mental:</span>
                    Este estilo de vida activo que mejora tanto la salud física como mental,
                    fortaleciendo el cuerpo y mejorando el estado de ánimo.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Aumento de la energía y vitalidad:</span>

                    A través de programas de entrenamiento diseñados, se incrementa la energía y la vitalidad, permitiendo a los
                    estudiantes sentirse más enérgicos y alertas en su día a día.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Fortalecimiento de músculos y huesos: </span>

                    Los programas de Fitness incluyen ejercicios que fortalecen los músculos y aumentan la densidad ósea,
                    contribuyendo a una mejor salud
                    musculoesquelética a largo plazo.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Reducción del estrés y la ansiedad:</span>
                    El ejercicio físico regular reduce los niveles de estrés y ansiedad, promoviendo un estado de bienestar
                    emocional y
                    mental entre los practicantes de Fitness.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Fomento de hábitos saludables: </span>
                    Se aprende hábitos de vida saludables que incluyen una
                    nutrición adecuada y la importancia del descanso,
                    contribuyendo a un bienestar integral.
                </p>

            </div>
        </div>
<br>
<br>
        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/fitnes2.jpg" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> </span>
                    Posible riesgo de lesiones si no se practica el ejercicio con la técnica adecuada.


                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span></span>
                    Necesidad de tiempo y dedicación para mantener una rutina fitness.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span></span>
                    Costos asociados al equipamiento.


                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> </span>
                    Al enfocarse principalmente en el fitness, los estudiantes podrían descuidar el desarrollo
                    de otras habilidades académicas o
                    prácticas que son igualmente importantes para su desarrollo integral.
                </p>

            </div>
        </div>

        <div class="contendor-item animacion si">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/fitnes/ftines-3.jpg" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">¿Por qué debería escoger esta media técnica?</h3>
                <p> Si tienes interés en la construcción, disfrutas del trabajo práctico y
                    buscas una carrera con
                    buenas perspectivas laborales, la media técnica de construcción podría
                    ser una excelente
                    elección para ti. Puede ser beneficioso por varias razones: </p>

                <p><i class="fa-solid fa-minus flechaitem"></i><span>Mejora en tu salud general:</span>El ejercicio regular y una alimentación saludable pueden ayudarte a prevenir enfermedades.

            </p>
                <p><i class="fa-solid fa-minus flechaitem"></i><span>Oportunidades
                        laborales</span></p>
                <p><i class="fa-solid fa-minus flechaitem"></i><span>Impacto en la
                        sociedad</span></p>
                <p><i class="fa-solid fa-minus flechaitem"></i><span>Desarrollo de
                        habilidades</span></p>
                <p><i class="fa-solid fa-minus flechaitem"></i><span>Posibilidad de
                        especialización</span></p>

            </div>
        </div>

    </div>

</main>
<h2 class="h2Novedades">Novedades</h2>
<section class="container novedades-media">

    <div class="contenedor-img-novedad">
        <img src="../assets/img/user/media-tecnica/construccion/elejirnosConstruccion.png">
        <i id="iSalir" class="fa-solid fa-xmark"></i>
    </div>
    <?php if (empty($datosFitnes)) { ?>
        <p class="h2Novedades">No hay novedades</p>
        <?php } else {
        foreach ($datosFitnes as $novedad) { ?>

            <div class="novedad">
                <div class="img-novedad">
                    <?php if ($novedad["novedades_foto"] == "") { ?>
                        <img class="imgNovedad" src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/novedades/default.png" alt="">
                    <?php } else { ?>
                        <img class="imgNovedad" src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/novedades/<?php echo $novedad["novedades_foto"] ?>" alt="">

                    <?php } ?>

                </div>

                <div class="texto-novedad">
                    <span class="fecha-novedad"><?php echo $novedad["novedades_fecha"] ?></span>
                    <h3 class="h3Novedad"><?php echo $novedad["novedades_titulo"] ?></h3>
                    <p><?php echo $novedad["novedades_texto"] ?></p>
                    <div class="leer"> <span>Leer más</span></div>

                </div>
            </div>
    <?php }
    } ?>
</section>

<!-- Foros de la media tecnica -->
<h2 class="h2Tecnica">Foros</h2>
<section class="container foros">
    <div class="container foros-container">
        <?php foreach ($datosForos as $foro) { ?>
            <div class="foros-item animacion">
                    <?php $ruta_img = APP_URL . "app/views/assets/img/user/fotoUser/" . $foro["foro_foto"]
                    
                    ?>
                    <div class="datos">
                        <?php if ($foro["foro_foto"] == "" && !is_file($ruta_img)) { ?>
                            <p> <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/defecto.png" alt=""> @<?php echo $foro["foro_usuario"] ?></p>
                            <?php } else { ?>
                                <p> <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/<?php echo $foro["foro_foto"] ?>" alt=""> @<?php echo $foro["foro_usuario"] ?></p>
                        <?php } ?>

                    </div>
                    <div class="fecha">Publicado el <?php echo  date("d-m-Y h:i:s A", strtotime($foro["foro_publicado"]))  ?></div>
                    <div class="mensaje"> <?php echo $foro["foro_texto"] ?></div>
                </div>

        <?php } ?>

        <span class="ver">Ver más</span>

    </div>
</section>


<div class="container-comentario container">
    <form action="<?php echo APP_URL; ?>app/ajax/tecnicasAjax.php" class="form-comentario formAjax" method="post">

        <input type="hidden" name="modulo_novedades" value="registrarForo">
        <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"] ?>">
        <input type="hidden" name="foto" value="<?php echo $_SESSION["foto"] ?>">
        <input type="hidden" name="tecnica" value="Fitnes">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>




<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>


</body>