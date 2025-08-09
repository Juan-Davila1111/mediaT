<?php require_once("./app/views/inc/admin/header.php") ?>
<?php require_once("./app/views/inc/admin/aside.php") ?>

<?php

use app\controllers\tecnicasController;

$insTecnica = new tecnicasController();

?>
<main class="mainTotal">

    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>
    <?php if (!isset($_SESSION[$url[0]]) && empty($_SESSION[$url[0]])) { ?>
        <div class="infoBuscar">
            <h1 class="titulo">Novedades</h1>


            <form class="fondoInput formAjax" action="<?php echo APP_URL ?>app/ajax/buscadorAjax.php" method="post" autocomplete="off">
                <input type="text" placeholder="Buscar novedad" name="txt_buscador">
                <button type="submit">
                    <span class="material-symbols-sharp">search</span>
                </button>
                <input type="hidden" name="modulo_buscador" value="buscar">
                <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
            </form>
            <a href="<?php echo APP_URL ?>adminNovedadesCrear">Crear Novedad</a>

        </div>
        <?php echo $insTecnica->listarNovedadControlador($url[1], 7, $url[0], ""); ?>


    <?php } else { ?>
        <div class="infoBuscar">
            <h1 class="titulo">Novedades</h1>

            <form class=" formAjax" action="<?php echo APP_URL ?>app/ajax/buscadorAjax.php" method="post" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="eliminar">
                <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
                <button class="eliminarBus">Eliminar búsqueda</button>
            </form>
            <p class="pBuscando">Estás buscando: <b>"<?php echo $_SESSION[$url[0]] ?>"</b></p>


        </div>
        <?php echo $insTecnica->listarNovedadControlador($url[1], 7, $url[0], $_SESSION[$url[0]]); ?>


    <?php } ?>




    <!------------------
           end main
        
          ------------------->
    <!----------------

          start right main 
        ---------------------->
</main>
<div class="right">
<?php require_once("./app/views/inc/admin/info.php") ?> 

</div>
</div>


<script src="<?php echo APP_URL ?>app/views/assets/js/admin/header.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/verInfo.js"></script>

</body>