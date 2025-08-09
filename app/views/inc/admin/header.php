<!-- Incluyendo el head (contiene todos los links a css) -->
<?php require_once("./app/views/inc/admin/head.php")

?>
<body class="overflow">
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
            <span class="material-symbols-sharp">question_mark</span>
        </div>
        <div class="alertaTexto">
            <h5>¿Estás seguro?</h5>
            <p>¿Seguro que quieres proceder? Esta acción es irreversible.</p>
        </div>
        <div class="alertaAceptarBotones">
            <button class="siEnv" >Sí,enviar</button>
            <button class="noEnv" >Cancelar</button>
        </div>
    </div>
</div>
    <div class="container">
      <?php require_once("./app/views/inc/admin/aside.php") ?> 
        <!-- --------------
          end aside
        -------------------- -->