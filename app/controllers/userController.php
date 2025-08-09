<?php


namespace app\controllers;

use app\models\mainModel;



// Contrilador para los usuarios
class userController extends mainModel
{


    // Controlador para registrar un usuario desde al panela administrativo
    public function registrarUsuarioControlador()
    {
        // Almecenar los datos del formulario que viene por metedo post
        $nombre = $this->limpiarCadena($_POST["usuario_nombre"]);
        $apellido = $this->limpiarCadena($_POST["usuario_apellido"]);
        $usuario = $this->limpiarCadena($_POST["usuario_usuario"]);
        $email = $this->limpiarCadena($_POST["usuario_email"]);
        $password1 = $this->limpiarCadena($_POST["usuario_password1"]);
        $password2 = $this->limpiarCadena($_POST["usuario_password2"]);



        // Verificar los inputs obligatorios
        if ($nombre == "" || $email == "" || $password1 == "" || $apellido == "" || $password2 == "" || $usuario == "") {
            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
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


        // Verificar los filtros con las expresiones regulares Apellido
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Apellido Incorrecto",
                "descripcion" => "El Apellido ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }


        // Verificar los filtros con las expresiones regulares. Usuario
        if ($this->verificarDatos("[a-zA-Z0-9]{4,20}", $usuario)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario Incorrecto",
                "descripcion" => "El Usuario ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }


        // Verificar los filtros con las expresiones regulares. Contraseñas
        if ($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $password1) || $this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $password2)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Contraseñas Incorrectas",
                "descripcion" => "Las contraseñas no cumplen con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar el correo electrónico, que no se repita en la base de datos

        if ($email != "") {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check_email = $this->ejecutarConsulta("SELECT usuario_correo FROM tbl_usuarios WHERE  usuario_correo = '$email'");
                if ($check_email->rowCount() > 0) {
                    $alerta = [
                        "tipo" => "warning",
                        "icono" => "warning",
                        "titulo" => "Correo Electrónico Existente",
                        "descripcion" => "El correo electrónico ingresado ya está registrado en nuestro sistema."
                    ];

                    return json_encode($alerta);
                    exit();
                }
            } else {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Correo Incorrecto",
                    "descripcion" => "El Correo ingresado no cumple con el formato requerido. Por favor, verifica tu información."

                ];

                return json_encode($alerta);
                exit();
            }
        }



