<?php require_once("./app/views/inc/user/header.php");
$datosRecursos = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "recursos");
$datosRecursos = $datosRecursos->fetchAll();

$datosForos = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "recursos");
$datosForos = $datosForos->fetchAll();

?>

<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan">Cultiva tu Futuro</h2>
        <p class="textoSlogan">Protege el planeta, conserva para el futuro.</p>
    </div>
    <!-- slider que representa a la media tecnica -->
    <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/agricultura.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/bacterias.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/biodiversidad.png"
                    alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/cultivar.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/cultivo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/ecologia.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/planta-de-cultivo.png"
                    alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/respetuoso-del-medio-ambiente.png"
                    alt="">

                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/agricultura.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/bacterias.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/biodiversidad.png"
                    alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/cultivar.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/cultivo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/ecologia.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/planta-de-cultivo.png"
                    alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/respetuoso-del-medio-ambiente.png"
                    alt="">
            </div>
        </div>
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Media técnica: Conservación de recursos naturales</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/2.png" alt="">

            </div>
            <div class="texto-item">
                <h3 class="h3Item">Recursos Naturales</h3>
                <p>La media técnica de recursos naturales se enfoca en la gestión sostenible de recursos
                    como agua, suelo, flora y fauna. Los estudiantes aprenden sobre conservación ambiental,
                    manejo de ecosistemas, legislación ambiental y análisis de recursos naturales. Los temas
                    clave incluyen la conservación del medio ambiente, la gestión sostenible de recursos y
                    la biodiversidad.
                </p>
                <p>Los estudiantes que cursan esta especialidad aprenden sobre conservación ambiental, manejo de
                    ecosistemas, legislación ambiental, técnicas de muestreo y análisis de recursos naturales, entre
                    otros temas relacionados con la biodiversidad y el medio ambiente.</p>

            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/3.png" alt="">
            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Sostenibilidad:</span>
                    Ayuda a conservar los recursos
                    naturales al utilizar métodos que no agotan los ecosistemas.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Eficiencia:</span>
                    Permite un uso más eficiente de los recursos al optimizar
                    la extracción y utilización.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Menor impacto ambiental:</span>
                    Suele generar menos impacto ambiental en comparación con otras técnicas de extracción.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Promoción del desarrollo sostenible:</span>
                    Contribuye al desarrollo sostenible al
                    garantizar la disponibilidad de recursos para las generaciones futuras.
                </p>

            </div>
        </div>

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/4.png" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Costos: </span>
                    En ocasiones, la implementación de la media técnica puede
                    resultar más costosa que otras técnicas.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Complejidad:</span>
                    Requiere de conocimientos especializados y tecnología avanzada para su aplicación correcta.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Limitaciones:</span>
                    Puede haber limitaciones en cuanto a la disponibilidad
                    de ciertos recursos naturales para aplicar esta técnica en todas las situaciones.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Tiempo: </span>
                    En algunos casos, la implementación de la media técnica puede
                    llevar más tiempo que otras técnicas.
                </p>

            </div>
        </div>

        <div class="contendor-item animacion si">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/recursos/5.png" alt="">
            </div>
            <div class="texto-item ">
                <h3 class="h3Item">¿Por qué debería escoger esta media técnica?</h3>
                <p> Si tienes interés en la construcción, disfrutas del trabajo práctico y
                    buscas una carrera con
                    buenas perspectivas laborales, la media técnica de construcción podría
                    ser una excelente
                    elección para ti. Puede ser beneficioso por varias razones: </p>

                <p><i class="fa-solid fa-minus flechaitem"></i><span>Combina teoría y
                        práctica</span></p>
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
    <?php if (empty($datosRecursos)) { ?>
        <p class="h2Novedades">No hay novedades</p>
    <?php } else {
        foreach ($datosRecursos as $novedad) { ?>

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

        <?php foreach ($datosForos as $foro) { ?>
            <div class="foros-item animacion">
                <?php $ruta_img = APP_URL . "app/views/assets/img/user/fotoUser/" . $foro["foro_foto"]

                    ?>
                <div class="datos">
                    <?php if ($foro["foro_foto"] == "" && !is_file($ruta_img)) { ?>
                        <p> <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/defecto.png" alt="">
                            @<?php echo $foro["foro_usuario"] ?></p>
                    <?php } else { ?>
                        <p> <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/<?php echo $foro["foro_foto"] ?>"
                                alt=""> @<?php echo $foro["foro_usuario"] ?></p>
                    <?php } ?>

                </div>
                <div class="fecha">Publicado el <?php echo date("d-m-Y h:i:s A", strtotime($foro["foro_publicado"])) ?>
                </div>
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
        <input type="hidden" name="tecnica" value="recursos">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>



<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>


</body>