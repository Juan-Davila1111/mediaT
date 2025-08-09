<?php

require_once "../../config/config.php";
require_once "../../autoload.php";
// Se usa todas las funciones del controlador del login
use app\controllers\loginController;

if (isset($_POST['modulo_usuario'])) {

    $insLoginIni = new loginController();

    if ($_POST['modulo_usuario'] == "registrar") { //Registrar un nuevo usurio (crear una cuenta)
        echo $insLoginIni->registrarUsuarioControlador();
    }

    

}  else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}