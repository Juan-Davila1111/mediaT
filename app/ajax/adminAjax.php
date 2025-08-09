<?php

require_once "../../config/config.php";
require_once "../../autoload.php";
require_once "../views/inc/user/session_star.php";

// Se usa todas las funciones del adminController
use app\controllers\adminController;

if (isset($_POST['modulo_admin'])) {

    $insAdmin = new adminController();

    if ($_POST['modulo_admin'] == "registrar") { //Registrar un administrador
        echo $insAdmin->registrarAdminControlador();
    }

    if ($_POST['modulo_admin'] == "eliminar") { //Registrar un administrador
        echo $insAdmin->eliminarAdminControlador();
    }

    if ($_POST['modulo_admin'] == "actualizar") { //Registrar un administrador
        echo $insAdmin->actualizarAdminControlador();
    }

    if ($_POST['modulo_admin'] == "actualizarFoto") { //Actualizar foto de un administrador
        echo $insAdmin->actualizarFotoAdminControlador();
    }

    
    if ($_POST['modulo_admin'] == "eliminarFoto") { //Eliminar foto de un administrador
        echo $insAdmin->EliminarFotoAdminControlador();
    }

}  else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}