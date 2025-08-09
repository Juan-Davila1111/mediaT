 <?php require_once("./app/views/inc/admin/header.php") ?>
 <?php require_once("./app/views/inc/admin/aside.php") ?>


 <main class="mainTotal">
     <div class="contenedorAlert">
         <div class="contenedor-toast " id="contenedor-toast">

         </div>
     </div>
     <?php if ($_SESSION["tipo"] == "Superadministrador") { ?>

         <div class="tituloRegre">
             <h1 class="titulo">Crear admin</h1>
             <?php require_once("./app/views/inc/admin/btnRegresar.php") ?>
         </div>
         <form class="formEditar formAjax" action="<?php echo APP_URL; ?>app/ajax/adminAjax.php" method="post" autocomplete="off">
             <div class="form-groups">

                 <input type="hidden" name="modulo_admin" value="registrar">

                 <div class="form-group datosGrandes">
                     <label for="nombre">
                         <input type="text" placeholder="Nombres" name="admin_nombres">
                     </label>
                 </div>

                 <div class="form-group datosGrandes">
                     <label for="usuario">
                         <input type="text" placeholder="Usuario" name="admin_usuario">
                     </label>

                     <label for="email">
                         <input type="text" placeholder="Email" name="admin_email">
                     </label>

                     <select name="admin_tipo" id="tipo">
                         <option value="Superadministrador">Superadministrador</option>
                         <option value="Administrador General">Administrador General</option>
                     </select>

                 </div>



                 <div class="form-group datosGrandes">
                     <label for="password1">
                         <input type="password" placeholder="Contraseña" name="admin_password1">
                     </label>
                     <label for="password2">
                         <input type="password" placeholder="Confirmar contraseña" name="admin_password2">
                     </label>

                 </div>
             </div>


             <div class="form-group-btn">
                 <button type="submit" class="editar">Crear</button>
                 <button type="reset" class="eliminar">Limpiar</button>
             </div>

         </form>

     <?php } else { ?>
         <?php require_once("./app/views/inc/admin/permiso.php") ?>
     <?php   } ?>
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