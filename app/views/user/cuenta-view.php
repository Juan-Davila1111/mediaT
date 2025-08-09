<?php require_once("./app/views/inc/user/header.php");

$id = $_SESSION["id"];
$datos = $insLogin->seleccionarDatos("Unico", "tbl_usuarios", "usuarios_id", $id);
$datos = $datos->fetch();

$fotoPath = "app/views/assets/img/user/fotoUser/" . $_SESSION["foto"];

?>
<form class="miCuneta container formAjax" action="<?php echo APP_URL ?>app/ajax/userAjax.php" method="post">
    <input type="hidden" name="modulo_usuario" value="EditarMiPerfil">
    <input type="hidden" name="usuario_id" value="<?php echo $id ?>">

    <h2>Mi cuenta</h2>
    <!-- Foto de perfil -->
    <div class="datoscuenta fotoPerfil">
        <div class="fotoTxt">
            <p>Foto de perfil</p>
            <?php if (empty($_SESSION["foto"]) || !is_file($fotoPath)) { ?>
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/defecto.png" alt="">
            <?php } else { ?>
                <img src="<?php echo APP_URL ?>app/views/assets/img/user/fotoUser/<?php echo $_SESSION["foto"] ?>" alt="">
            <?php } ?>


        </div>

        <?php if (empty($_SESSION["foto"]) || !is_file($fotoPath)) { ?>
            <div class="fotoOpciones">
                <label>
                    <span>Cambiar la foto:</span>
                    <input class="fotoInput" type="file" name="users_foto" id="img" accept=".jpg, .png, .jpeg">
                </label>
            </div>
        <?php } else { ?>
            <div class="fotoOpciones">
                <!-- <span class="spanQuitar">Quitar la foto</span> -->
                <label>
                    <span>Cambiar la foto:</span>
                    <input class="fotoInput" type="file" name="users_foto" id="img" accept=".jpg, .png, .jpeg">

                </label>
            </div>
        <?php } ?>
        <span class="rayaCuentac"></span>
    </div>

    <!-- Usuario -->
    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Usuario:</p>
            <div class="infoDat">
                <input class="" name="usuario_usuario" type="text" value="<?php echo $datos["usuario_usuario"] ?>"></input>

                <div class="botonOpcion activo">
                    <span class="editar">Editar</span>
                    <span class="activo cancelar">Cancelar</span>
                </div>

            </div>

        </div>

        <span class="rayaCuentac"></span>

    </div>
    <!-- Nombre -->
    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Nombre:</p>
            <div class="infoDat">
                <input type="text" name="usuario_nombres" value="<?php echo $datos["usuario_nombres"] ?>"></input>

                <div class="botonOpcion activo">
                    <span class="editar">Editar</span>
                    <span class="activo cancelar">Cancelar</span>
                </div>

            </div>

        </div>

        <span class="rayaCuentac"></span>

    </div>
    <!-- Apellidos -->
    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Apellidos:</p>
            <div class="infoDat">
                <input type="text" name="usuario_apellidos" value="<?php echo $datos["usuario_apellidos"] ?>"></input>

                <div class="botonOpcion activo">
                    <span class="editar">Editar</span>
                    <span class="activo cancelar">Cancelar</span>
                </div>

            </div>

        </div>

        <span class="rayaCuentac"></span>

    </div>

    <!-- Correo -->
    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Correo electrónico:</p>
            <div class="infoDat">
                <input type="text" name="usuario_correo" value="<?php echo $datos["usuario_correo"] ?>"></input>

                <div class="botonOpcion activo">
                    <span class="editar">Editar</span>
                    <span class="activo cancelar">Cancelar</span>
                </div>

            </div>

        </div>

        <span class="rayaCuentac"></span>

    </div>

    <!-- Contraseña -->
    <p class="pAlert">Si desea actualizar la contraseña, por favor llene el campo. Si NO desea actualizar la contraseña, deje el campo tal cual.</p>
    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Contraseña:</p>
            <div class="infoDat">
                <input type="password" name="usuario_password" value=""></input>

                <div class="botonOpcion activo">
                    <span class="editar">Editar</span>
                    <span class="activo cancelar">Cancelar</span>
                </div>

            </div>

        </div>

        <span class="rayaCuentac"></span>

    </div>
    <p class="pAlert">Para poder actualizar los datos por favor ingrese su USUARIO y CONTRASEÑA con la que ha iniciado sesión</p>

 

    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Usuario:</p>
            <div class="infoDat">
                <input type="text" name="usuario_admin" class="activo" value=""></input>

                <div class="botonOpcion activo">

                </div>

            </div>

        </div>

        <span class="rayaCuentac"></span>
    </div>

    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Contraseña:</p>
            <div class="infoDat">
                <input type="password" name="password_admin" class="activo" value=""></input>
            </div>

        </div>

        <span class="rayaCuentac"></span>

    </div>

    <div class="datoscuenta ">
        <div class="datoCuenta">
            <p>Certificado:</p>
            <div class="infoDat">
                <?php if($datos["usuario_quiz_ganado"]>=5) {?>
                    <a class="a"target="_blank" href="<?php echo APP_URL?>pdf">Descargar certificado</a>
                <?php }else{?>
                    <p>Tienes que realizar y ganr mínimo 5 quizess para obtener el certificado de mediaT</p>
                <?php }?>



            </div>

        </div>

        <span class="rayaCuentac"></span>

    </div>
    <div class="contenButtonA">

        <button type="submit" class="actualizarDat">Actualizar datos</button>
    </div>
</form>
<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/cargar.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/user/cuenta.js"></script>

</body>