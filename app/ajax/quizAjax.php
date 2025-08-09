<?php
// Incluir archivos de la configuración
require_once "../../config/config.php";
require_once "../../autoload.php";
require_once "../views/inc/user/session_star.php";

use app\controllers\quizController;


if (isset($_POST['modulo_quiz'])) {

    $insBuscador = new quizController();

    if ($_POST['modulo_quiz'] == "agregar") {//Agregar un nuevo tema

        echo $insBuscador->agregarNuevoTema();
    }

    if ($_POST['modulo_quiz'] == "agregarPreguntas") {//Agregar una nueva pregunta

        echo $insBuscador->insertarPregunta();
    }

    if ($_POST['modulo_quiz'] == "eliminarPregunta") { //Eliminar pregunta

        echo $insBuscador->EliminarPregunta();
    }

    if ($_POST['modulo_quiz'] == "editarPregunta") { //Editar pregunta

        echo $insBuscador->EditarPregunta();
    }
}  else {
    session_destroy();
    header("Location: " . APP_URL . "login/");
}