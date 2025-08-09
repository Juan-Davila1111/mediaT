<?php
require_once("./app/views/inc/user/header.php");
$datosConstruccion  = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "construccion");
$datosConstruccion = $datosConstruccion->fetchAll();

$datosForos  = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "construccion");
$datosForos = $datosForos->fetchAll();

?>
<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan">Construyendo el futuro</h2>
        <p class="textoSlogan">Construimos el mañana, ladrillo a ladrillo.</p>
    </div>
    <!-- slider que representa a la media tecnica -->
    <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assest/img/user/media-tecnica/construccion/bajo-construccion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/casco.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/cemento.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/lapiz.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/pala.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/en-construccion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/pared-de-ladrillo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/serrucho.png" alt="">

                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/bajo-construccion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/casco.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/cemento.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/lapiz.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/pala.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/en-construccion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/pared-de-ladrillo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/serrucho.png" alt="">
            </div>
        </div>
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Media técnica de Construcción de Edificaciones</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/3.png" alt="">
            </div>
            <div class="texto-item">
                <h3 class="h3Item">Construcción</h3>
                <p>La formación en media técnica de construcción es un programa educativo que
                    combina conocimientos
                    teóricos y prácticos en el ámbito de la construcción. Los estudiantes
                    que cursan esta
                    especialidad adquieren habilidades en diversas áreas, incluyendo
                    materiales de construcción,
                    técnicas de edificación, interpretación de planos y normativas de
                    seguridad. Esta formación
                    integral les permite desarrollar competencias clave para desempeñarse
                    eficientemente en el
                    sector de la construcción.</p>
            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/ventajasConstruccion.png" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Variedad de
                        especializaciones:</span>Dentro de la construcción hay diversas
                    áreas en las que se pueden
                    especializar, lo que brinda opciones para desarrollar una carrera a
                    medida.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Formación
                        práctica:</span>DeLos
                    estudiantes adquieren habilidades prácticas que son valoradas en la
                    industria de la
                    construcción.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Posibilidad de
                        emprendimiento:</span>Con los conocimientos adquiridos, los
                    graduados pueden emprender sus
                    propios proyectos en el área de la construcción.
                    Con los conocimientos adquiridos, los graduados pueden emprender sus
                    propios proyectos en el
                    área de la construcción.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Demanda
                        laboral:</span>Existe una
                    demanda constante de profesionales en el sector de la construcción, por
                    lo que las oportunidades
                    laborales suelen ser amplias.
                </p>

            </div>
        </div>

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/desventajasConstruccion.png" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Riesgos
                        laborales:</span>Dentro de la
                    Al trabajar en obras de construcción, los profesionales están expuestos
                    a ciertos riesgos
                    laborales que deben tomarse en cuenta.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Actualización
                        constante:</span>La
                    industria de la construcción está en constante evolución, por lo que es
                    necesario mantenerse
                    actualizado en cuanto a normativas, tecnología y tendencias.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Entorno laboral
                        exigente:</span>la
                    industria de la construcción puede ser exigente en términos de horarios
                    y condiciones laborales.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Competencia:</span>Debido
                    a la demanda
                    laboral, puede haber competencia en el mercado laboral entre
                    profesionales del sector.

                </p>

            </div>
        </div>

        <div class="contendor-item animacion si">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/construccion/elejirnosConstruccion.png" alt="">

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
    <?php if (empty($datosConstruccion)) { ?>
        <p class="h2Novedades">No hay novedades</p>
        <?php } else {
        foreach ($datosConstruccion as $novedad) { ?>

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
<h2 class="h2Tecnica" id="foro">Foros</h2>
<section class="container foros">
    <div class="container foros-container">
        <?php if ($datosForos == "") { ?>
            <p>No hay foros en este momento, te invitamos a dejar tus testimonios sobre esta media técnica</p>
        <?php } else { ?>
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
        <input type="hidden" name="tecnica" value="construccion">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>

<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>
</body>