<?php require_once("./app/views/inc/user/head.php"); ?>
<body>
    <!-- Contenedor de la vsita 404 -->
    <div class="contenedor-404 container">

        <div class="error404">
            <h2 class="">404</h2>
            <h3 class="">Página no encontrada</h3>
            <p class="">La página que estás buscando no existe o ha sido eliminada, por favor verifica la URL</p>
            <a href="<?php echo APP_URL ?>dashboard" class="btn-404">Volver al inicio</a>
        </div>


        <div class="imagen-404">
            <img src="<?php echo APP_URL?>app/views/assets/img/user/404.png" alt="imagen 404">
        </div>
    </div>
</body>
