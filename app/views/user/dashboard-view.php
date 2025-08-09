<?php require_once("./app/views/inc/user/header.php"); ?>
<!-- Slider -->
<div class="container contenedor-info-img">
    <div class="info">
        <h1 class="h1">¡Bienvenido a MediaT!</h1>
        <h2 class="h12">¡Bienvenido a MediaT!</h2>
        <span class="slogan">"Descubre tu Camino Técnico con Confianza"</span>
        <p> MediaT es tu destino para explorar y aprender sobre una variedad de medias técnicas, desde software
            y electrónica hasta otras disciplinas relacionadas. </p>
        <a href="<?php echo APP_URL ?>quiz">Iniciar Quizz <i class="fa-solid fa-lightbulb"></i></a>
    </div>
    <!-- slider de las imagenes -->
    <div class="slider-contenedor">
        <div class="slider-hijo" id="slider-1" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/fitnes.png);">
        </div>
        <div class="slider-hijo" id="slider-2" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/eventos.png);">
        </div>
        <div class="slider-hijo" id="slider-3" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/eventos.png);"></div>
        <div class="slider-hijo" id="slider-4" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/recursos.png);"></div>
        <div class="slider-hijo" id="slider-5" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/electronica.png);"></div>
        <div class="slider-hijo" id="slider-6" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/software.png);"></div>
        <div class="slider-hijo" id="slider-7" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/patronaje.png);"></div>
        <div class="slider-hijo" id="slider-8" style="background-image: url( <?php echo APP_URL ?>app/views/assets/img/user/slider-inicio/academico.png);"></div>
    </div>
</div>
<!-- Nuestros servicios -->
<h2 class="h2" id="servicios">Nuestros servicios</h2>
<div class="container servicios">

    <div class="caja-servicio">
        <img src=" <?php echo APP_URL ?>app/views/assets/img/user/servicio/1.png" alt="" class="img1">
        <h3>Asesoramiento Académico</h3>
        <p>Ofrecer asesoramiento personalizado a los estudiantes interesados en
            las media técnicas disponibles, ayudándoles a comprender los requisitos, el plan de estudios y las
            oportunidades
            profesionales asociadas.
        </p>
    </div>

    <div class="caja-servicio">
        <img src=" <?php echo APP_URL ?>app/views/assets/img/user/servicio/2.png" alt="" class="img1">
        <h3>Orientación Vocacional</h3>
        <p>Proporcionar recursos y herramientas para ayudar a los estudiantes
            a explorar sus intereses, habilidades y aspiraciones profesionales,
            con el objetivo de que puedan tomar decisiones informadas sobre su futuro educativo y profesional.</p>
    </div>

    <div class="caja-servicio">
        <img src=" <?php echo APP_URL ?>app/views/assets/img/user/servicio/3.png" alt="" class="img1">
        <h3>Soporte rápido</h3>
        <p>Ofrecemos un servicio de Soporte Rápido diseñado para proporcionar asistencia inmediata y eficiente
            ante cualquier problema técnico que puedan enfrentar nuestros estudiantes.</p>
    </div>

</div>

<!-- Historia: Misión y Vision -->
<div class="section " id="historia">
    <div class="tittle">
        <h2 class="h2">Conócenos</h2>
    </div>
    <div class="services container animacion">
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-crosshairs"></i>
            </div>
            <h2>Misión</h2>
            <p>Nuestra misión es que los estudiantes de nuestra institución educativa tengan conocimientos previos
                sobre en qué se basa cada media técnica y no arrepentirse luego de su elección tomada.</p>
        </div>
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-book"></i>
            </div>
            <h2>Historia</h2>
            <p>Nuestra historia es algo sencilla, simplemente somos jóvenes que tuvieron la iniciativa de crear un
                aplicativo web para ayudar a los estudiantes a tener un proceso informativo sobre las medias
                técnicas presentes en la institución.</p>
        </div>
        <div class="card">
            <div class="icon">
                <i class="fa-solid fa-eye"></i>
            </div>
            <h2>Visión</h2>
            <p>Nuestra visión es que luego de un tiempo determinado los estudiantes estén satisfechos con la
                desición que tomaron y no haberse arrepentido por no tener la suficiente informacion previa y salgan
                preparados para una mejor educación superior.</p>
        </div>
    </div>
</div>


