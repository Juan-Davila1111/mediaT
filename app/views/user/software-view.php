<?php require_once("./app/views/inc/user/header.php");
$datosSoftware = $insLogin->seleccionarDatos("Varios", "tbl_novedades", "novedades_tecnica", "software");
$datosSoftware = $datosSoftware->fetchAll();

$datosForos  = $insLogin->seleccionarDatos("Varios", "tbl_foros", "foro_tecnica", "software");
$datosForos = $datosForos->fetchAll();
?>

<main class="main container ">
    <!-- Texto y slogan -->
    <div class="texto-slogan">
        <h2 class="h2Slogan">Programando el futuro</h2>
        <p class="textoSlogan">Código perfecto, soluciones a medida.</p>
    </div>
    <!-- slider que representa a la media tecnica -->
    <div class="contenedor-slider-media">
        <div class="silder-media">
            <div class="slider-media-items">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/codigo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/codigos.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/html-5.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/java.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/js.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/programacion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/sitio-web.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/software.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/codigo.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/codigos.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/html-5.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/java.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/js.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/programacion.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/sitio-web.png" alt="">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/software.png " alt="">
            </div>
        </div>
    </div>
    <!-- Contenedor de la media tecnica -->
    <h2 class="h2Tecnica">Media Técnica: Programación de Software</h2>

    <div class="contenedor-media-tecnica">

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/1.png " alt="">

            </div>
            <div class="texto-item">
                <h3 class="h3Item">Software</h3>
                <p>Una media técnica en programación de software es una formación educativa centrada en proporcionar a los estudiantes conocimientos prácticos y teóricos en el desarrollo de software. Este tipo de educación se enfoca en enseñar habilidades fundamentales como la programación en diferentes lenguajes, el diseño y la arquitectura de software, la resolución de problemas algorítmicos, la gestión de bases de datos, y la implementación de aplicaciones informáticas.</p>
                <p><span> Bases de datos:</span> Manejo de bases de datos para almacenar y gestionar información de manera eficiente.</p>
                <p><span> Diseño Web:</span> Creación de páginas web interactivas y funcionales utilizando tecnologías actuales.</p>
                <p><span>Programación: </span>Aprendizaje de diferentes lenguajes de programación como Java, C++, Python, C#, PHP, entre otros. </p>
                <p><span>Desarrollo de aplicaciones:</span> Creación y diseño de aplicaciones informáticas para diversos dispositivos y plataformas. </p>
            </div>
        </div>

        <div class="contendor-item si animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/2.png " alt="">

            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Ventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Demanda Laboral Constante y Oportunidades Profesionales:</span>La programación de software es una habilidad altamente demandada en la era digital actual. Las empresas de todos los sectores buscan desarrolladores de software para crear y mantener aplicaciones, sitios web y sistemas informáticos.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Creatividad y Resolución de Problemas:</span>La programación de software permite a los desarrolladores expresar su creatividad al diseñar soluciones innovadoras para problemas complejos.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Flexibilidad y Variedad en las Carreras: </span>Con los conocimientos adquiridos, los
                    graduados pueden emprender sus
                    propios proyectos en el área de la construcción.
                    Con los conocimientos adquiridos, los graduados pueden emprender sus
                    propios proyectos en el
                    área de la construcción.

                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Impacto y Contribución a la Sociedad: </span>La programación de software juega un papel crucial en la mejora de la eficiencia, la accesibilidad y la calidad de vida en la sociedad moderna. Las aplicaciones médicas pueden salvar vidas, las plataformas educativas pueden democratizar el acceso a la educación, y las soluciones empresariales pueden optimizar procesos y reducir costos.
                </p>

            </div>
        </div>

        <div class="contendor-item animacion">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/3.png " alt="">
            </div>
            <div class="texto-item ">
                <h3 class="h3Item">Desventajas: </h3>
                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span> Naturaleza Altamente Técnica y Curva de Aprendizaje: </span> La programación de software requiere un alto nivel de habilidades técnicas y un entendimiento profundo de conceptos como algoritmos, estructuras de datos y paradigmas de programación.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Presión por Cumplir Plazos y Expectativas: </span>En entornos profesionales, los programadores frecuentemente enfrentan presiones para cumplir con plazos ajustados y expectativas de calidad del producto.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Riesgo de Obsolescencia Tecnológica: </span>La tecnología en la programación de software evoluciona rápidamente, con nuevas herramientas, lenguajes y frameworks emergiendo constantemente. Los programadores deben mantenerse actualizados con las últimas tendencias y habilidades demandadas en el mercado para mantener su relevancia profesional y competitividad.
                </p>

                <p><i class="fa-solid fa-chevron-right flechaitem"></i><span>Problemas de Salud Relacionados con el Trabajo: </span>Pasar largas horas frente a la computadora escribiendo código puede llevar a problemas de salud como fatiga visual, dolor de espalda y síndrome del túnel carpiano.

                </p>

            </div>
        </div>

        <div class="contendor-item animacion si">
            <div class="img-item">
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/software/4.png " alt="">

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
    <?php if (empty($datosSoftware)) { ?>
        <p class="h2Novedades">No hay novedades</p>
        <?php } else {
        foreach ($datosSoftware as $novedad) { ?>

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
        <input type="hidden" name="tecnica" value="software">

        <textarea class="textarea-coment" name="comentario" placeholder="Deja tu Comentario"></textarea>
        <button class="btn" type="submit">Enviar <i class="fa-solid fa-paper-plane"></i></button>

    </form>
</div>

<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/mediaTecnica.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>

</body>