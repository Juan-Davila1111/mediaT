<?php

require_once "../../config/config.php";
require_once "../../autoload.php";
require_once "../views/inc/user/session_star.php";

// Se usa todas las funciones del usercontroller
use app\controllers\tecnicasController;

if (isset($_POST['modulo_novedades'])) {

    $insTecnica = new tecnicasController();

    if ($_POST['modulo_novedades'] == "registrar") { //Registrar una novedad
        echo $insTecnica->registrarNovedadControlador();
    }

    if ($_POST['modulo_novedades'] == "eliminar") { //eliminar una novedad
        echo $insTecnica->eliminarNovedadControlador();
    }

    if ($_POST['modulo_novedades'] == "eliminar2") { //eliminar un foro
        echo $insTecnica->eliminarForoControlador();
    }

    if ($_POST['modulo_novedades'] == "actualizar") { //Actalizar una novedad
        echo $insTecnica->actualizarNovedadControlador();
    }


    if ($_POST['modulo_novedades'] == "actualizarFoto") { //Actualizar foto
        echo $insTecnica->actualizarFotoNovedadControlador();
    }

    if ($_POST['modulo_novedades'] == "eliminarFoto") { //Elimianar foto
        echo $insTecnica->eliminarFotoNovedadControlador();
    }

    if ($_POST['modulo_novedades'] == "registrarForo") { //Agregar foto
        echo $insTecnica->agregarForo();
    }
} else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}
