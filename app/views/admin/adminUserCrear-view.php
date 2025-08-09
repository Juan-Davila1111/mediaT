<?php require_once("./app/views/inc/admin/header.php") ?>
<?php require_once("./app/views/inc/admin/aside.php") ?>

<main class="mainTotal">
    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">
    
        </div>
    </div>
    <?php if ($_SESSION["tipo"] == "Superadministrador") { ?>

    <div class="tituloRegre">
        <h1 class="titulo">Crear usuario</h1>
        <?php require_once("./app/views/inc/admin/btnRegresar.php") ?>
    </div>


    <form class="formEditar formAjax" action="<?php echo APP_URL; ?>app/ajax/userAjax.php" method="post" autocomplete="off">
        <div class="form-groups">


            <input type="hidden" name="modulo_usuario" value="registrar">

            <div class="form-group datosGrandes">
                <label for="nombre">
                    <input type="text" placeholder="Nombre" name="usuario_nombre">
                </label>

                <label for="apellido">
                    <input type="text" placeholder="Apellido" name="usuario_apellido">
                </label>
            </div>

            <div class="form-group datosGrandes">
                <label for="email">
                    <input type="text" placeholder="Email" name="usuario_email">
                </label>


                <label for="usuario">
                    <input type="text" placeholder="Usuario" name="usuario_usuario">
                </label>



            </div>

            <div class="form-group datosGrandes">
                <label for="password1">
                    <input type="password" placeholder="Contraseña" name="usuario_password1">
                </label>
                <label for="password2">
                    <input type="password" placeholder="Confirmar contraseña" name="usuario_password2">
                </label>

            </div>
        </div>


        <div class="form-group-btn">
            <input type="submit" class="editar" value="Enviar"></input>
            <button type="reset" class="eliminar">Limpiar</button>
        </div>

    </form>
    <?php } else { ?>
        <?php require_once("./app/views/inc/admin/permiso.php") ?>
        
        <?php   } ?>
</main>

<!------------------
           end main
          ------------------->
<!----------------
          start right main 
        ---------------------->
<div class="right none">
<?php require_once("./app/views/inc/admin/info.php") ?> 

</div>


</div>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/header.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>
</body>