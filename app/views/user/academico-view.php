<?php require_once("./app/views/inc/user/header.php");
$datosAcademico = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "academico");
$datosAcademico = $datosAcademico->fetchAll();

$datosForos = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "academico");
$datosForos = $datosForos->fetchAll();

?>


<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan"> Impulsa tu Conocimiento</h2>
        <p class="textoSlogan">Aprende hoy, lidera mañana.</p>
    </div>
    <!-- slider de íconos que representan a la media tecnica -->
    <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/cerebro.png" alt="a">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/estudiando.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/estudiante.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/graduacion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/graduado.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/libro-abierto.png"
                    alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/pensar.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/prueba.png" alt="">

                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/cerebro.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/estudiando.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/estudiante.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/graduacion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/graduado.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/libro-abierto.png"
                    alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/pensar.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/prueba.png" alt="">
            </div>
        </div>
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Académico</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/1.png" alt="">

            </div>
            <div class="texto-item">
                <h3 class="h3Item">Introducción</h3>
                <p>Si estás buscando fomentar la creatividad y la innovación, dejar de lados las técnicas
                    preestablecidas podría abrir nuevas posibilidades y enfoques originales, también puede ser útil
                    cuando se quiere explorar nuevas ideas sin limitaciones.

                    No elegir una media técnica específica puede permitirte pensar de una forma más libre y creativa.
                    Esto puede llevar a soluciones más originales e inesperadas.

                    Al dejar de lado las técnicas, puedes explorar diferentes enfoques y descubrir nuevas formas de
                    abordar un problema.

                    Es una opción valiosa cuando se busca pensar fuera de lo común y romper con la rutina.

                </p>
                <p>No elegir una media técnica específica puede permitirte pensar de una forma más libre y creativa. Esto puede llevar a soluciones más originales e inesperadas.</p>
                <p>Al dejar de lado las técnicas, puedes explorar diferentes enfoques y descubrir nuevas formas de abordar un problema.</p>
            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/2.png" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Fomentar la creatividad:</span>Sin una
                    estructura rígida, los estudiantes tienen la liber
                    tad de pensar de manera más creativa y original.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Motivar la innovación:</span>Al no estar
                    atados a un solo campo técnico,
                    los estudiantes pueden explorar ideas innovadoras de una manera más libre.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Explorar enfoques originales:</span>Esta
                    opción permite a los estudiantes buscar soluciones no
                    convencionales y desarrollar habilidades de pensamiento crítico.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Flexibilidad en el proceso de resolución de
                        problemas: </span>Los estudiantes pueden
                    abordar problemas desde múltiples perspectivas sin las limitaciones de una formación técnica
                    específica.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Desarrollo personal:</span>Los estudiantes
                    pueden dedicarse a áreas de interés personal,
                    lo que puede aumentar la motivación y el compromiso.


                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Adaptabilidad:</span> Al no estar enfocados
                    en una sola disciplina, los estudiantes pueden adaptarse más
                    fácilmente a diferentes situaciones y roles en el futuro.

                </p>
            </div>
        </div>

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/academico/3.png" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Menos oportunidades de prácticas
                        profesionales:</span>Al no estar vinculados a una media-técnica específica,
                    los estudiantes podrían tener menos oportunidades de realizar prácticas profesionales en campos
                    técnicos.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Desventaja competitiva:</span>En
                    comparación con sus compañeros en programas técnicos,
                    los estudiantes académicos pueden estar en desventaja al buscar empleo
                    en campos técnicos específicos.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Falta de estructura o guía clara: </span>La
                    ausencia de una dirección específica puede llevar a la confusión o a
                    la falta de enfoque en los estudios.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Posible falta de objetivos claros:</span>
                    Sin una trayectoria definida, algunos
                    estudiantes pueden tener dificultades para establecer y alcanzar metas concretas.

                </p>

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
    <?php if (empty($datosAcademico)) { ?>
        <p class="h2Novedades">No hay novedades</p>
    <?php } else {
        foreach ($datosAcademico as $novedad) { ?>

            <div class="novedad">
                <div class="img-novedad">
                    <?php if ($novedad["novedades_foto"] == "") { ?>
                        <img class="imgNovedad"
                            src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/novedades/default.png" alt="">
                    <?php } else { ?>
                        <img class="imgNovedad"
                            src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/novedades/<?php echo $novedad["novedades_foto"] ?>"
                            alt="">

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
        <?php if (empty($datosforos)) { ?>
            <p>No hay foros en este momento, te invitamos a dejar tus testimonios sobre esta media técnica</p>
        <?php } else { ?>
            <?php foreach ($datosForos as $foro) { ?>
                <div class="foros-item animacion">
                    <div class="datos">
                        <?php if ($foro["foro_foto"] != "") { ?>
                            <p> <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/<?php echo $foro["foro_foto"] ?>"
                                    alt=""> @<?php echo $foro["foro_usuario"] ?></p>
                        <?php } else { ?>
                            <p> <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/defecto.png" alt="">
                                @<?php echo $foro["foro_usuario"] ?></p>
                        <?php } ?>

                    </div>
                    <div class="fecha">Publicado el <?php echo date("d-m-Y h:i:s A", strtotime($foro["foro_publicado"])) ?>
                    </div>
                    <div class="mensaje"> <?php echo $foro["foro_texto"] ?></div>
                </div>

            <?php }
        } ?>

        <span class="ver">Ver más</span>

    </div>
</section>


<div class="container-comentario container">
    <form action="<?php echo APP_URL; ?>app/ajax/tecnicasAjax.php" class="form-comentario formAjax" method="post">

        <input type="hidden" name="modulo_novedades" value="registrarForo">
        <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"] ?>">
        <input type="hidden" name="foto" value="<?php echo $_SESSION["foto"] ?>">
        <input type="hidden" name="tecnica" value="academico">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>

<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>

</body>