<?php require_once("./app/views/inc/admin/header.php") ?>
<?php require_once("./app/views/inc/admin/aside.php") ?>

<main class="mainTotal">
    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>
    <div class="tituloRegre">
        <h1 class="titulo">Crear novedad</h1>
        <?php require_once("./app/views/inc/admin/btnRegresar.php") ?>
    </div>


    <form class="formEditar formAjax" action="<?php echo APP_URL; ?>app/ajax/tecnicasAjax.php" method="post" autocomplete="off" enctype="multipart/form-data" >
        <div class="form-groups">
            
            <input type="hidden" name="modulo_novedades" value="registrar">

            <div class="form-group datosGrandes">
                <label for="fecha">
                    <input type="date" placeholder="Fecha" name="novedades_fecha">
                </label>

                <label for="titulo">
                    <input type="text" placeholder="Título" name="novedades_titulo">
                </label>
            </div>

            <div class="form-group datosGrandes">
                <label for="descripcion">
                    <textarea id="descripcion" name="novedadades_comentario" rows="4" cols="50" placeholder="Escribe la descripción aquí..."></textarea><br>
                </label>


                <select name="novedades_tecnica" id="tecnica">
                    <option value="construccion">Construcción</option>
                    <option value="fitnes">Fitness</option>
                    <option value="eventos">Eventos</option>
                    <option value="recursos">Recursos</option>
                    <option value="electronica">Electrónica</option>
                    <option value="software">Software</option>
                    <option value="patronaje">Patronaje</option>
                    <option value="academico">Académico</option>
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