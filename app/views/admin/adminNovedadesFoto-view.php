<?php require_once("./app/views/inc/admin/header.php") ?>
<?php require_once("./app/views/inc/admin/aside.php") ?>
<!-- --------------
          end aside
        -------------------- -->
<?php
$id = $insLogin->limpiarCadena($url[1]);
$datos = $insLogin->seleccionarDatos("Unico", "tbl_novedades", "novedades_id", $id);
?>

<main class="mainTotal">
    <div class="tituloRegre">
        <h1 class="titulo">Editar foto de novedad</h1>
        <div class="contenedorAlert">
            <div class="contenedor-toast " id="contenedor-toast">

            </div>
        </div>
        <?php require_once("./app/views/inc/admin/btnRegresar.php") ?>
    </div>
    <?php
    if ($datos->rowCount() == 1) {
        $datos = $datos->fetch();

        $exisFoto = false;
    ?>


        <div class="AdminFoto-container">

            <div class="contenedor-izq">
                <div class="contenedor-img">
                    <?php if (is_file("app/views/assets/img/user/media-tecnica/novedades/" . $datos["novedades_foto"])) { ?>
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/novedades/<?php echo $datos["novedades_foto"] ?> ">
                        <?php $exisFoto = true ?>

                    <?php } else { ?>
                        <img src="<?php echo APP_URL ?>app/views/assets/img/user/media-tecnica/novedades/default.png">
                    <?php } ?>

                </div>
                <div class="nombre"><?php echo $datos["novedades_titulo"] ?>
                </div>


            </div>
            <form class="contenedor-der formAjax" method="post" action="<?php echo APP_URL; ?>app/ajax/tecnicasAjax.php" enctype="multipart/form-data">
                <div class="input-container">

                    <label class="file-label">
                        <div class="file-button">
                            <span class="material-symbols-sharp iconImg">cloud_upload</span>
                        </div>
                        <h3 class="cargarImg">Cargar Imágen</h3>
                        <input class="file-input" type="file" name="novedades_foto" accept=".jpg, .png, .jpeg">
                        <span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
                    </label>


                </div>
                <div class="buttons">
                    <?php if (!$exisFoto) { ?>
                        <div>
                            <button type="submit" class="update-btn"><span class="material-symbols-sharp">upgrade</span>Actualizar foto </button>

                            <input type="hidden" name="modulo_novedades" value="actualizarFoto">
                            <input type="hidden" name="novedades_id" value="<?php echo $datos['novedades_id']; ?>">
                        </div>
            </form>
        <?php } else { ?>
            <div class="buttons">
                <button type="submit" class="update-btn"><span class="material-symbols-sharp">upgrade</span>Actualizar foto </button>
                <input type="hidden" name="modulo_novedades" value="actualizarFoto">
                <input type="hidden" name="novedades_id" value="<?php echo $datos['novedades_id']; ?>">
                </form>
                <form class="formAjax" method="post" action="<?php echo APP_URL; ?>app/ajax/tecnicasAjax.php" enctype="multipart/form-data">
                    <button class="delete-btn"><span class="material-symbols-sharp">delete</span>Eliminar foto</button>

                    <input type="hidden" name="modulo_novedades" value="eliminarFoto">
                    <input type="hidden" name="novedades_id" value="<?php echo $datos['novedades_id']; ?>">
                </form>
            </div>
        <?php } ?>

        </div>
        </div>
    <?php } else {
        require_once("./app/views/inc/admin/alertaDatos.php");
    } ?>
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