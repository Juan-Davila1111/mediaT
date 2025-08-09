<?php
#-------------- Incluyendo los archivos de la configuración -----
require_once("./config/config.php");
require_once("autoload.php");
#-------------- Incluyendo el archivo de inicio de sesión -----
require_once("./app/views/inc/user/session_star.php");
use app\controllers\ContadorController;
$insContador = new ContadorController();

// Contador de vistas
 $visitas = $insContador->contadorVistas();
 $contador = $insContador->obtenerContador();


if (isset($_GET["views"])) {
    $url = explode("/", $_GET['views']);
    if($url[0]=="pdf"){
        require_once("./app/views/user/pdf-view.php");
    }
} else {
    $url = ["dashboard"];
}
?>
<!-- //-------------- Estructura báscia de html -->
<!DOCTYPE html>
<html lang="es" class="overflow">
<?php


use app\controllers\loginController;

$insLogin = new loginController();
#------Llamando al controlador de vistas 
use app\controllers\viewsController;
#-----------LLamando una nueva instancia del controlador
$viewsController = new viewsController();
$vista = $viewsController->obtenerVistasControlador($url[0]);

// Incluyendo la vista 
if ($vista === "404" || $vista =="dashboard") {
    require_once("./app/views/user/" . $vista . "-view.php");
} else {
    require_once($vista);
}

?>

</html>