<?php  
if (!isset($_SESSION['id_admin']) || 
!isset($_SESSION['usuario_admin']) || 
!isset($_SESSION['tipo']) || 
empty($_SESSION['id_admin']) || 
empty($_SESSION['usuario_admin']) || 
empty($_SESSION['tipo'])) {



$insLogin->cerrarSessionControlador();
exit();
}
?>

<div class="alertaAceptar">
    <div class="alertaAceptarContenedor">
        <div class="iconoAlerta">
            <span class="material-symbols-sharp">question_mark</span>
        </div>
        <div class="alertaTexto">
            <h5>¿Estás seguro?</h5>
            <p>¿Estás Seguro de cerrar la sesión actual.</p>
        </div>
        <div class="alertaAceptarBotones">
            <button class="siEnv" >Sí,cerrar</button>
            <button class="noEnv" >Cancelar</button>
        </div>
    </div>
</div>

<aside>
    <div class="top">
        <div class="logo">
            <h2 class="correr"><span class="danger">MediaT</span></h2>
        </div>
        <div class="close" id="close_btn">
            <span class="material-symbols-sharp">
                close
            </span>
        </div>
    </div>
    
    <!-- end top -->
    <div class="sidebar">
        <a href="<?php echo APP_URL ?>admin">
            <span class="material-symbols-sharp">grid_view </span>
            <h3>Dashboard</h3>
        </a>
        <a href="<?php echo APP_URL ?>adminAdmin/">
            <span class="material-symbols-sharp">admin_panel_settings</span>
            <h3>Administradores</h3>
        </a>
        <a href="<?php echo APP_URL ?>adminUser/">
            <span class="material-symbols-sharp">person_outline</span>
            <h3>Usuarios</h3>
        </a>
        <a href="<?php echo APP_URL ?>adminQuiz/">
            <span class="material-symbols-sharp">quiz</span>
            <h3>Quiz</h3>
        </a>

        <a href="<?php echo APP_URL ?>adminTecnicas/">
            <span class="material-symbols-sharp">school</span>
            <h3>Media técnicas</h3>
        </a>

        <a href="<?php echo APP_URL ?>adminContactenos/">
            <span class="material-symbols-sharp">call</span>
            <h3>Contáctenos</h3>
        </a>
        <a href="<?php echo APP_URL ?>adminNovedades/">
            <span class="material-symbols-sharp">settings </span>
            <h3>Novedades</h3>
        </a>
        <a href="<?php echo APP_URL?>/cerrarSesion" class="cerrarSe" >
            <span class="material-symbols-sharp">logout </span>
            <h3>Salir</h3>
        </a>



    </div>

</aside>
