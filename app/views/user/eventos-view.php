<?php require_once("./app/views/inc/user/header.php");
$datosEventos = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "eventos");
$datosEventos = $datosEventos->fetchAll();

$datosForos  = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "eventos");
$datosForos = $datosForos->fetchAll();
?>


<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan">Diseñando Sueños</h2>
        <p class="textoSlogan">Creamos momentos memorables, cada detalle cuenta.</p>
    </div>
    <!-- slider que representa a la media tecnica -->
    <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/cartelera.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/carteleras.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/globos-de-aire.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/guirnal.apng" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/guirnaldas.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/luces-de-navidad.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/pelota-de-navidad.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/pintar-huevo.png" alt="">

                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/cartelera.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/carteleras.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/globos-de-aire.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/guirnalda.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/guirnaldas.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/luces-de-navidad.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/pelota-de-navidad.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/pintar-huevo.png" alt="">
            </div>
        </div>
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Media técnica de Operación de Eventos</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/eventos2.jpg" alt="">
            </div>
            <div class="texto-item">
                <h3 class="h3Item">Eventos</h3>
                <p>La media técnica operación de eventos es una formación educativa que, de una manera organizada reúne a un determinado número de personas en tiempo y lugar preestablecidos, que desarrollarán y compartirán una serie de actividades a fines de un mismo objetivo para estímulo del comercio, la industria, el intercambio social y la cultura general.</p>
                <p>El principal objetivo de un evento es congregar a un determinado grupo de personas para que puedan disfrutar de un acontecimiento y socializar. Para que la convocatoria sea efectiva, el evento debe tener un valor emocional, económico o educativo para los participantes.</p>


            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/eventos1.jpg" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Alto porcentaje de empleabilidad:</span>Los eventos reúnen a personas con intereses, objetivos o antecedentes comunes, lo que facilita la creación de redes y el fortalecimiento de relaciones personales y profesionales.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Oportunidades de Marketing y Promoción:</span>Tanto a nivel nacional como internacional, la organización de eventos es una profesión con multitud de salidas profesionales gracias a la especialización en tres sectores: Organización de eventos,
                    Protocolo, Elecciones, institucionales

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Socializar:</span>Estarás en contacto con mucha gente de manera que tu profesionalidad aumentará día a día.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Aumento de ganancias:</span>Con tu profesión podrás ir creciendo en clientes y en ingresos tanto como desees.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Orgullo de ti mismo:

                    </span>Ver el evento concluido y marchando sobre ruedas suele brindar una profunda satisfacción a quienes han estado a cargo de su planificación y desarrollo.
                </p>

            </div>
        </div>

        <div class="contendor-item animacion">
            <div class="img-item">
            <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/eventos3.jpg" alt="">
                
            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Costos Elevados:

                    </span>Organizar un evento puede ser costoso, considerando gastos en alquiler de espacio, catering, decoración, personal, y marketing.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Requiere Mucho Tiempo y Esfuerzo:</span>La planificación y ejecución de un evento requiere una gran cantidad de tiempo, esfuerzo y recursos humanos. Desde la conceptualización hasta la finalización, los detalles logísticos, la coordinación de proveedores y la gestión de asistentes pueden ser abrumadores.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Riesgo de Fracaso:</span>
                    Hay varios factores que pueden contribuir al fracaso de un evento, tales como una mala gestión, baja asistencia, problemas técnicos o mal tiempo.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Impacto Ambiental:

                    </span>Debido
                    Los eventos pueden tener un impacto ambiental significativo, debido a la generación de residuos, el consumo de energía y el uso de recursos.

                </p>

            </div>
        </div>

        <div class="contendor-item animacion si">
            <div class="img-item">
            <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/eventos/eventos4.jpg" alt="">
            
            </div>
            <div class="texto-item ">
                <h3 class="h3Item">¿Por qué debería escoger esta media técnica?</h3>
                <p> Si tienes interés en eventos, disfrutas del trabajo práctico y en equipo
                    buscas una carrera con
                    buenas perspectivas y sobre todo con un buen trabajo en equipo, la media técnica de eventos podría
                    ser una excelente
                    elección para ti. Puede ser beneficioso por varias razones: </p>

                <p><i class="fa-solid fa-minus flechaitem"></i><span>Combina teoría y
                        práctica</span></p>
                <p><i class="fa-solid fa-minus flechaitem"></i><span>Oportunidades
                        laborales</span></p>
                <p><i class="fa-solid fa-minus flechaitem"></i><span>Ayuda con las relaciones interpersonales</span></p>
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
    <?php if (empty($datosEventos)) { ?>
        <p class="h2Novedades">No hay novedades</p>
        <?php } else {
        foreach ($datosEventos as $novedad) { ?>

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
        <input type="hidden" name="tecnica" value="eventos">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>


<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>


</body>