<!-- Testimonios -->
<div class="slider-testimonios container animacion">
    <h2 class="h2">¿Qué opinan nuestros clientes?</h2>
    <div class="slider-contenido">
        <div class="carta-padre">
            <i id="left" class="fa-solid fa-chevron-left"></i>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona-4.png" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Caleb Ramirez</h3>
                    <p class="descripcion">Estoy muy agradecido con mediaT porque he aprendido mucho sobre las técnicas de medios que me interesan. La plataforma me ha ayudado a mejorar mis habilidades y a tomar mejores decisiones sobre qué técnicas aplicar en mis proyectos.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona-4.png" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Keiner Jaramillo</h3>
                    <p class="descripcion">mediaT me ha permitido sentirme más seguro a la hora de tomar decisiones sobre qué técnica de medios es la más adecuada para mis necesidades. Gracias a su interfaz sencilla y a la gran cantidad de información disponible, mi confianza ha crecido.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona3-png.jpg" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Juan Dávila</h3>
                    <p class="descripcion">La plataforma mediaT ofrece información muy completa sobre las distintas técnicas de medios. Lo que más me ha impresionado es la profundidad de los análisis y la facilidad con la que puedo acceder a recursos actualizados sobre cada tema.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona-5.png" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Santiago Manco</h3>
                    <p class="descripcion">mediaT cuenta con una variedad de información sobre técnicas de medios que es difícil de encontrar en otros lugares. Gracias a esto, he podido mejorar mis proyectos y estar más informado sobre los métodos más eficientes en mi campo.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona-6.png" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Sirley Zabala</h3>
                    <p class="descripcion">Lo que más me gusta de mediaT es la facilidad con la que puedo aprender nuevas técnicas y aplicarlas en mi trabajo. Desde que empecé a usar la plataforma, he notado un gran avance en mi carrera, y ahora me siento más preparada para enfrentar desafíos complejos.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona3-png.jpg" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Susana Dávila</h3>
                    <p class="descripcion">mediaT me ha ayudado a descubrir nuevas áreas dentro de las técnicas de medios que antes desconocía. Gracias a la cantidad de recursos disponibles, ahora tengo una mejor comprensión de qué métodos son más adecuados para los proyectos en los que trabajo.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona3-png.jpg" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Aura Ortega</h3>
                    <p class="descripcion">Estoy muy contenta con el servicio que ofrece mediaT. La plataforma es intuitiva y fácil de usar, y los recursos que ofrece me han ayudado a tomar decisiones mucho más informadas sobre los enfoques técnicos que mejor se adaptan a mis necesidades.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona3-png.jpg" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Hola Pepito</h3>
                    <p class="descripcion">mediaT ha sido una herramienta esencial para mejorar mis conocimientos sobre las técnicas de medios. Me encanta que la información esté organizada y siempre actualizada, lo que facilita mi aprendizaje y aplicación en el campo profesional.</p>
                </div>
            </div>

            <div class="carta">
                <div class="imagen-contenido">
                    <span class="overlay"></span>
                    <div class="carta-imagen">
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/testimonios/persona-6.png" alt="" class="carta-img" arrastrable="false">
                    </div>
                </div>
                <div class="carta-contenido">
                    <h3 class="nombre">Blanca Ramirez</h3>
                    <p class="descripcion">Desde que empecé a usar mediaT, mi confianza en las decisiones técnicas ha aumentado. La plataforma no solo es útil para obtener información, sino también para aprender nuevas estrategias que puedo implementar directamente en mi trabajo diario.</p>
                </div>
            </div>

            <i id="right" class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="puntos" id="preguntas"></div>
    </div>
