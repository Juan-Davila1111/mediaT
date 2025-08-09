<?php
require_once("./app/views/inc/admin/header.php");
require_once("./app/views/inc/admin/aside.php");


use app\controllers\userController;

$insUsuario = new userController();
?>

<main class="mainTotal">
    <div class="contenedorAlert">
        <div class="contenedor-toast " id="contenedor-toast">

        </div>
    </div>
    <?php if ($_SESSION["tipo"] == "Superadministrador") { ?>


    <?php if (!isset($_SESSION[$url[0]]) && empty($_SESSION[$url[0]])) { ?>
        <div class="infoBuscar">
            <h1 class="titulo">Usuarios</h1>


            <form class="fondoInput formAjax" action="<?php echo APP_URL ?>app/ajax/buscadorAjax.php" method="post" autocomplete="off">
                <input type="text" placeholder="Buscar usuario" name="txt_buscador">
                <button type="submit">
                    <span class="material-symbols-sharp">search</span>
                </button>
                <input type="hidden" name="modulo_buscador" value="buscar">
                <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
            </form>
            <a href="<?php echo APP_URL ?>adminUserCrear">Crear usuario</a>

        </div>

        <?php echo $insUsuario->listarUsuarioControlador($url[1], 7, $url[0], ""); ?>

    <?php } else { ?>
        <div class="infoBuscar">
            <h1 class="titulo">Usuarios</h1>

            <form class=" formAjax" action="<?php echo APP_URL ?>app/ajax/buscadorAjax.php" method="post" autocomplete="off">
                <input type="hidden" name="modulo_buscador" value="eliminar">
                <input type="hidden" name="modulo_url" value="<?php echo $url[0]; ?>">
                <button class="eliminarBus">Eliminar búsqueda</button>
            </form>
            <p class="pBuscando">Estás buscando: <b>"<?php echo $_SESSION[$url[0]] ?>"</b></p>


        </div>
        <?php echo $insUsuario->listarUsuarioControlador($url[1], 7, $url[0], $_SESSION[$url[0]]); ?>


    <?php } ?>

    <?php } else { ?>
        <?php require_once("./app/views/inc/admin/permiso.php") ?>
        
        <?php   } ?>





</main>
<div class="right">
<?php require_once("./app/views/inc/admin/info.php") ?> 

</div>


</div>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/header.js"></script>
<script src="<?php echo APP_URL ?>app/views/assets/js/admin/tablasAjax.js"></script>

</body>