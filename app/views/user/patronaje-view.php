<?php require_once("./app/views/inc/user/header.php");
$datosPatronaje = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "patronaje");
$datosPatronaje = $datosPatronaje->fetchAll();

$datosForos  = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "patronaje");
$datosForos = $datosForos->fetchAll();
?>

<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan">Construyendo el futuro</h2>
        <p class="textoSlogan">Diseño con precisión, moda con excelencia.</p>
    </div>
    <!-- slider que representa a la media tecnica -->
    <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/disenador-de-moda.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/azul.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/diseno-de-moda.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/maquina-de-coser.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/muneca.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/regla.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/tijeras.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/vestido.png" alt="">

                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/disenador-de-moda.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/azul.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/diseno-de-moda.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/maquina-de-coser.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/muneca.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/regla.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/tijeras.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/vestido.png" alt="">

            </div>
        </div>
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Media Técnica: Patronaje Industrial de Prendas de Vestir</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/1.png" alt="">

            </div>
            <div class="texto-item">
                <h3 class="h3Item">Patronaje</h3>
                <p>El patronaje es el proceso de crear patrones para confeccionar prendas de vestir. Un patrón es una plantilla o molde que se utiliza como guía para cortar las piezas de tela que luego se coserán para formar una prenda. Este proceso es esencial en la industria de la moda y la costura, ya que garantiza que las piezas de ropa tengan la forma y el tamaño correctos.</p>
                <p><span>Creatividad:</span>  Aunque sigue una estructura técnica, la media técnica de patronaje también deja espacio para la creatividad y la experimentación en el diseño de moda.</p>
                <p><span>Mediciones precisas:</span> Requiere tomar medidas exactas del cuerpo para garantizar un ajuste adecuado en las prendas finales.</p>
                <p><span>Patrón base: </span>La media técnica de patronaje se basa en la creación de un patrón base que servirá como punto de partida para diseñar diferentes prendas.</p>
            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/2.png" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Creatividad</span>Te permite expresar tu creatividad al diseñar y crear patrones únicos dentro de la industria de la moda.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Precisión</span>Aprenderás a trabajar con medidas exactas y detalles técnicos, lo cual es crucial en la moda y la confección.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Oportunidades laborales</span>Existe una demanda continua de profesionales con habilidades de patronaje en la industria de la moda, y con la suficiente habilidad podrás escalar más alto y tendrás más posibilidades.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Independencia</span>Puedes convertirte en un(a) profecional independiente y ofrecer servicios de diseño y patronaje
                </p>

            </div>
        </div>

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/3.png" alt="">
            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Curva de aprendizaje</span>El patronaje es un campo técnico que requiere tiempo y paciencia para dominar. Comprender las técnicas de diseño, las porporciones del cuerpo humano y las especificaciones de la industria puede llevar tiempo y práctica constante.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Costos</span>Equiparse con los materiales necesarios para el patronaje, como papel para patrones, herramientas de medición, y máquinas de coser, puede ser costoso.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Competencia en la industria</span>la
                    La industria de la moda es altamente competitiva y encontrar trabajo como patronista puede ser desafiante, especialmente al principop de tu carrera.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Tendencias cambiantes</span> Las tendencias en moda evolucionan rápidamente, lo que significa que como patronista, es importante estar constantemente actualizado y adaptarse a los cambios en el mercado

                </p>

            </div>
        </div>

        <div class="contendor-item animacion si">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/patronaje/4.png" alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">¿Por qué debería escoger esta media técnica?</h3>
                <p> Si tienes interés en patronaje disfrutas del trabajo práctico y
                    buscas una carrera con
                    buenas perspectivas dificiles laborales, la media técnica de patronaje podría
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
    <?php if (empty($datosPatronaje)) { ?>
        <p class="h2Novedades">No hay novedades</p>
        <?php } else {
        foreach ($datosPatronaje as $novedad) { ?>

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
        <input type="hidden" name="tecnica" value="patronaje">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>


<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>

</body>