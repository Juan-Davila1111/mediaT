<?php

require_once "../../config/config.php";
require_once "../../autoload.php";
require_once "../views/inc/user/session_star.php";
// Se usa todas las funciones del usercontroller
use app\controllers\userController;

if (isset($_POST['modulo_usuario'])) {

    $insUsuario = new userController();

    if ($_POST['modulo_usuario'] == "registrar") { //Registrar un usuario
        echo $insUsuario->registrarUsuarioControlador();
    }

    if ($_POST['modulo_usuario'] == "eliminar") { //Eliminar un usuario
        echo $insUsuario->eliminarUsuarioControlador();
    }

    
    if ($_POST['modulo_usuario'] == "actualizar") { //Actualizar un usuario
        echo $insUsuario->actualizarUsuariosControlador();
    }

    if ($_POST['modulo_usuario'] == "actualizarFoto") { // actualizar Foto de usuarios
        echo $insUsuario->actualizarFotoUsuarioControlador();
    }

    if ($_POST['modulo_usuario'] == "eliminarFoto") { // Eliminar Foto de usuarios
        echo $insUsuario->eliminarFotoUsuarioControlador();
    }

    if ($_POST['modulo_usuario'] == "EditarMiPerfil") { // Usuario podra actualizar sus datos
        echo $insUsuario->editarUsuarioSesion();
    }
}  else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}
