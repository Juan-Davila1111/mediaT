<?php

require_once "../../config/config.php";
require_once "../../autoload.php";
require_once "../views/inc/user/session_star.php";
// Se usa todas las funciones del controlador de contactenos

use app\controllers\ContactenosController;

if (isset($_POST['modulo_contactenos'])) {

    $insContac = new ContactenosController();

    if ($_POST['modulo_contactenos'] == "agregar") { //Registrar un nuevo mensaje de contatecnos
        echo $insContac->agregarContactenosControlador();
    }

    if ($_POST['modulo_contactenos'] == "eliminar") { //Registrar un nuevo mensaje de contatecnos
        echo $insContac->eliminarContactenosControlador();
    }
} else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}