</div>


    <!-- preguntas frecuentes -->
    <h2 class="h2">Preguntas frecuentes</h2>
    <div class="contenedor-preguntas-frecuentes container" >

        <div class="categorias animacion" id="categorias">

            <div class="categoria activo" data-categoria="seguridad">
                <i class='bx bx-lock-alt'></i>
                <p>seguridad</p>
            </div>


            <div class="categoria" data-categoria="quiz">
                <i class='bx bx-brain'></i>
                <p>Quiz</p>
            </div>
            <div class="categoria" data-categoria="cuenta">
                <i class="fa-regular fa-rectangle-list"></i>
                <p>Cuenta</p>
            </div>

            <div class="categoria" data-categoria="soporte">
                <i class='bx bx-help-circle'></i>
                <p>Soporte</p>
            </div>


        </div>

        <div class="preguntas animacion">
            <!-- contenedor preguntas seguridad -->
            <div class="contenedor-preguntas activo" data-categoria="seguridad">
                <div class="contenedor-pregunta">
                    <p class="pregunta">¿Cómo protegen mis datos personales en media T?<i class="fa-solid fa-plus"></i>
                    </p>
                    <p class="respuesta">Gracias a un cifrado de datos para proteger la comunicación entre los
                        dispositivos de los usuarios y los servidores de MediaT. Esto ayuda a garantizar que los
                        mensajes y otra información enviada a través de la plataforma estén seguros y no sean
                        interceptados por terceros.

                    </p>
                </div>

                <div class="contenedor-pregunta">
                    <p class="pregunta">Autenticación segura<i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta">Implementa un sistema de autenticación seguro que requiera contraseñas robustas
                        y, si es posible, autenticación de dos factores. Esto ayuda a proteger las cuentas de los
                        usuarios y que navegar sea más seguro</p>
                </div>

                <div class="contenedor-pregunta">
                    <p class="pregunta">Monitoreo de seguridad continuo <i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta">Utiliza herramientas de monitoreo de seguridad para detectar y responder
                        rápidamente a posibles amenazas a MediaT, como intrusiones, malware o comportamientos anómalos.

                    </p>
                </div>
            </div>
            <!-- contenedor preguntas quiz -->

            <div class="contenedor-preguntas" data-categoria="quiz">
                <div class="contenedor-pregunta ">
                    <p class="pregunta">¿Por qué un quizz? <i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta">este quizz tiene varios propósitos, evaluar el conocimiento sobre un tema
                        específico, proporcionar retroalimentación personalizada, recopilar datos demográficos o
                        preferencias de los usuarios, o simplemente brindar entretenimiento.</p>
                </div>

                <div class="contenedor-pregunta">
                    <p class="pregunta">Uso educativo <i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta">En el ámbito educativo, los quizzes son una herramienta útil para evaluar el
                        aprendizaje de los estudiantes, reforzar conceptos clave, identificar áreas de mejora y fomentar
                        la participación activa.</p>
                </div>
            </div>
            <!-- contenedor preguntas cuenta -->

            <div class="contenedor-preguntas" data-categoria="cuenta">
                <div class="contenedor-pregunta ">
                    <p class="pregunta">Horario Laboral Regular <i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta">Durante el horario laboral estándar, nosotros los administradores están
                        disponibles para responder consultas y resolver problemas en tiempo real. Esto puede incluir
                        horas de atención de lunes a viernes, de 9 a 5.</p>

                    </p>
                </div>

                <div class="contenedor-pregunta">
                    <p class="pregunta">Gestión de Incidentes. <i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta"> En caso de incidentes de seguridad o interrupciones del servicio, nosotros los
                        administradores son responsables de coordinar la respuesta del equipo de soporte, comunicarse
                        con los usuarios afectados y tomar medidas correctivas según sea necesario.</p>
                </div>

                <div class="contenedor-pregunta">
                    <p class="pregunta">Seguridad y privacidad <i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta"> debemo seguir estrictos protocolos de seguridad y privacidad para proteger la
                        información confidencial de los usuarios y garantizar el cumplimiento de las regulaciones de
                        protección de datos</p>
                </div>
            </div>

            <!-- contenedor preguntas soporte -->

            <div class="contenedor-preguntas" data-categoria="soporte">
                <div class="contenedor-pregunta ">
                    <p class="pregunta">¿tienes algun problema? <i class="fa-solid fa-plus"></i></p>
                    <p class="respuesta">Para cualquier otro problema o pregunta relacionada con nuestra página web, por
                        favor, ponte en contacto con nuestro equipo de soporte técnico. Estamos aquí para ayudarte con
                        cualquier inquietud que puedas tener.

                        Correo: blabla@gmail.com
                        telefono: 2313718293103

                    </p>
                </div>
            </div>
        </div>

    </div>

    <?php require_once("./app/views/inc/user/footer.php"); ?>
    <script src=" <?php echo APP_URL ?>app/views/assets/js/user/script.js"></script>

    </body>