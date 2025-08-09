<?php


namespace app\controllers;

use app\models\mainModel;



// Controlador para los contactenos
class ContactenosController extends mainModel
{

    // Controlador listar contactenos
    public function listarContactenosControlador($pagina, $registros, $url, $busqueda)
    {

        $pagina = $this->limpiarCadena($pagina);
        $registros = $this->limpiarCadena($registros);

        $url = $this->limpiarCadena($url);
        $url = APP_URL . $url . "/";

        $busqueda = $this->limpiarCadena($busqueda);
        $tabla = '';

        $pagina = (isset($pagina) && $pagina > 0) ? (int)$pagina : 1;
        $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

        if (isset($busqueda) && $busqueda != "") {
            $consulta_datos = "SELECT * FROM tbl_contactenos WHERE (contac_nombres LIKE '%$busqueda%' OR contac_correo LIKE '%$busqueda%' OR contac_telefono LIKE '%$busqueda%')  ORDER BY contac_nombres ASC LIMIT $inicio,$registros";

            $consulta_total = "SELECT COUNT(contac_id) FROM tbl_contactenos WHERE (contac_nombres LIKE '%$busqueda%' OR contac_correo LIKE '%$busqueda%' OR contac_telefono LIKE '%$busqueda%') ";
        } else {
            $consulta_datos = "SELECT * FROM tbl_contactenos ORDER BY contac_nombres ASC LIMIT $inicio,$registros";
            $consulta_total = "SELECT COUNT(contac_id) FROM tbl_contactenos";
        }

        $datos = $this->ejecutarConsulta($consulta_datos);
        $datos = $datos->fetchAll();

        $total = $this->ejecutarConsulta($consulta_total);
        $total = $total->fetchColumn();

        $numeroPaginas = ceil($total / $registros);

        $tabla .= ' 
        <table class="tabla">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Mensaje</th>
                <th>Enviado</th>
                <th colspan="10">Acciones</th>
            </tr>
            </tr>
        </thead>
        <tbody>';


        if ($total >= 1 && $pagina <= $numeroPaginas) {
            $contador = $inicio + 1;
            $pag_inicio = $inicio + 1;

            foreach ($datos as $reg_baseDatos) {
                $tabla .= '

                  <div class="contenedorVerForo">
             <div class="foroTo">

            <span class="material-symbols-sharp cerrar">
                close
            </span>
            <div class="informacion">
                <p><span>Nombre:</span>' . $reg_baseDatos['contac_nombres'] . '</p>
                <p><span>Correo:</span>' . $reg_baseDatos['contac_correo'] . '</p>
                <p><span>Teléfono:</span>' . $reg_baseDatos['contac_telefono'] . '</p>
                <p><span>Enviado:</span>' . $reg_baseDatos['contac_enviado'] . '</p>

            </div>

            <div class="foro">
                <p>' . $reg_baseDatos['contac_mensaje'] . '</p>
            </div>
        </div>
     </div>
             <tr>
                <td>' . $contador . '</td>
                <td>' . $reg_baseDatos['contac_nombres'] . '</td>
                <td>' . $reg_baseDatos['contac_correo'] . '</td>
                <td>' . $reg_baseDatos['contac_telefono'] . '</td>
                <td class="verPoco" >' . $reg_baseDatos['contac_mensaje'] . '</td>
                <td>' . date("d-m-Y h:i:s A", strtotime($reg_baseDatos["contac_enviado"])) . '</td>
                 <td>
                      <a href="' . APP_URL . '#" class="leer foroLeer">Leer</a>
                  </td>

                <td>
                    <form class="formAjax" action="' . APP_URL . 'app/ajax/contactenosAjax.php" method="POST" autocomplete="off">

                        <input type="hidden" name="modulo_contactenos" value="eliminar">
                        <input type="hidden" name="contac_id" value="' . $reg_baseDatos['contac_id'] . '">

                        <button type="submit" class="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
                ';
                $contador++;
            }
            $pag_final = $contador - 1;
        } else {

            if ($total >= 1) {
                $tabla .= '
            <tr>
                <td class="recarTd" colspan="10"><a class="recargar" href="' . $url . '1/">Haga click para recargar el listado</a></td>
            </tr>';
            } else {
                $tabla .= '
            <tr>
                <td colspan="100">No hay registros en el sistema</td>
            </tr>
                ';
            }
        }


        $tabla .= '</tbody></table>';

        if ($total >= 1 && $pagina <= $numeroPaginas) {
            $tabla .= '
            <div class="mostrarInfo">
                <p>Mostrando contáctenos <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un total de <strong>' . $total . '</strong></p>
            </div>
            ';

            $tabla .= $this->paginadorTablas($pagina, $numeroPaginas, $url, 5);
        }

        return $tabla;
    }

