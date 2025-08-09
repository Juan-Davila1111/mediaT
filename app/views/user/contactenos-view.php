<?php require_once("./app/views/inc/user/header.php"); ?>

<div class="right"></div>

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

<div class="centrado-cargando-loader overflow">
        <span class="loader"></span>
        <span class="loaderp"></span>

    </div>

<!-- Contenedor de el contactenos -->
<div class="contendor-contactenos ">
    <div class="contenedor-contactenos-hijo">

        <div class="info-cotactenos">
            <div class="icono-contactenos">
                <i class="fa-solid fa-user"></i>
            </div>
            <h4 class="titulo-contactenos">Información de contacto</h4>
            <div class="iconos-info">
                <div class="icono-info">
                    <i class="fa-solid fa-envelope"></i>
                    <p>mediat2024k@gmial.com</p>
                </div>

                <div class="icono-info">
                    <i class="fa-solid fa-route"></i>
                    <p>Santo Domingo Savio, Cra. 28 N° 107-425</p>
                </div>
            </div>
        </div>
        <form class="formContactenos formAjax" action="<?php echo APP_URL; ?>app/ajax/contactenosAjax.php" method="post" autocomplete="off">
            <h5>Envia tu mensaje</h5>
            <input type="hidden" name="modulo_contactenos" value="agregar">
            <!-- Nombre -->
            <label for="nombre">Nombres</label>
            <input type="text" class="input" name="nombre" id="nombre">
            <!-- Correo -->
            <label for="correo">Correo</label>
            <input type="text" class="input" name="correo" id="correo">
            <!-- Telefono -->
            <label for="telefono">Teléfono/celular</label>
            <input type="number" class="input" name="telefono" id="telefono">
            <!-- Mensaje -->
            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" class="input"  id="mensaje" cols="30" rows="10"></textarea>
            <!-- Boton enviar -->
            <div class="btn-enviar">
                <button type="submit" name="enviar" id="enviar">Enviar mensaje</button>
            </div>
        </form>
    </div>
</div>


<?php require_once("./app/views/inc/user/footer.php"); ?>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>
</body>