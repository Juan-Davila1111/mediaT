<?php


namespace app\controllers;

use app\models\mainModel;

class tecnicasController extends mainModel
{


    // Función para insertar una nueva novedad
    public function registrarNovedadControlador()
    {

        // Almecenar los datos del formulario
        $fecha = $this->limpiarCadena($_POST["novedades_fecha"]);
        $titulo = $this->limpiarCadena($_POST["novedades_titulo"]);
        $comentario = $this->limpiarCadena($_POST["novedadades_comentario"]);
        $tecnica = $this->limpiarCadena($_POST["novedades_tecnica"]);

        // Verificar los inputs obligatorios
        if ($fecha == "" || $titulo == "" || $comentario == "" || $tecnica == "") {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Campos Incompletos",
                "descripcion" => "Faltan campos obligatorios por completar."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulare. Título
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $titulo)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Título Incorrecto",
                "descripcion" => "El Título ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares. Técnica
        if ($this->verificarDatos("[a-zA]{3,40}", $tecnica)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Técnica Incorrecta",
                "descripcion" => "La Técnica ingresada no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/user/media-tecnica/novedades/";

        // Comprobar si se selecciono una foto
        if ($_FILES["novedades_foto"]["name"] != "" && $_FILES["novedades_foto"]["size"] > 0) {

            // Crear el directorio de las imagenes
            if (!file_exists($img_dir)) {
                if (!mkdir($img_dir, 0777)) {

                    $alerta = [
                        "tipo" => "error",
                        "icono" => "error",
                        "titulo" => "Error al crear carpeta",
                        "descripcion" => "No se pudo crear la carpeta especificada. Por favor, verifica los permisos y la ruta."
                    ];

                    return json_encode($alerta);
                    exit();
                }
            }

            // Verificar el formato de la imágen
            if (mime_content_type($_FILES["novedades_foto"]["tmp_name"]) != "image/jpeg" && mime_content_type($_FILES["novedades_foto"]["tmp_name"]) != "image/png") {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Formato de Imagen No Permitido",
                    "descripcion" => "La imagen que intentas subir no es de un formato permitido."
                ];

                return json_encode($alerta);
                exit();
            }

            // Verificar el peso de la imágen
            if (($_FILES["novedades_foto"]["size"] / 1024) > 5120) {

                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Imagen Excede el Tamaño Permitido",
                    "descripcion" => "La imagen que intentas subir excede el tamaño máximo permitido."
                ];

                return json_encode($alerta);
                exit();
            }

            // Crear el nombre de la foto.Se remplaza los espacios en blanco y se le pone un guión bajo
            $foto = str_ireplace(" ", "_", $titulo);
            $foto = $foto . "_" . rand(0, 100);

            switch (mime_content_type($_FILES["novedades_foto"]["tmp_name"])) {

                case "image/jpeg":
                    $foto = $foto . ".jpg";
                    break;

                case "image/png":
                    $foto = $foto . ".png";
                    break;
            }

            // Dar permisos a la carpeta
            chmod($img_dir, 0777);
            // Subir la imagen
            if (!move_uploaded_file($_FILES["novedades_foto"]["tmp_name"], $img_dir . $foto)) {

                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Error al Mover la Imagen",
                    "descripcion" => "No se pudo mover la imagen al destino deseado. Por favor, verifica los permisos y vuelve a intentarlo."
                ];

                return json_encode($alerta);
                exit();
            }
        } else {
            $foto = "";
        }


        // Arrys que contiene los valores que se van a mandar a la base de datos
        $novedades_datos_reg = [
            [
                "campo_nombre" => "novedades_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => $foto

            ],


            [
                "campo_nombre" => "novedades_fecha",
                "campo_marcador" => ":Fecha",
                "campo_valor" => $fecha

            ],

            [
                "campo_nombre" => "novedades_titulo",
                "campo_marcador" => ":Titulo",
                "campo_valor" => $titulo

            ],

            [
                "campo_nombre" => "novedades_texto",
                "campo_marcador" => ":Texto",
                "campo_valor" => $comentario

            ],


            [
                "campo_nombre" => "novedades_tecnica",
                "campo_marcador" => ":Tecnica",
                "campo_valor" => $tecnica

            ],
        ];

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Agreo una nueva novedad";
        $img_ac = $_SESSION["foto_admin"];

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
        $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);
        // Insertando los datos a la base de datos
        $registar_novedad = $this->insertarDatos("tbl_novedades", $novedades_datos_reg);


        if ($registar_novedad->rowCount() == 1) {

            $alerta = [
                "tipo" => "exito",
                "icono" => "success",
                "titulo" => "Registro Exitoso",
                "descripcion" => "La novedad ha sido registrado correctamente."
            ];
        } else {

            if (is_file($img_dir . $foto)) {

                chmod($img_dir . $foto, 0777);
                unlink($img_dir . $foto);
            }

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Registrar Usuario",
                "descripcion" => "No se pudo registrar el usuario en la base de datos."
            ];
        }

        return json_encode($alerta);
    }


    // Función para listar la tabla de novedades
    public function listarNovedadControlador($pagina, $registros, $url, $busqueda)
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
            $consulta_datos = "SELECT * FROM tbl_novedades WHERE (novedades_titulo LIKE '%$busqueda%' OR novedades_tecnica LIKE '%$busqueda')  ORDER BY novedades_tecnica ASC LIMIT $inicio,$registros";

            $consulta_total = "SELECT COUNT(novedades_id) FROM tbl_novedades WHERE (novedades_titulo LIKE '%$busqueda%' OR novedades_tecnica LIKE '%$busqueda') ";
        } else {
            $consulta_datos = "SELECT * FROM tbl_novedades ORDER BY novedades_tecnica ASC LIMIT $inicio,$registros";
            $consulta_total = "SELECT COUNT(novedades_id) FROM tbl_novedades";
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
                  <th>Fecha</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Técnica</th>
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
                <p><span>Título:</span>' . $reg_baseDatos['novedades_titulo'] . '</p>
                <p><span>Fecha:</span>' . $reg_baseDatos['novedades_fecha'] . '</p>
                <p><span>Media técnica:</span>' . $reg_baseDatos['novedades_tecnica'] . '</p>

            </div>

            <div class="foro">
                <p>' . $reg_baseDatos['novedades_texto'] . '</p>
            </div>
        </div>
    </div>
               <tr>
                  <td>' . $contador . '</td>
                  <td>' . $reg_baseDatos['novedades_fecha'] . '</td>
                  <td class="verPoco" >' . $reg_baseDatos['novedades_titulo'] . '</td>
                  <td class="verPoco" >' . $reg_baseDatos['novedades_texto'] . '</td>
                  <td>' . $reg_baseDatos['novedades_tecnica'] . '</td>
                <td>
                      <a href="' . APP_URL . '#" class="leer foroLeer">Leer</a>
                    
                  </td>
                  <td>
                      <a href="' . APP_URL . 'adminNovedadesFoto/' . $reg_baseDatos['novedades_id'] . '/" class="foto">Foto</a>
                  </td>
                  <td>
                      <a href="' . APP_URL . 'adminNovedadesEditar/' . $reg_baseDatos['novedades_id'] . '/" class="editar">Editar</a>
                  </td>
                  <td>
                      <form class="formAjax" action="' . APP_URL . 'app/ajax/tecnicasAjax.php" method="POST" autocomplete="off">
  
                          <input type="hidden" name="modulo_novedades" value="eliminar">
                          <input type="hidden" name="novedades_id" value="' . $reg_baseDatos['novedades_id'] . '">
  
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
                  <p>Mostrando novedades <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un total de <strong>' . $total . '</strong></p>
              </div>
              ';

            $tabla .= $this->paginadorTablas($pagina, $numeroPaginas, $url, 5);
        }

        return $tabla;
    }


    // Función eliminar novedad
    public function eliminarNovedadControlador()
    {

        // Almacenar el id del usuario a eliminar
        $id = $this->limpiarCadena($_POST["novedades_id"]);

        // Verificar que exista el usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_novedades WHERE novedades_id='$id'");

        if ($datos->rowCount() <= 0) { //Si no se encontra novedad

            $alerta = [
                "tipo" => "error",
                "titulo" => "Error al eliminar la novedad",
                "descripcion" => "La novedad no existe en el sistema"

            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch(); //Almacenar los datos de la novedad a eliminar
        }


        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Elimino una novedad";
        $img_ac = $_SESSION["foto_admin"];

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
        $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);

        $eliminarUsuario = $this->eliminarDatos("tbl_novedades", "novedades_id", $id);



        if ($eliminarUsuario->rowCount() == 1) {
            if (is_file("../views/assets/img/user/media-tecnica/novedades/" . $datos["novedades_foto"])) {

                chmod("../views/assets/img/user/media-tecnica/novedades/" . $datos["novedades_foto"], 0777);
                unlink("../views/assets/img/user/media-tecnica/novedades/" . $datos["novedades_foto"]);
            }

            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Novedad eliminada con éxito",
                "descripcion" => "La novedad ha sido eliminada del sistema"
            ];


            return  json_encode($alerta);
            exit();
        } else {

            $alerta = [
                "tipo" => "info",
                "titulo" => "Error al eliminar novedad",
                "descripcion" => "No se pudo eliminar la novedad"
            ];
            return  json_encode($alerta);
            exit();
        }
    }

    // Controlador actualizar novedades
    public function actualizarNovedadControlador()
    {

        // Almacenar el id del usuario a actualizar
        $id = $this->limpiarCadena($_POST["novedades_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_novedades WHERE novedades_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Novedad no encontrado",
                "descripcion" => "La novedad que deseas eliminar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch();
        }

        // Almecenar los datos del formulario
        $fecha = $this->limpiarCadena($_POST["novedades_fecha"]);
        $titulo = $this->limpiarCadena($_POST["novedades_titulo"]);
        $comentario = $this->limpiarCadena($_POST["novedadades_comentario"]);
        $tecnica = $this->limpiarCadena($_POST["novedades_tecnica"]);

        // Verificar los inputs obligatorios
        if ($fecha == "" || $titulo == "" || $comentario == "" || $tecnica == "") {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Campos Incompletos",
                "descripcion" => "Faltan campos obligatorios por completar."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulare. Título
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $titulo)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Título Incorrecto",
                "descripcion" => "El Título ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares. Técnica
        if ($this->verificarDatos("[a-zA]{3,40}", $tecnica)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Técnica Incorrecta",
                "descripcion" => "La Técnica ingresada no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/user/media-tecnica/novedades/";

        // Comprobar si se selecciono una foto
        if ($_FILES["novedades_foto"]["name"] != "" && $_FILES["novedades_foto"]["size"] > 0) {



            // Crear el directorio de las imagenes
            if (!file_exists($img_dir)) {
                if (!mkdir($img_dir, 0777)) {

                    $alerta = [
                        "tipo" => "error",
                        "icono" => "error",
                        "titulo" => "Error al crear carpeta",
                        "descripcion" => "No se pudo crear la carpeta especificada. Por favor, verifica los permisos y la ruta."
                    ];

                    return json_encode($alerta);
                    exit();
                }
            }

            // Verificar el formato de la imágen
            if (mime_content_type($_FILES["novedades_foto"]["tmp_name"]) != "image/jpeg" && mime_content_type($_FILES["novedades_foto"]["tmp_name"]) != "image/png") {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Formato de Imagen No Permitido",
                    "descripcion" => "La imagen que intentas subir no es de un formato permitido."
                ];

                return json_encode($alerta);
                exit();
            }

            // Verificar el peso de la imágen
            if (($_FILES["novedades_foto"]["size"] / 1024) > 5120) {

                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Imagen Excede el Tamaño Permitido",
                    "descripcion" => "La imagen que intentas subir excede el tamaño máximo permitido. Por favor, sube una imagen de menor tamaño."
                ];

                return json_encode($alerta);
                exit();
            }

            // Crear el nombre de la foto.Se remplaza los espacios en blanco y se le pone un guión bajo
            if ($datos["novedades_foto"] != "") {
                $foto = explode(".", $datos["novedades_foto"]);
                $foto = $foto[0];
                $foto = $foto . "1";
                $foto = str_ireplace(" ", "", $foto);
            } else {
                $foto = explode(".", $_FILES["novedades_foto"]["name"]);
                $foto[0] = $datos["novedades_titulo"];
                $foto = str_ireplace(" ", "_", $datos["novedades_titulo"]);
                $foto = $foto . "_" . rand(0, 100);
            }

            // Agregar extensión a la foto
            switch (mime_content_type($_FILES["novedades_foto"]["tmp_name"])) {

                case "image/jpeg":
                    $foto = $foto . ".jpg";
                    break;

                case "image/png":
                    $foto = $foto . ".png";
                    break;
            }

            // Dar permisos a la carpeta
            chmod($img_dir, 0777);
            // Subir la imagen
            if (!move_uploaded_file($_FILES["novedades_foto"]["tmp_name"], $img_dir . $foto)) {

                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Error al Mover la Imagen",
                    "descripcion" => "No se pudo mover la imagen al destino deseado. Por favor, verifica los permisos y vuelve a intentarlo."
                ];

                return json_encode($alerta);
                exit();
            }

            // Eliminando imágen anterior
            if (is_file($img_dir . $datos['novedades_foto']) && $datos['novedades_foto'] != $foto) {

                chmod($img_dir . $datos['novedades_foto'], 0777);
                unlink($img_dir . $datos['novedades_foto']);
            }
        } else {
            $foto = "";
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos a actualizar
        $novedades_datos_reg = [
            [
                "campo_nombre" => "novedades_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => $foto

            ],


            [
                "campo_nombre" => "novedades_fecha",
                "campo_marcador" => ":Fecha",
                "campo_valor" => $fecha

            ],

            [
                "campo_nombre" => "novedades_titulo",
                "campo_marcador" => ":Titulo",
                "campo_valor" => $titulo

            ],

            [
                "campo_nombre" => "novedades_texto",
                "campo_marcador" => ":Texto",
                "campo_valor" => $comentario

            ],


            [
                "campo_nombre" => "novedades_tecnica",
                "campo_marcador" => ":Tecnica",
                "campo_valor" => $tecnica

            ],
        ];

        $condicion = [
            "condicion_campo" => "novedades_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];


        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Modificó nueva novedad";
        $img_ac = $_SESSION["foto_admin"];

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
        $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);

        if ($this->actualizarDatos("tbl_novedades", $novedades_datos_reg, $condicion)) {
            $alerta = [
                "tipo" => "exito",
                "icono" => "success",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "La novedad ha sido actualizado correctamente."
            ];
        } else {


            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Actualizar Usuario",
                "descripcion" => "No se pudo actualizar la novedad en la base de datos."
            ];
        }

        return json_encode($alerta);
    }


    // Actualizar foto novedad
    public function actualizarFotoNovedadControlador()
    {

        // Almacenar el id del usuario 
        $id = $this->limpiarCadena($_POST["novedades_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_novedades WHERE novedades_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Novedad no encontrada",
                "descripcion" => "La foto de la novedad que deseas eliminar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/user/media-tecnica/novedades/";

        // Comprobar si se selecciono una foto
        if ($_FILES["novedades_foto"]["name"] == "" && $_FILES['novedades_foto']['size'] <= 0) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al subir foto",
                "descripcion" => "No ha seleccionado una foto válida."
            ];
            return json_encode($alerta);
            exit();
        }

        // Crear el directorio de las imagenes
        if (!file_exists($img_dir)) {
            if (!mkdir($img_dir, 0777)) {

                $alerta = [
                    "tipo" => "simple",
                    "icono" => "error",
                    "titulo" => "Error al crear carpeta",
                    "descripcion" => "No se pudo crear la carpeta especificada. Por favor, verifica los permisos y la ruta."
                ];

                return json_encode($alerta);
                exit();
            }
        }

        // Verificar el formato de la imágen
        if (mime_content_type($_FILES["novedades_foto"]["tmp_name"]) != "image/jpeg" && mime_content_type($_FILES["novedades_foto"]["tmp_name"]) != "image/png") {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Formato de Imagen No Permitido",
                "descripcion" => "La imagen que intentas subir no es de un formato permitido."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar el peso de la imágen
        if (($_FILES["novedades_foto"]["size"] / 1024) > 5120) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Imagen Excede el Tamaño Permitido",
                "descripcion" => "La imagen que intentas subir excede el tamaño máximo permitido. Por favor, sube una imagen de menor tamaño."
            ];

            return json_encode($alerta);
            exit();
        }

        // Crear el nombre de la foto.Se remplaza los espacios en blanco y se le pone un guión bajo
        if ($datos["novedades_foto"] != "") {
            $foto = explode(".", $datos["novedades_foto"]);
            $foto = $foto[0];
            $foto = $foto . "1";
            $foto = str_ireplace(" ", "", $foto);
        } else {
            $foto = explode(".", $_FILES["novedades_foto"]["name"]);
            $foto[0] = $datos["novedades_titulo"];
            $foto = str_ireplace(" ", "_", $datos["novedades_titulo"]);
            $foto = $foto . "_" . rand(0, 100);
        }

        // Agregar extensión a la foto
        switch (mime_content_type($_FILES["novedades_foto"]["tmp_name"])) {

            case "image/jpeg":
                $foto = $foto . ".jpg";
                break;

            case "image/png":
                $foto = $foto . ".png";
                break;
        }

        // Dar permisos a la carpeta
        chmod($img_dir, 0777);
        // Subir la imagen
        if (!move_uploaded_file($_FILES["novedades_foto"]["tmp_name"], $img_dir . $foto)) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Mover la Imagen",
                "descripcion" => "No se pudo mover la imagen al destino deseado. Por favor, verifica los permisos y vuelve a intentarlo."
            ];

            return json_encode($alerta);
            exit();
        }

        // Eliminando imágen anterior
        if (is_file($img_dir . $datos['novedades_foto']) && $datos['novedades_foto'] != $foto) {

            chmod($img_dir . $datos['novedades_foto'], 0777);
            unlink($img_dir . $datos['novedades_foto']);
        }


        // Arrys que contiene los valores que se van a mandar a la base de datos
        $novedades_datos_up = [
            [
                "campo_nombre" => "novedades_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => $foto

            ]
        ];

        $condicion = [
            "condicion_campo" => "novedades_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        if ($this->actualizarDatos("tbl_novedades", $novedades_datos_up, $condicion)) {

            $alerta = [
                "tipo" => "exito",
                "icono" => "exito",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "La foto de la novedad ha sido actualizado correctamente."
            ];
        } else {

            $alerta = [
                "tipo" => "recargar",
                "icono" => "warning",
                "titulo" => "Error al Actualizar la foto",
                "descripcion" => "No hemos podido actualizar de la novedad",

            ];
        }

        return json_encode($alerta);
    }


    // Eliminar imagen novedad
    public function eliminarFotoNovedadControlador()

    {
        // Almacenar el id del usuario 
        $id = $this->limpiarCadena($_POST["novedades_id"]);


        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_novedades WHERE novedades_id='$id'");


        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Imágen de novedad no encontrada",
                "descripcion" => "La foto de la novedad que deseas eliminar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/user/media-tecnica/novedades/";
        chmod($img_dir, 0777);

        if (is_file($img_dir . $datos["novedades_foto"])) {

            chmod($img_dir . $datos["novedades_foto"], 0777);

            if (!unlink($img_dir . $datos["novedades_foto"])) {

                $alerta = [
                    "tipo" => "simple",
                    "icono" => "error",
                    "titulo" => "Foto de la novedad No Encontrada",
                    "descripcion" => "No hemos encontrado la foto de la novedad en el sistema."
                ];

                return json_encode($alerta);
                exit();
            }
        } else {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Foto de la novedad no encontrado",
                "descripcion" => "No hemos encontrado la foto del usuario en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $novedade_datos_up = [
            [
                "campo_nombre" => "novedades_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => ""

            ]
        ];

        $condicion = [
            "condicion_campo" => "novedades_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        if ($this->actualizarDatos("tbl_novedades", $novedade_datos_up, $condicion)) {

            $alerta = [
                "tipo" => "recargar",
                "icono" => "exito",
                "titulo" => "Foto eliminada",
                "descripcion" => "La foto de la novedad ha sido eliminada correctamente."
            ];
        }

        return json_encode($alerta);
    }

    // Agregar nuevo foro
    public function agregarForo()
    {
        $usuario = $this->limpiarCadena($_POST['usuario']);
        $foto = $this->limpiarCadena($_POST['foto']);
        $descripcion = $this->limpiarCadena($_POST['comentario']);
        $tecnica = $this->limpiarCadena($_POST['tecnica']);


        if ($descripcion == "") {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al agregar foro",
                "descripcion" => "La descripción del foro no puede estar vacía."
            ];
            return json_encode($alerta);
            exit();
        }

        $datos_mandar = [
            [
                "campo_nombre" => "foro_usuario",
                "campo_marcador" => ":Foro",
                "campo_valor" => $usuario

            ],

            [
                "campo_nombre" => "foro_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => $foto

            ],

            [
                "campo_nombre" => "foro_texto",
                "campo_marcador" => ":Texto",
                "campo_valor" => $descripcion

            ],

            [
                "campo_nombre" => "foro_tecnica",
                "campo_marcador" => ":Tecnica",
                "campo_valor" => $tecnica

            ],

            [
                "campo_nombre" => "foro_publicado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];

        // Insertando los datos a la base de datos
        $registar_foro = $this->insertarDatos("tbl_foros", $datos_mandar);

        if ($registar_foro->rowCount() == 1) {

            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Registro Exitoso",
                "descripcion" => "Su foro ha sido registrado correctamente."
            ];
        } else {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Registrar foro",
                "descripcion" => "No se pudo registrar el foro."
            ];
        }
        return json_encode($alerta);
    }


    // Función para listar la tabla de foros
    public function listarForoControlador($pagina, $registros, $url, $busqueda)
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
            $consulta_datos = "SELECT * FROM tbl_foros WHERE (foro_usuario LIKE '%$busqueda%' OR foro_tecnica LIKE '%$busqueda')  ORDER BY foro_tecnica ASC LIMIT $inicio,$registros";

            $consulta_total = "SELECT COUNT(foro_id) FROM tbl_foros WHERE (foro_usuario LIKE '%$busqueda%' OR foro_tecnica LIKE '%$busqueda') ";
        } else {
            $consulta_datos = "SELECT * FROM tbl_foros ORDER BY foro_tecnica ASC LIMIT $inicio,$registros";
            $consulta_total = "SELECT COUNT(foro_id) FROM tbl_foros";
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
                  <th>Usuario</th>
                  <th>Publicado</th>
                  <th>Texto</th>
                  <th>Técnica</th>
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
                <p><span>Usuario: </span>' . $reg_baseDatos['foro_usuario'] . '</p>
                <p><span>Publicado: </span>' . $reg_baseDatos['foro_publicado'] . '</p>
                <p><span>Media técnica: </span>' . $reg_baseDatos['foro_tecnica'] . '</p>

            </div>

            <div class="foro">
                <p>' . $reg_baseDatos['foro_texto'] . '</p>
            </div>
        </div>
    </div>
               <tr>
                  <td>' . $contador . '</td>
                  <td>' . $reg_baseDatos['foro_usuario'] . '</td>
                  <td class="verPoco" >' . $reg_baseDatos['foro_publicado'] . '</td>
                  <td class="verPoco" >' . $reg_baseDatos['foro_texto'] . '</td>
                  <td>' . $reg_baseDatos['foro_tecnica'] . '</td>
                <td>
                      <a href="' . APP_URL . '#" class="leer foroLeer">Leer</a>
                    
                  </td>
                  <td>
                      <form class="formAjax" action="' . APP_URL . 'app/ajax/tecnicasAjax.php" method="POST" autocomplete="off">
  
                          <input type="hidden" name="modulo_novedades" value="eliminar2">
                          <input type="hidden" name="foro_id" value="' . $reg_baseDatos['foro_id'] . '">
  
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
                  <p>Mostrando foros <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un total de <strong>' . $total . '</strong></p>
              </div>
              ';

            $tabla .= $this->paginadorTablas($pagina, $numeroPaginas, $url, 5);
        }

        return $tabla;
    }

    public function eliminarForoControlador()
    {


        // Almacenar el id del usuario a eliminar
        $id = $this->limpiarCadena($_POST["foro_id"]);


        // Verificar que exista el usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_foros WHERE foro_id='$id'");

        if ($datos->rowCount() <= 0) { //Si no se encontra novedad

            $alerta = [
                "tipo" => "error",
                "titulo" => "Error al eliminar el foro",
                "descripcion" => "El foro no existe en el sistema"

            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch(); //Almacenar los datos de el foro a eliminar
        }


        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Elimino un foro";
        $img_ac = $_SESSION["foto_admin"];

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
        $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);

        $eliminarUsuario = $this->eliminarDatos("tbl_foros", "foro_id", $id);



        if ($eliminarUsuario->rowCount() == 1) {
            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Foro eliminada con éxito",
                "descripcion" => "El foro ha sido eliminada del sistema"
            ];


            return  json_encode($alerta);
            exit();
        } else {

            $alerta = [
                "tipo" => "info",
                "titulo" => "Error al eliminar foro",
                "descripcion" => "No se pudo eliminar el foro"
            ];
            return  json_encode($alerta);
            exit();
        }
    }
}
