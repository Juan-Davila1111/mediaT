<?php require_once("./app/views/inc/user/head.php") ?>

<body class="overflow">
    <!--  animacion del load -->
    <div class="right"></div>
    <div class="centrado-cargando">
        <div class="cargando" id="cargando">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="centrado-cargando-loader overflow">
        <span class="loader"></span>
        <span class="loaderp"></span>

    </div>

    <div class="alertaAceptar">
        <div class="alertaAceptarContenedor">
            <div class="iconoAlerta">
                <i class="fa-solid fa-question"></i>
            </div>
            <div class="alertaTexto">
                <h5>¿Estás seguro?</h5>
                <p>¿Seguro que quieres proceder con esta accion? Esta acción es irreversible.</p>
            </div>
            <div class="alertaAceptarBotones">
                <button class="siEnv">Sí,enviar</button>
                <button class="noEnv">Cancelar</button>
            </div>
        </div>
    </div>

    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>

    <div class="cerrarSesion">
        <div class="alertaCerrar">
            <p>¿Estás seguro de que deseas cerrar sesión?</p>
            <div class="btnCerrarS">
                <button class="siCerrar">Sí</button>
                <button class="noCerrar">No</button>
                <i class='bx bx-x xCerrar'></i>
            </div>

        </div>
    </div>

    <!-- header -->
    <header class="header">
        <div class="menu">
            <!-- logo -->
            <div class="logo"><img src="<?php echo APP_URL ?>app/views/assets/img/logo.png" alt=""></div>

            <nav class="nav">
                <ul class="menu-list">
                    <li class="link"><a href="<?php echo APP_URL ?>dashboard" class=" menu-link">Inicio</a></li>
                    <li class="link"><a href="<?php echo APP_URL ?>#historia" class="menu-link">Historia</a></li>

                    <li class="link liHover"><a href="index.php" class="menu-link">Media técnicas<i class="fa-solid fa-chevron-right derecha"></i></a>
                        <ul class="ulHijo">
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>construccion" class="menu-link">Construcción</a></li>
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>fitnes" class="menu-link">Fitness</a></li>
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>eventos" class="menu-link">Eventos</a></li>
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>recursos" class="menu-link">Recursos</a></li>
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>electronica" class="menu-link">Electrónica</a></li>
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>software" class="menu-link">Software</a></li>
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>patronaje" class="menu-link">Patronaje</a></li>
                            <li class="link liHijo"><a href="<?php echo APP_URL ?>academico" class="menu-link">Académico</a></li>
                        </ul>
                    </li>

                    <li class="link"><a href="<?php echo APP_URL ?>quiz" class="menu-link">Quizz</a></li>
                    <!-- <li class="link"><a href="index.php" class="menu-link">Equipo</a></li> -->
                    <li class="link"><a href="<?php echo APP_URL ?>contactenos" class="menu-link">Contáctenos</a></li>

                </ul>
                <!-- botones de Registrarse -->
                <div class="infoPerfil">
                    <div class="perfil">
                        <span class="">*<?php echo $_SESSION["usuario"] ?>*</span>
                        <?php if ($_SESSION["foto"] == "") { ?>
                            <span class="imgPerfil"><img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/defecto.png" alt=""></span>
                        <?php } else { ?>
                            <span class="imgPerfil"><img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/<?php echo $_SESSION["foto"] ?>" alt=""></span>
                        <?php } ?>


                    </div>

                    <div class="opcionesPer">
                        <p><?php echo $_SESSION["nombre"] ?></p>
                        <a href="<?php echo APP_URL ?>cuenta">Mi cuenta</a>
                        <a href="<?php echo APP_URL ?>cerrarSesion" class="cerrarLink">Cerrar sesión</a>
                    </div>

                </div>


            </nav>
            <!-- boton animado -->
            <button class="btnAnimado">
                <span class="l1 span"></span>
                <span class="l2 span"></span>
                <span class="l3 span"></span>
            </button>
        </div>
    </header>

    <?php
    if (
        !isset($_SESSION['id']) ||
        !isset($_SESSION['nombre']) ||
        !isset($_SESSION['usuario']) ||
        !isset($_SESSION['correo']) ||
        empty($_SESSION['id']) ||
        empty($_SESSION['nombre']) ||
        empty($_SESSION['usuario']) ||
        empty($_SESSION['correo'])
    ) {
        // Aquí se ejecuta el código si alguna de las variables de sesión (excepto 'apellido') está vacía o no está definida.

        $insLogin->cerrarSessionControlador();
        exit();
    }
    ?>