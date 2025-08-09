<?php
// Incluir archivos de la configuración
require_once "../../config/config.php";
require_once "../../autoload.php";
require_once "../views/inc/user/session_star.php";

use app\controllers\BuscadorController;


if (isset($_POST['modulo_buscador'])) {

    $insBuscador = new BuscadorController();

    if ($_POST['modulo_buscador'] == "buscar") {

        echo $insBuscador->iniciarBuscadorControlador();
    }

    if ($_POST['modulo_buscador'] == "eliminar") {

        echo $insBuscador->eliminarBuscadorControlador();
    }
}  else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}

