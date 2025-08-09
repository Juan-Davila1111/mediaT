<?php require_once("./app/views/inc/admin/header.php") ?>
<?php require_once("./app/views/inc/admin/aside.php") ?>

<?php
$id = $insLogin->limpiarCadena($url[1]);

$datos = $insLogin->seleccionarDatos("Unico", "tbl_usuarios", "usuarios_id", $id);

?>

<main class="mainTotal">
<?php if ($_SESSION["tipo"] == "Superadministrador") { ?>

    <div class="tituloRegre">
        <h1 class="titulo">Editar usuario</h1>
        <?php require_once("./app/views/inc/admin/btnRegresar.php") ?>
    </div>

    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>
    <?php if ($datos->rowCount() == 1) {
        $datos = $datos->fetch(PDO::FETCH_ASSOC);
    ?>
        <form class="formEditar formAjax" action="<?php echo APP_URL; ?>app/ajax/userAjax.php" method="post" autocomplete="off">
            <div class="form-groups">

                <input type="hidden" name="modulo_usuario" value="actualizar">
                <input type="hidden"  name="usuario_id" value="<?php echo $datos['usuarios_id']; ?>">

                <div class="form-group datosGrandes">
                    <label for="nombre">
                        <input type="text" name="usuario_nombres" placeholder="Nombres" value="<?php echo $datos['usuario_nombres']; ?>">
                    </label>

                    <label for="apellido">
                        <input type="text" name="usuario_apellidos" placeholder="Apellidos"  value="<?php echo $datos['usuario_apellidos']; ?>">
                    </label>
                </div>

                <div class="form-group datosGrandes">
                    <label for="usuario">
                        <input type="text" name="usuario_usuario" placeholder="Usuario"  value="<?php echo $datos['usuario_usuario']; ?>">
                    </label>

                    <label for="email">
                        <input type="text" name="usuario_email" placeholder="Correo"  value="<?php echo $datos['usuario_correo']; ?>">

                    </label>


                </div>

                <div class="form-group datosGrandes">
                    <label for="password1">
                        <input type="password" name="usuario_password1" placeholder="Contraseña">
                    </label>
                    <label for="password2">
                        <input type="password" name="usuario_password2" placeholder="Repetir Contraseña">
                    </label>

                </div>
            </div>


            <div class="form-group-btn">
                <button type="submit" class="editar">Editar</button>
                <button type="reset" class="eliminar">Limpiar</button>
            </div>

        </form>
    <?php } else {
        require_once("./app/views/inc/admin/alertaDatos.php");
    } ?>

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
<div class="right">
<?php require_once("./app/views/inc/admin/info.php") ?> 

</div>


</div>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/header.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>
</body>