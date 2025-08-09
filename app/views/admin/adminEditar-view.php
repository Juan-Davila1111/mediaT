<?php require_once("./app/views/inc/admin/header.php");
require_once("./app/views/inc/admin/aside.php");

$id = $insLogin->limpiarCadena($url[1]);
$datos = $insLogin->seleccionarDatos("Unico", "tbl_admin", "admin_id", $id);
?>
<!-- --------------
          end aside
        -------------------- -->
<main class="mainTotal">
    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>
    <div class="tituloRegre">
        <h1 class="titulo">Editar admin</h1>
        <?php require_once("./app/views/inc/admin/btnRegresar.php") ?>
    </div>

    <?php if ($_SESSION["tipo"] == "Superadministrador") { ?>


        <?php if ($datos->rowCount() == 1) {
            $datos = $datos->fetch(PDO::FETCH_ASSOC);
        ?>
            <form class="formEditar formAjax" action="<?php echo APP_URL; ?>app/ajax/adminAjax.php" method="post" autocomplete="off">
                <div class="form-groups">

                    <input type="hidden" name="modulo_admin" value="actualizar">
                    <input type="hidden" name="admin_id" value="<?php echo $datos["admin_id"] ?>">

                    <div class="form-group datosGrandes">
                        <label for="nombre">
                            <input type="text" placeholder="Nombres" name="admin_nombres" value="<?php echo $datos["admin_nombres"] ?>">
                        </label>
                    </div>

                    <div class="form-group datosGrandes">
                        <label for="usuario">
                            <input type="text" placeholder="Usuario" name="admin_usuario" value="<?php echo $datos["admin_usuario"] ?>">
                        </label>

                        <label for="email">
                            <input type="text" placeholder="Email" name="admin_email" value="<?php echo $datos["admin_correo"] ?>">
                        </label>

                        <select name="admin_tipo" id="tipo">

                            <option value="Superadministrador" <?php echo ($datos["admin_tipo"] == 'Superadministrador') ? 'selected' : ''; ?>>Superadministrador</option>
                            <option value="Administrador General" <?php echo ($datos["admin_tipo"] == 'Administrador Genera') ? 'selected' : ''; ?>>Administrador General</option>


                        </select>

                    </div>



                    <div class="form-group datosGrandes">
                        <label for="password1">
                            <input type="password" placeholder="Contraseña" name="admin_password1">
                        </label>
                        <label for="password2">
                            <input type="password" placeholder="Confirmar contraseña" name="admin_password2">
                        </label>

                    </div>
                </div>


                <div class="form-group-btn">
                    <button type="submit" class="editar">Editar</button>
                    <button type="reset" class="eliminar">Limpiar</button>
                </div>

            </form>
        <?php  } else { ?>
            <?php require_once("./app/views/inc/admin/alertaDatos.php"); ?>

        <?php  } ?>

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