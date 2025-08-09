<div class="top">
    <button id="menu_bar">
        <span class="material-symbols-sharp">menu</span>
    </button>

    <div class="theme-toggler">
        <span class="material-symbols-sharp active">light_mode</span>
        <span class="material-symbols-sharp">dark_mode</span>
    </div>
    <div class="profile">
        <div class="info">
            <p><b><?php echo $_SESSION["usuario_admin"] ?></b></p>
            <p><?php echo $_SESSION["tipo"] ?></p>
        </div>
        <div class="profile-photo">
        <?php $ruta_img = APP_URL . "app/views/assets/img/admin/fotoUser/" . $_SESSION["foto_admin"] ?>

            <?php if($_SESSION["foto_admin"] == "" && !is_file($ruta_img)) {?>
            <img src="<?php echo APP_URL?>app/views/assets/img/admin/fotoUser/defecto.png" alt="" />
            <?php }else{?>
            <img src="<?php echo APP_URL?>app/views/assets/img/admin/fotoUser/<?php echo $_SESSION["foto_admin"]  ?>" alt="" />
            <?php }?>



        </div>
    </div>
</div>