        // Verificar las contraseña, que no se repita en la base de datos
        if ($password1 != $password2) {

            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Contraseñas No Coinciden",
                "descripcion" => "Las contraseñas ingresadas no coinciden. Por favor, asegúrate de ingresar la misma contraseña en ambos campos."
            ];
            return json_encode($alerta);
            exit();
        } else {

            $clave = password_hash($password1, PASSWORD_BCRYPT, ["cost" => 10]);
        }



        // Verificar usuario
        $check_usuario = $this->ejecutarConsulta("SELECT usuario_usuario FROM tbl_usuarios WHERE usuario_usuario = '$usuario'");
        if ($check_usuario->rowCount() > 0) {

            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Usuario Existente",
                "descripcion" => "El usuario ingresado ya está registrado en nuestro sistema. Por favor, utiliza otro usuario."
            ];

            return json_encode($alerta);
            exit();
        }

        // Insertar los datos en la base de datos

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $usuario_datos_reg = [
            [
                "campo_nombre" => "usuario_nombres",
                "campo_marcador" => ":Nombre",
                "campo_valor" => $nombre

            ],


            [
                "campo_nombre" => "usuario_apellidos",
                "campo_marcador" => ":Apellido",
                "campo_valor" => $apellido

            ],

            [
                "campo_nombre" => "usuario_usuario",
                "campo_marcador" => ":Usuario",
                "campo_valor" => $usuario

            ],

            [
                "campo_nombre" => "usuario_correo",
                "campo_marcador" => ":Correo",
                "campo_valor" => $email

            ],


            [
                "campo_nombre" => "usuario_password",
                "campo_marcador" => ":Password",
                "campo_valor" => $clave

            ],

            [
                "campo_nombre" => "usuario_creado",
                "campo_marcador" => ":Creado",
                "campo_valor" => date("Y-m-d H:i:s")

            ],

            [
                "campo_nombre" => "usuario_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Añadio un nuevo usuario";
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


        // Insertando los datos a la base de datos
        $registar_usuario = $this->insertarDatos("tbl_usuarios", $usuario_datos_reg);

        if ($registar_usuario->rowCount() == 1) {
            $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);


            $mensajeEmail = [
                "asunto" => "Confirmación de Registro Exitoso",
                "mensaje" => "<p>Estimado/a " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . ",</p>" .
                    "<p>Nos complace informarle que su cuenta ha sido creada exitosamente en Media T desde el panel administrativo. A continuación, encontrará los detalles necesarios para acceder a su cuenta:</p>" .
                    "<p><strong>Nombre de Usuario:</strong> " . htmlspecialchars($usuario) . "<br>" .
                    "<strong>Contraseña Temporal:</strong> " . htmlspecialchars($password1) . "</p>" .
                    "<p>Por razones de seguridad, le recomendamos cambiar su contraseña tan pronto como inicie sesión por primera vez. Puede hacerlo accediendo a la sección de 'Mi cuenta' en nuestro sitio web.</p>" .
                    "<p>Si tiene alguna pregunta o necesita asistencia adicional, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos'.</p>" .
                    "<p>Gracias por elegir Media T. Esperamos que disfrute de nuestros servicios.</p>" .
                    "<p>Atentamente,<br>" .
                    "El equipo de Media T</p>",
                "correo" => $email
            ];


            $alerta = [
                "tipo" => "exito",
                "icono" => "success",
                "titulo" => "Registro Exitoso",
                "descripcion" => "El usuario " . $nombre . " " . $apellido . " ha sido registrado correctamente."
            ];
            $this->enviarCorreo($mensajeEmail);

            return json_encode($alerta);
        }
    }

    // Controlador listar usuario
    public function listarUsuarioControlador($pagina, $registros, $url, $busqueda)
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
            $consulta_datos = "SELECT * FROM tbl_usuarios WHERE (usuario_nombres LIKE '%$busqueda%' OR usuario_apellidos LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_correo LIKE '%$busqueda%')  ORDER BY usuario_nombres ASC LIMIT $inicio,$registros";

            $consulta_total = "SELECT COUNT(usuarios_id) FROM tbl_usuarios WHERE (usuario_nombres LIKE '%$busqueda%' OR usuario_apellidos LIKE '%$busqueda%' OR usuario_usuario LIKE '%$busqueda%' OR usuario_correo LIKE '%$busqueda%') ";
        } else {
            $consulta_datos = "SELECT * FROM tbl_usuarios ORDER BY usuario_nombres ASC LIMIT $inicio,$registros";
            $consulta_total = "SELECT COUNT(usuarios_id) FROM tbl_usuarios";
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
                <th>Usuario</th>
                <th>Correo</th>
                <th>Creado</th>
                <th>Actualizado</th>
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
             <tr>
                <td>' . $contador . '</td>
                <td>' . $reg_baseDatos['usuario_nombres'] . " " . $reg_baseDatos['usuario_apellidos'] . '</td>
                <td>' . $reg_baseDatos['usuario_usuario'] . '</td>
                <td>' . $reg_baseDatos['usuario_correo'] . '</td>
                <td>' . date("d-m-Y h:i:s A", strtotime($reg_baseDatos["usuario_creado"])) . '</td>
                 <td>' . date("d-m-Y h:i:s A", strtotime($reg_baseDatos["usuario_actualizado"])) . '</td>
                <td>
                    <a href="' . APP_URL . 'adminUserFoto/' . $reg_baseDatos['usuarios_id'] . '/" class="foto">Foto</a>
                </td>
                <td>
                    <a href="' . APP_URL . 'adminUserEditar/' . $reg_baseDatos['usuarios_id'] . '/" class="editar">Editar</a>
                </td>
                <td>
                    <form class="formAjax" action="' . APP_URL . 'app/ajax/userAjax.php" method="POST" autocomplete="off">

                        <input type="hidden" name="modulo_usuario" value="eliminar">
                        <input type="hidden" name="usuario_id" value="' . $reg_baseDatos['usuarios_id'] . '">

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
                <p>Mostrando usuarios <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un total de <strong>' . $total . '</strong></p>
            </div>
            ';

            $tabla .= $this->paginadorTablas($pagina, $numeroPaginas, $url, 5);
        }

        return $tabla;
    }

    // Controlador eliminar usuario
    public function eliminarUsuarioControlador()
    {

        // Almacenar el id del usuario a eliminar
        $id = $this->limpiarCadena($_POST["usuario_id"]);

        // Verificar que exista el usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_usuarios WHERE usuarios_id='$id'");

        if ($datos->rowCount() <= 0) { //Si no se encontro un usuaio

            $alerta = [
                "tipo" => "error",
                "titulo" => "Error al eliminar usuario",
                "descripcion" => "El usuario no existe en el sistema"

            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch(); //Almacenar los datos del usuario a eliminar
        }

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Elimino un usuario";
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

        $eliminarUsuario = $this->eliminarDatos("tbl_usuarios", "usuarios_id", $id);

        if ($eliminarUsuario->rowCount() == 1) {
            $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);
            if (is_file("../views/assets/img/user/fotoUser/" . $datos["usuario_foto"])) {

                chmod("../views/assets/img/user/fotoUser/" . $datos["usuario_foto"], 0777);
                unlink("../views/assets/img/user/fotoUser/" . $datos["usuario_foto"]);
            }

            $mensajeEmail = [ //Se envia el correo al usuario al cuál se le elimino la cuenta
                "asunto" => "Eliminación de Cuenta",
                "mensaje" => "<p>Estimado/a " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . ",</p>" .
                    "<p>Le informamos que su cuenta en Media T ha sido eliminada exitosamente. A continuación, se detallan algunos puntos importantes:</p>" .
                    "<p><strong>Nombre de Usuario:</strong> " . $datos["usuario_usuario"] . "</p>" .
                    "<p>Si esta eliminación fue realizada por error o si tiene alguna duda respecto a este proceso, por favor, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos' en nuestro sitio web.</p>" .
                    "<p>Gracias por haber sido parte de Media T. Lamentamos su partida y le deseamos lo mejor en sus futuros emprendimientos.</p>" .
                    "<p>Atentamente,<br>" .
                    "El equipo de Media T</p>",
                "correo" => $datos["usuario_correo"]
            ];

            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Usuario eliminado con éxito",
                "descripcion" => "El usuario " . $datos["usuario_nombres"] . "ha sido eliminado del sistema"
            ];

            $this->enviarCorreo($mensajeEmail);

            return  json_encode($alerta);
            exit();
        } else {

            $alerta = [
                "tipo" => "info",
                "titulo" => "Error al eliminar usuario",
                "descripcion" => "No se pudo eliminar el usuario"
            ];
            return  json_encode($alerta);
            exit();
        }
    }


    // Actualizar datos de usuario
    public function actualizarUsuariosControlador()
    {

        // Almacenar el id del usuario a actualizar
        $id = $this->limpiarCadena($_POST["usuario_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_usuarios WHERE usuarios_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario no encontrado",
                "descripcion" => "El usuario que deseas actualizar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {

            $datos = $datos->fetch();
        }


        // Almecenar los datos del formulario que viene por metedo post
        $nombre = $this->limpiarCadena($_POST["usuario_nombres"]);
        $apellido = $this->limpiarCadena($_POST["usuario_apellidos"]);
        $usuario = $this->limpiarCadena($_POST["usuario_usuario"]);
        $email = $this->limpiarCadena($_POST["usuario_email"]);
        $password1 = $this->limpiarCadena($_POST["usuario_password1"]);
        $password2 = $this->limpiarCadena($_POST["usuario_password2"]);


        // Verificar los inputs obligatorios
        if ($nombre == "" || $email == "" || $password1 == "" || $apellido == "" || $password2 == "" || $usuario == "") {
            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
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


        // Verificar los filtros con las expresiones regulares Apellido
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Apellido Incorrecto",
                "descripcion" => "El Apellido ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }


        // Verificar los filtros con las expresiones regulares. Usuario
        if ($this->verificarDatos("[a-zA-Z0-9]{4,20}", $usuario)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario Incorrecto",
                "descripcion" => "El Usuario ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }


        // Verificar los filtros con las expresiones regulares. Contraseñas
        if ($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $password1) || $this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $password2)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Contraseñas Incorrectas",
                "descripcion" => "Las contraseñas no cumplen con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }


        if ($email != "" && $datos["usuario_correo"] != $email) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check_email = $this->ejecutarConsulta("SELECT usuario_correo FROM tbl_usuarios WHERE  usuario_correo = '$email'");
                if ($check_email->rowCount() > 0) {
                    $alerta = [
                        "tipo" => "warning",
                        "icono" => "warning",
                        "titulo" => "Correo Electrónico Existente",
                        "descripcion" => "El correo electrónico ingresado ya está registrado en nuestro sistema."
                    ];

                    return json_encode($alerta);
                    exit();
                }
            } else {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Correo Incorrecto",
                    "descripcion" => "El Correo ingresado no cumple con el formato requerido. Por favor, verifica tu información."

                ];

                return json_encode($alerta);
                exit();
            }
        }



        // Verificar las contraseña, que no se repita en la base de datos
        if ($password1 != $password2) {

            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Contraseñas No Coinciden",
                "descripcion" => "Las contraseñas ingresadas no coinciden. Por favor, asegúrate de ingresar la misma contraseña en ambos campos."
            ];
            return json_encode($alerta);
            exit();
        } else {

            $clave = password_hash($password1, PASSWORD_BCRYPT, ["cost" => 10]);
        }


        // Verificar usuario
        if ($datos["usuario_usuario"] != $usuario) {

            $check_usuario = $this->ejecutarConsulta("SELECT usuario_usuario FROM tbl_usuarios WHERE  usuario_usuario = '$usuario'");
            if ($check_usuario->rowCount() > 0) {
                $alerta = [
                    "tipo" => "warning",
                    "icono" => "warning",
                    "titulo" => "Usuario Existente",
                    "descripcion" => "El usuario ingresado ya está registrado en nuestro sistema. Por favor, utiliza otro usuario."
                ];

                return json_encode($alerta);
                exit();
            }
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos a actualizar
        $usuario_datos_up = [
            [
                "campo_nombre" => "usuario_nombres",
                "campo_marcador" => ":Nombre",
                "campo_valor" => $nombre

            ],


            [
                "campo_nombre" => "usuario_apellidos",
                "campo_marcador" => ":Apellido",
                "campo_valor" => $apellido

            ],

            [
                "campo_nombre" => "usuario_usuario",
                "campo_marcador" => ":Usuario",
                "campo_valor" => $usuario

            ],

            [
                "campo_nombre" => "usuario_correo",
                "campo_marcador" => ":Correo",
                "campo_valor" => $email

            ],


            [
                "campo_nombre" => "usuario_password",
                "campo_marcador" => ":Password",
                "campo_valor" => $clave

            ],

            [
                "campo_nombre" => "usuario_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];


        $condicion = [
            "condicion_campo" => "usuarios_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Actualizo un nuevo usuario";
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

        if ($this->actualizarDatos("tbl_usuarios", $usuario_datos_up, $condicion)) {
            $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);

            $alerta = [
                "tipo" => "exito",
                "icono" => "exito",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "El usuario " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . " ha sido actualizado correctamente."
            ];

            $mensajeEmail = [
                "asunto" => "Actualización de Información en Media T",
                "mensaje" => "<p>Estimado/a " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . ",</p>" .
                    "<p>Le informamos que su información ha sido actualizada exitosamente desde el panel administrativo de Media T. A continuación, encontrará los detalles actualizados:</p>" .
                    "<ul>" .
                    "<li><strong>Nombre:</strong> " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . "</li>" .
                    "<li><strong>Nombre de Usuario:</strong> " . htmlspecialchars($usuario) . "</li>" .
                    "<li><strong>Contraseña Temporal:</strong> " . htmlspecialchars($password1) . "</li>" .
                    "<li><strong>Dirección de Correo Electrónico:</strong> " . htmlspecialchars($email) . "</li>" .
                    "</ul>" .
                    "<p>Por razones de seguridad, le recomendamos cambiar su contraseña si se le ha proporcionado una nueva. Puede hacerlo accediendo a la sección de 'Mi cuenta' en nuestro sitio web.</p>" .
                    "<p>Además, todos los futuros mensajes y notificaciones relacionadas con su cuenta serán enviados a la dirección de correo electrónico proporcionada anteriormente.</p>" .
                    "<p>Si tiene alguna pregunta o necesita asistencia adicional, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos'.</p>" .
                    "<p>Gracias por su atención. Estamos aquí para ayudarle con cualquier necesidad que pueda tener.</p>" .
                    "<p>Atentamente,<br>" .
                    "El equipo de Media T</p>",
                "correo" => $email
            ];
            $this->enviarCorreo($mensajeEmail);
        } else {


            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Actualizar usuario",
                "descripcion" => "No se pudo actualizar el usuario en la base de datos."
            ];
        }

        return json_encode($alerta);
    }


    // Actualizat foto usuario
    public function actualizarFotoUsuarioControlador()
    {

        // Almacenar el id del usuario 
        $id = $this->limpiarCadena($_POST["usuario_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_usuarios WHERE usuarios_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario no encontrado",
                "descripcion" => "El usuario que deseas eliminar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/user/fotoUser/";

        // Comprobar si se selecciono una foto
        if ($_FILES["usuario_foto"]["name"] == "" && $_FILES['usuario_foto']['size'] <= 0) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al subir foto",
                "descripcion" => "No ha seleccionado una foto valida."
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
        if (mime_content_type($_FILES["usuario_foto"]["tmp_name"]) != "image/jpeg" && mime_content_type($_FILES["usuario_foto"]["tmp_name"]) != "image/png") {
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
        if (($_FILES["usuario_foto"]["size"] / 1024) > 5120) {

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
        if ($datos["usuario_foto"] != "") {
            $foto = explode(".", $datos["usuario_foto"]);
            $foto = $foto[0];
            $foto = $foto . "1";
            $foto = str_ireplace(" ", "", $foto);
        } else {
            $foto = explode(".", $_FILES["usuario_foto"]["name"]);
            $foto[0] = $datos["usuario_nombres"];
            $foto = str_ireplace(" ", "_", $datos["usuario_nombres"]);
            $foto = $foto . "_" . rand(0, 100);
        }

        // Agregar extensión a la foto

        switch (mime_content_type($_FILES["usuario_foto"]["tmp_name"])) {

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
        if (!move_uploaded_file($_FILES["usuario_foto"]["tmp_name"], $img_dir . $foto)) {

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
        if (is_file($img_dir . $datos['usuario_foto']) && $datos['usuario_foto'] != $foto) {

            chmod($img_dir . $datos['usuario_foto'], 0777);
            unlink($img_dir . $datos['usuario_foto']);
        }


        // Arrys que contiene los valores que se van a mandar a la base de datos
        $usuario_datos_up = [
            [
                "campo_nombre" => "usuario_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => $foto

            ],
            [
                "campo_nombre" => "usuario_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];

        $condicion = [
            "condicion_campo" => "usuarios_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        if ($this->actualizarDatos("tbl_usuarios", $usuario_datos_up, $condicion)) {

            $mensajeEmail = [
                "asunto" => "Actualización de Foto de Perfil",
                "mensaje" => "<p>Estimado/a " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . ",</p>" .
                    "<p>Le informamos que su foto de perfil ha sido actualizada exitosamente desde el panel administrativo de Media T. Esta acción fue realizada por un administrador y no puede ser realizada por los usuarios directamente.</p>" .
                    "<p><strong>Nombre de Usuario:</strong> " . $datos["usuario_usuario"] . "</p>" .
                    "<p>Si usted no solicitó esta actualización o si tiene alguna duda respecto a este cambio, por favor, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos' en nuestro sitio web.</p>" .
                    "<p>Gracias por su atención y por formar parte de Media T.</p>" .
                    "<p>Atentamente,<br>" .
                    "El equipo de Media T</p>",
                "correo" => $datos["usuario_correo"]
            ];
            $this->enviarCorreo($mensajeEmail);



            $alerta = [
                "tipo" => "exito",
                "icono" => "exito",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "La foto del usuario " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . " ha sido actualizado correctamente."
            ];
        } else {

            $alerta = [
                "tipo" => "recargar",
                "icono" => "warning",
                "titulo" => "Error al Actualizar la foto",
                "descripcion" => "No hemos podido actualizar la foto del usuario " . $datos['usuario_nombres'] . " " . $datos['usuario_apellidos'] . "",

            ];
        }

        return json_encode($alerta);
    }


    // Eliminar imagen
    public function eliminarFotoUsuarioControlador()

    {
        // Almacenar el id del usuario 
        $id = $this->limpiarCadena($_POST["usuario_id"]);

        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_usuarios WHERE usuarios_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario no encontrado",
                "descripcion" => "El usuario y la foto que deseas eliminar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/user/fotoUser/";
        chmod($img_dir, 0777);

        if (is_file($img_dir . $datos["usuario_foto"])) {

            chmod($img_dir . $datos["usuario_foto"], 0777);

            if (!unlink($img_dir . $datos["usuario_foto"])) {

                $alerta = [
                    "tipo" => "simple",
                    "icono" => "error",
                    "titulo" => "Foto del Usuario No Encontrada",
                    "descripcion" => "No hemos encontrado la foto del usuario en el sistema."
                ];

                return json_encode($alerta);
                exit();
            }
        } else {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Foto del suario no encontrado",
                "descripcion" => "No hemos encontrado la foto del usuario en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $usuario_datos_up = [
            [
                "campo_nombre" => "usuario_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => ""

            ],

            [
                "campo_nombre" => "usuario_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];

        $condicion = [
            "condicion_campo" => "usuarios_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        if ($this->actualizarDatos("tbl_usuarios", $usuario_datos_up, $condicion)) {

            $mensajeEmail = [
                "asunto" => "Eliminación de Foto de Perfil",
                "mensaje" => "<p>Estimado/a " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . ",</p>" .
                    "<p>Le informamos que su foto de perfil ha sido eliminada exitosamente desde el panel administrativo de Media T. Esta acción fue realizada por un administrador y no puede ser realizada por los usuarios directamente.</p>" .
                    "<p><strong>Nombre de Usuario:</strong> " . $datos["usuario_usuario"] . "</p>" .
                    "<p>Si usted no solicitó esta eliminación o si tiene alguna duda respecto a este cambio, por favor, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos' en nuestro sitio web.</p>" .
                    "<p>Gracias por su atención y por formar parte de Media T.</p>" .
                    "<p>Atentamente,<br>" .
                    "El equipo de Media T</p>",
                "correo" => $datos["usuario_correo"]
            ];


            $this->enviarCorreo($mensajeEmail);

            $alerta = [
                "tipo" => "recargar",
                "icono" => "exito",
                "titulo" => "Foto eliminada",
                "descripcion" => "La foto del  usuario " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . " ha sido eliminada correctamente."
            ];
        } else {

            $alerta = [
                "tipo" => "recargar",
                "icono" => "exito",
                "titulo" => "Error al eliminar Usuario",
                "descripcion" => "No hemos podido actualizar algunos datos del usuario " . $datos['usuario_nombres'] . " " . $datos['usuario_apellidos'] . " , sin embargo la foto ha sido actualizada",

            ];
        }

        return json_encode($alerta);
    }


    // Usuario editar en la sesion de mi cuenta
    public function editarUsuarioSesion()
    {


        // Almacenar el id del usuario a actualizar
        $id = $this->limpiarCadena($_POST["usuario_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_usuarios WHERE usuarios_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario no encontrado",
                "descripcion" => "Su cuenta no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {

            $datos = $datos->fetch();
        }

        $admin_usuario = $this->limpiarCadena($_POST["usuario_admin"]);
        $admin_password = $this->limpiarCadena($_POST["password_admin"]);

        // Verificar los inputs obligatorios
        if ($admin_usuario == "" || $admin_password == "") {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Campos Incompletos",
                "descripcion" => "Faltan campos obligatorios por completar, que corresponden a su USUARIO Y CONTRASEÑA"
            ];

            return json_encode($alerta);
            exit();
        }
        // Verificar el usuario
        if ($this->verificarDatos("[a-zA-Z0-9]{4,20}", $admin_usuario)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Formato de usuario incorrecto",
                "descripcion" => "Su usuario no cuemple cone el formato solicitado."
            ];

            return json_encode($alerta);
            exit();
        }
        // Verificar la contraseñaa 
        if ($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $admin_password)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Contraseña Incorrectas",
                "descripcion" => "La contraseña no cumplen con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }


        // Verificar administrador
        $check_admin = $this->ejecutarConsulta("SELECT * FROM tbl_usuarios WHERE usuario_usuario='$admin_usuario' AND usuarios_id='$id'");
        if ($check_admin->rowCount() == 1) {

            $check_admin = $check_admin->fetch();

            if ($check_admin["usuario_usuario"] != $admin_usuario || !password_verify($admin_password, $check_admin["usuario_password"])) {

                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Datos incorrectos",
                    "descripcion" => "El usuario o la contraseña no son correctos. Por favor, verifica tus datos e intenta de nuevo."
                ];
                return json_encode($alerta);
                exit();
            }
        } else {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Ocurrio un error",
                "descripcion" => "El usuario ingresado o la contraseña son INCORRECTOS Por favor, revisar la información."
            ];

            return json_encode($alerta);
            exit();
        }


        // Almecenar los datos del formulario
        $nombre = $this->limpiarCadena($_POST["usuario_nombres"]);
        $email = $this->limpiarCadena($_POST["usuario_correo"]);
        $password = $this->limpiarCadena($_POST["usuario_password"]);
        $apellido = $this->limpiarCadena($_POST["usuario_apellidos"]);
        $usuario = $this->limpiarCadena($_POST["usuario_usuario"]);

        // Verificar los inputs obligatorios
        if ($nombre == "" || $email == ""  || $apellido == "" || $usuario == "") {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Campos Incompletos",
                "descripcion" => "Faltan campos obligatorios por completar."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares Nombre
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
        // Verificar los filtros con las expresiones regulare. Apellido
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Apellido Incorrecto",
                "descripcion" => "El Apellido ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }
        // Verificar los filtros con las expresiones regulares. Apellido
        if ($this->verificarDatos("[a-zA-Z0-9]{4,20}", $usuario)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario Incorrecto",
                "descripcion" => "El Usuario ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar el correo, que no se repita en la base de datos
        if ($email != "" && $datos["usuario_correo"] != $email) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check_email = $this->ejecutarConsulta("SELECT usuario_correo FROM tbl_usuarios WHERE  usuario_correo = '$email'");
                if ($check_email->rowCount() > 0) {
                    $alerta = [
                        "tipo" => "error",
                        "icono" => "error",
                        "titulo" => "Correo Electrónico Existente",
                        "descripcion" => "El correo electrónico ingresado ya está registrado en nuestro sistema."
                    ];

                    return json_encode($alerta);
                    exit();
                }
            } else {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Correo Incorrecto",
                    "descripcion" => "El Correo ingresado no cumple con el formato requerido."

                ];

                return json_encode($alerta);
                exit();
            }
        }


        // Verificar las contraseña, que no se repita en la base de datos
        if ($password != "") {
            // Verificar los filtros con las expresiones regulares. Contraseñas
            if ($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $password)) {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Contraseña Incorrecta",
                    "descripcion" => "Las contraseña no cumplen con el formato requerido. Por favor, verifica tu información."
                ];

                return json_encode($alerta);
                exit();
            }
            $clave = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
        } else {
            $clave = $datos["usuario_password"];
        }


        // Verificar usuario
        if ($datos["usuario_usuario"] != $usuario) {

            $check_usuario = $this->ejecutarConsulta("SELECT usuario_usuario FROM tbl_usuarios WHERE usuario_usuario = '$usuario'");
            if ($check_usuario->rowCount() > 0) {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Usuario Existente",
                    "descripcion" => "El usuario ingresado ya está registrado en nuestro sistema. Por favor, utiliza otro usuario."
                ];

                return json_encode($alerta);
                exit();
            }
        }
        // Directorio de imágenes
        $img_dir = "../views/assets/img/user/fotoUser/";

        // Comprobar si se selecciono una foto
        if ($_FILES["users_foto"]["name"] != "" && $_FILES["users_foto"]["size"] > 0) {



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
            if (mime_content_type($_FILES["users_foto"]["tmp_name"]) != "image/jpeg" && mime_content_type($_FILES["users_foto"]["tmp_name"]) != "image/png") {
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
            if (($_FILES["users_foto"]["size"] / 1024) > 5120) {

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
            if ($datos["usuario_foto"] != "") {
                $foto = explode(".", $datos["usuario_foto"]);
                $foto = $foto[0];
                $foto = $foto . "1";
                $foto = str_ireplace(" ", "", $foto);
            } else {
                $foto = explode(".", $_FILES["users_foto"]["name"]);
                $foto[0] = $datos["usuario_nombres"];
                $foto = str_ireplace(" ", "_", $datos["usuario_nombres"]);
                $foto = $foto . "_" . rand(0, 100);
            }

            // Agregar extensión a la foto
            switch (mime_content_type($_FILES["users_foto"]["tmp_name"])) {

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
            if (!move_uploaded_file($_FILES["users_foto"]["tmp_name"], $img_dir . $foto)) {

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
            if (is_file($img_dir . $datos['usuario_foto']) && $datos['usuario_foto'] != $foto) {

                chmod($img_dir . $datos['usuario_foto'], 0777);
                unlink($img_dir . $datos['usuario_foto']);
            }
        } else {
            $foto = $datos["usuario_foto"];
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $usuario_datos_up = [
            [
                "campo_nombre" => "usuario_nombres",
                "campo_marcador" => ":Nombre",
                "campo_valor" => $nombre

            ],


            [
                "campo_nombre" => "usuario_apellidos",
                "campo_marcador" => ":Apellido",
                "campo_valor" => $apellido

            ],

            [
                "campo_nombre" => "usuario_usuario",
                "campo_marcador" => ":Usuario",
                "campo_valor" => $usuario

            ],

            [
                "campo_nombre" => "usuario_correo",
                "campo_marcador" => ":Correo",
                "campo_valor" => $email

            ],


            [
                "campo_nombre" => "usuario_password",
                "campo_marcador" => ":Password",
                "campo_valor" => $clave

            ],

            [
                "campo_nombre" => "usuario_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => $foto

            ],

            [
                "campo_nombre" => "usuario_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];

        $condicion = [
            "condicion_campo" => "usuarios_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        if ($this->actualizarDatos("tbl_usuarios", $usuario_datos_up, $condicion)) {
            // Actualizar las variables de sesion
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['correo'] = $email;
            $_SESSION['foto'] = $foto;

            // // Crear el mensaje del correo
            // $mensajeEmail = [
            //     "asunto" => "Actualización de Datos de Usuario",
            //     "mensaje" => "<p>Estimado/a " . $nombre . " " . $apellido . ",</p>" .
            //         "<p>Le informamos que sus datos han sido actualizados correctamente en nuestro sistema. A continuación, encontrará la información actualizada:</p>" .
            //         "<p><strong>Nombre:</strong> " . $nombre . "</p>" .
            //         "<p><strong>Apellido:</strong> " . $apellido . "</p>" .
            //         "<p><strong>Nombre de Usuario:</strong> " . $usuario . "</p>" .
            //         "<p><strong>Correo Electrónico:</strong> " . $email . "</p>" .
            //         "<p>A partir de ahora, cualquier comunicación relacionada con Media T será enviada a este correo electrónico.</p>" .
            //         "<p>Si usted no solicitó esta actualización o si tiene alguna pregunta, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos' en nuestro sitio web.</p>" .
            //         "<p>Gracias por su atención y por formar parte de Media T.</p>" .
            //         "<p>Atentamente,<br>" .
            //         "El equipo de Media T</p>",
            //     "correo" => $email
            // ];

            // $this->enviarCorreo($mensajeEmail);


            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "Tus datos:" . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . ", han sido actualizados correctamente."
            ];
        } else {


            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Actualizar Usuario",
                "descripcion" => "No se pudo actualizar el usuario en la base de datos."
            ];
        }

        return json_encode($alerta);
    }
}
