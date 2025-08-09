<?php require_once("./app/views/inc/user/header.php");
$datosElectronica  = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "electronica");
$datosElectronica = $datosElectronica->fetchAll();

$datosForos  = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "electronica");
$datosForos = $datosForos->fetchAll();
?>
<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan">Encendiendo mentes</h2>
        <p class="textoSlogan">Tecnología impecable, rendimiento garantizado.</p>
    </div>
    <!-- slider que representa a la media tecnica -->
    <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/apagar.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/cigarro-electronico.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/circuito-electrico.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/circuito.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/firma-electronica.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/luz-de-tungsteno.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/torre-de-pc.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/upc.png">

                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/apagar.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/cigarro-electronico.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/circuito-electrico.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/circuito.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/firma-electronica.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/luz-de-tungsteno.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/torre-de-pc.png">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/upc.png">

            </div>
        </div>
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Media técnica: Mantenimiento y Ensamble de Equipos Electrónicos</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/1.png">
            </div>
            <div class="texto-item">
                <h3 class="h3Item">Electrónica</h3>
                <p>La media técnica de electrónica es una formación educativa que combina conocimientos teóricos y
                    prácticos en el área de la electrónica. Es una excelente opción para aquellos interesados en el
                    funcionamiento de dispositivos electrónicos y en el diseño de sistemas eléctricos.

                    Los estudiantes que cursan esta especialidad aprenden sobre circuitos eléctricos, componentes
                    electrónicos, sistemas digitales, telecomunicaciones. En esta ocupación se abordan los
                    conocimientos técnicos necesarios para reparar aparatos electrónicos que se encuentran en el
                    hogar, por medio de las habilidades de inspección. Las herramientas especializada s y el cambio
                    y reparación de componentes eléctricos y electrónicos.
                </p>
            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/2.png">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Formación especializada: </span>Los
                    estudiantes adquieren conocimientos específicos en el área de la electrónica, lo que les permite
                    desarrollar
                    habilidades técnicas valoradas en el mercado laboral.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Oportunidades laborales:</span>Al
                    completar la media técnica de electrónica, los graduados pueden acceder a puestos de trabajo en
                    empresas del sector tecnológico, de telecomunicaciones
                    , manipulación de dispositivos electrónicos, entre otros.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Posibilidad de emprender:</span>Con los
                    conocimientos adquiridos, los graduados pueden emprender sus propios proyectos en el campo de la
                    electrónica, creando dispositivos
                    innovadores o prestando servicios especializados.

                </p>



            </div>
        </div>

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/3.png">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Enfoque específico:</span> Al ser una
                    formación especializada, los estudiantes pueden tener menos exposición a otras áreas del
                    conocimiento, lo que podría
                    limitar sus opciones en el futuro si deciden cambiar de carrera.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Equipos esenciales:</span>Algunos
                    programas de media técnica de electrónica
                    pueden requerir equipos y herramientas especializadas, lo que podría presentar un costo
                    adicional
                    para los estudiantes.

                </p>



            </div>
        </div>

        <div class="contendor-item animacion si">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/electronica/4.png">

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
    <?php if (empty($datosElectronica)) { ?>
        <p class="h2Novedades">No hay novedades</p>
        <?php } else {
        foreach ($datosElectronica as $novedad) { ?>

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
        <input type="hidden" name="tecnica" value="electronica">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>

<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>


</body>