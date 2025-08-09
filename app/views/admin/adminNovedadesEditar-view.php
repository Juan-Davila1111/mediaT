<?php require_once("./app/views/inc/admin/header.php") ?>
<?php require_once("./app/views/inc/admin/aside.php") ?>

<?php
$id = $insLogin->limpiarCadena($url[1]);

$datos = $insLogin->seleccionarDatos("Unico", "tbl_novedades", "novedades_id", $id);

?>

<main class="mainTotal">
    <div class="tituloRegre">
        <h1 class="titulo">Editar novedad</h1>
        <?php require_once("./app/views/inc/admin/btnRegresar.php") ?>
    </div>

    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>
    <?php if ($datos->rowCount() == 1) {
        $datos = $datos->fetch(PDO::FETCH_ASSOC);
    ?>
        <form class="formEditar formAjax" action="<?php echo APP_URL; ?>app/ajax/tecnicasAjax.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="form-groups">

                <input type="hidden" name="modulo_novedades" value="actualizar">
                <input type="hidden" name="novedades_id" value="<?php echo $datos["novedades_id"] ?>">

                <div class="form-group datosGrandes">
                    <label for="fecha">
                        <input type="date" name="novedades_fecha" value="<?php echo $datos["novedades_fecha"] ?>">
                    </label>

                    <label for="titulo">
                        <input type="text" placeholder="Título" name="novedades_titulo" value="<?php echo $datos["novedades_titulo"] ?>">
                    </label>
                </div>

                <div class="form-group datosGrandes">
                    <label for="descripcion">
                        <textarea id="descripcion" name="novedadades_comentario" rows="4" cols="50" placeholder="Escribe la descripción aquí..."><?php echo $datos["novedades_texto"] ?></textarea><br>
                    </label>

                    <select name="novedades_tecnica" id="tecnica">
                        <option value="construccion" <?php echo ($datos["novedades_tecnica"] == 'construccion') ? 'selected' : ''; ?> >Construcción</option>
                        <option value="fitnes" <?php echo ($datos["novedades_tecnica"] == 'fitnes') ? 'selected' : ''; ?> >Fitness</option>
                        <option value="eventos" <?php echo ($datos["novedades_tecnica"] == 'eventos') ? 'selected' : ''; ?> >Eventos</option>
                        <option value="recursos" <?php echo ($datos["novedades_tecnica"] == 'recursos') ? 'selected' : ''; ?> >Recursos</option>
                        <option value="electronica" <?php echo ($datos["novedades_tecnica"] == 'electronica') ? 'selected' : ''; ?> >Electrónica</option>
                        <option value="software" <?php echo ($datos["novedades_tecnica"] == 'software') ? 'selected' : ''; ?> >Software</option>
                        <option value="patronaje" <?php echo ($datos["novedades_tecnica"] == 'patronaje') ? 'selected' : ''; ?> >Patronaje</option>
                        <option value="academico" <?php echo ($datos["novedades_tecnica"] == 'academico') ? 'selected' : ''; ?> >Académico</option>

                    </select>

                </div>

                <div class="form-group datosGrandes">
                    <div class="contenedorCargarImg">
                        <label class="file-label2">
                            <span class="file-button2">Seleccione una imagen</span>
                            <input class="file-input2" type="file" name="novedades_foto" id="img" accept=".jpg, .png, .jpeg">
                            <span class="file-name2">JPG, JPEG, PNG. (MAX 5MB)</span>
                        </label>
                    </div>


                </div>
            </div>


            <div class="form-group-btn">
                <input type="submit" class="editar" value="Enviar"></input>
                <button type="reset" class="eliminar">Limpiar</button>
            </div>

        </form>
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