    // Controlador eliminar contactenos
    public function eliminarContactenosControlador()
    {

        // Almacenar el id del usuario a eliminar
        $id = $this->limpiarCadena($_POST["contac_id"]);

        // Verificar que exista el usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_contactenos WHERE contac_id='$id'");

        if ($datos->rowCount() <= 0) { //Si no se encontro un usuaio

            $alerta = [
                "tipo" => "error",
                "titulo" => "Error al eliminar",
                "descripcion" => "El mensaje de contáctenos no existe en el sistema"

            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch(); //Almacenar los datos del usuario a eliminar
        }

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Elimino un contáctenos";
        $img_ac = $_SESSION["foto_admin"];

        // Arrys que contiene los valores que se van a insertar a la base de datos actulizaciones
        $admin_datos_ac = [
            [
                "campo_nombre" => "usuario",
                "campo_marcador" => ":Usuario",
                "campo_valor" => $usuario_ac

            ],

            [
                "campo_nombre" => "texto",
                "campo_marcador" => ":Texto",
                "campo_valor" => $texto_ac

            ],

            [
                "campo_nombre" => "img",
                "campo_marcador" => ":Img",
                "campo_valor" => $img_ac

            ]
        ];


        $eliminarUsuario = $this->eliminarDatos("tbl_contactenos", "contac_id", $id);

        if ($eliminarUsuario->rowCount() == 1) {
            $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);


            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Contáctenos eliminado con éxito",
                "descripcion" => "El mensaje de contáctenos ha sido eliminado del sistema"
            ];


            return  json_encode($alerta);
            exit();
        } else {

            $alerta = [
                "tipo" => "info",
                "titulo" => "Error al eliminar contáctenos",
                "descripcion" => "No se pudo eliminar"
            ];
            return  json_encode($alerta);
            exit();
        }
    }


    // Controlador agegaar contactenos
    public function agregarContactenosControlador()
    {

        $nombre = $this->limpiarCadena($_POST["nombre"]);
        $correo = $this->limpiarCadena($_POST["correo"]);
        $mensaje = $this->limpiarCadena($_POST["mensaje"]);
        $telefono = $this->limpiarCadena($_POST["telefono"]);

        // Verificar los inputs obligatorios
        if ($nombre == "" || $correo == "" || $mensaje == "" || $telefono == "") {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Campos Incompletos",
                "descripcion" => "Faltan campos obligatorios por completar."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares Nombres
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Nombre Incorrecto",
                "descripcion" => "El nombre ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }



        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Correo Incorrecto",
                "descripcion" => "El Correo ingresado no cumple con el formato requerido. Por favor, verifica tu información."

            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares Telefono
        if ($this->verificarDatos("[0-9]{5,40}", $telefono)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Número Incorrecto",
                "descripcion" => "El Númro ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $contac_datos_reg = [
            [
                "campo_nombre" => "contac_nombres",
                "campo_marcador" => ":Nombre",
                "campo_valor" => $nombre

            ],


            [
                "campo_nombre" => "contac_correo",
                "campo_marcador" => ":Apellido",
                "campo_valor" => $correo

            ],

            [
                "campo_nombre" => "contac_telefono",
                "campo_marcador" => ":Usuario",
                "campo_valor" => $telefono

            ],

            [
                "campo_nombre" => "contac_mensaje",
                "campo_marcador" => ":Correo",
                "campo_valor" => $mensaje

            ],

            [
                "campo_nombre" => "contac_enviado",
                "campo_marcador" => ":Creado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];


        // Insertando los datos a la base de datos
        $registar_usuario = $this->insertarDatos("tbl_contactenos", $contac_datos_reg);

        if ($registar_usuario->rowCount() == 1) {

            $alerta = [
                "tipo" => "recargar",
                "icono" => "exito",
                "titulo" => "Envio Exitoso",
                "descripcion" => "¡Gracias por su mensaje! Su petición ha sido enviada correctamente y será revisada por nuestros administradores pronto."
            ];

            return json_encode($alerta);
        }
    }
}
