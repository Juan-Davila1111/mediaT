<?php require_once("./app/views/inc/user/head.php") ?>

<body class="overflow">
    <div class="right"></div>
    <!--  animacion del load -->
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

    <div class="container-login" id="containerLogin">
        <div class="container-form hide form-register">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido</h2>
                    <p>Para unirte a nuestra comunidad crea una cuenta con tus datos</p>

                    <input type="button" value="Iniciar Sesión" id="sign-in">
                </div>
            </div>
            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Crear una cuenta</h2>

                    <form class="formAjax form" action="<?php echo APP_URL ?>app/ajax/loginAjax.php" method="post">
                        <input type="hidden" name="modulo_usuario" value="registrar">
                        <label>
                            <i class='bx bxs-user'></i>
                            <input type="text" placeholder="Nombres Completo" name="usuario_nombre" class="form-name">
                        </label>

                        <label>
                            <i class='bx bx-user-pin'></i>
                            <input type="text" placeholder="Usuario" name="usuario_usuario" class="form-user">
                        </label>


                        <label>
                            <i class='bx bxl-gmail'></i>
                            <input type="text" placeholder="Correo Electronico" name="usuario_email">
                        </label>

                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" placeholder="Contraseña" name="usuario_password1" class="password1">
                        </label>
                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" placeholder="Repetir Contraseña" name="usuario_password2" class="password2">
                        </label>
                        <input type="submit" value="Registrarse">
                    </form>
                </div>
            </div>
        </div>

        <div class="container-form  login">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido nuevamente</h2>
                    <p>Para unirte a nuestra comunidad Inicia sesión con tus datos</p>
                    <input type="button" value="Registrarse" id="sign-up">
                    <input type="button" value="Iniciar como administrador" id="login-admin" class="adminLogin">


                </div>
            </div>
            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Iniciar Sesión</h2>
                    <form class="form" action="" method="post">
                        <input type="hidden" name="modulo_usuario" value="iniciarUsuario">

                        <label>
                            <i class='bx bxs-user'></i>
                            <input type="text" placeholder="Usuario" name="login_usuario">
                        </label>
                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" placeholder="Contraseña" name="login_password">
                        </label>
                        <input type="submit" value="Iniciar Sesión">
                    </form>
                </div>
            </div>
        </div>

        <div class="container-form hide admin">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido</h2>
                    <p>Si tienes una cuenta de administrador, por favor haz un buen uso de ella.</p>
                    <input type="button" value="Iniciar sesión como usuario" id="sign-up2">
                </div>
            </div>



            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Iniciar Sesión</h2>
                    <form class="form" action="" method="post" >
                        <input type="hidden" name="modulo_usuario" value="iniciarAdmin">
                        <label>
                            <i class='bx bxs-user'></i>
                            <input type="text" placeholder="Usuario" name="admin_usuario">
                        </label>
                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" placeholder="Contraseña" name="admin_password">

                        </label>
                        <input type="submit" value="Iniciar Sesión">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>
    <script src="<?php echo APP_URL ?>app/views/assets/js/user/register.js"></script>
    <?php
    if (isset($_POST["login_usuario"]) && isset($_POST["login_password"])) {

        echo $insLogin->iniciaresionControlador();
    }

    if (isset($_POST["admin_usuario"]) && isset($_POST["admin_password"])) {

        echo $insLogin->iniciaresionAdminControlador();
    }

    ?>

</body>