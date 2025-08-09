<?php

namespace app\controllers;

use app\models\mainModel;


// Modelo para los usuarios
class BuscadorController extends mainModel
{
    // Controlador de los modulos de busqueda
    public function moduloBusquedaControlador($modulo)
    {
        $lista_modulo = ["adminUser","adminNovedades","adminAdmin","adminContactenos","adminTecnicas"];

        if (in_array($modulo, $lista_modulo)) {

            return false;
        } else {

            return true;
        }
    }

    // Controlador inicar busqueda

    public function iniciarBuscadorControlador()
    {
        // Almecenar los datos del formulario
        $url = $this->limpiarCadena($_POST["modulo_url"]);
        $texto = $this->limpiarCadena($_POST["txt_buscador"]);

        if ($this->moduloBusquedaControlador($url)) {

            $alerta = [
                "tipo" => "error",
                "titulo" => "Ocurrió un error inesperado",
                "descripcion" => "No podemos procesar la petición en este momento",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }

        if ($texto == "") {
            $alerta = [
                "tipo" => "error",
                "titulo" => "Ocurrió un error inesperado",
                "descripcion" => "Introduce un termino de busqueda",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }

        if ($this->verificarDatos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}", $texto)) {
            $alerta = [
                "tipo" => "error",
                "titulo" => "Ocurrió un error inesperado",
                "descripcion" => "El termino de busqueda no coincide con el formato solicitado",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }

        $_SESSION[$url] = $texto;

        $alerta = [
            "tipo" => "redireccionar",
            "url" => APP_URL . $url . "/"
        ];
        return json_encode($alerta);
    }



    // Eliminar busqueda
    public function eliminarBuscadorControlador()
    {
        $url = $this->limpiarCadena($_POST["modulo_url"]);


        if ($this->moduloBusquedaControlador($url)) {

            $alerta = [
                "tipo" => "error",
                "titulo" => "Ocurrió un error",
                "descripcion" => "No podemos procesar la petición en este momento",
                "icono" => "error"
            ];
            return json_encode($alerta);
            exit();
        }
        unset($_SESSION[$url]);

        $alerta = [
            "tipo" => "redireccionar",
            "url" => APP_URL . $url . "/"
        ];
        return json_encode($alerta);
    }
}
