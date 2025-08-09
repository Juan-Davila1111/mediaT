<?php

namespace app\controllers;

use app\models\mainModel;



// Contrilador para los administradores
class adminController extends mainModel
{

    // Función para insertar un nuevo administrador en el sistema
    public function  registrarAdminControlador()
    {

        // Almecenar los datos del formulario que viene por metedo post
        $nombre = $this->limpiarCadena($_POST["admin_nombres"]);
        $usuario = $this->limpiarCadena($_POST["admin_usuario"]);
        $email = $this->limpiarCadena($_POST["admin_email"]);
        $password1 = $this->limpiarCadena($_POST["admin_password1"]);
        $password2 = $this->limpiarCadena($_POST["admin_password2"]);
        $tipo = $this->limpiarCadena(($_POST["admin_tipo"]));




        // Verificar los inputs obligatorios
        if ($nombre == "" || $email == "" || $password1 == "" || $tipo == "" || $password2 == "" || $usuario == "") {

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
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,55}", $nombre)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Nombre Incorrecto",
                "descripcion" => "El nombre ingresado no cumple con el formato requerido. Por favor, verifica tu información."
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

        // Verificar usuario
        $check_usuario = $this->ejecutarConsulta("SELECT admin_usuario FROM tbl_admin WHERE admin_usuario = '$usuario'");
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




        // Verificar el correo electrónico, que no se repita en la base de datos

        if ($email != "") {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check_email = $this->ejecutarConsulta("SELECT admin_correo FROM tbl_admin WHERE  admin_correo = '$email'");
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



        // Verificar las contraseña, que no se repita en la base de datos
        if ($password1 != $password2) {

            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Contraseñas No Coinciden",
                "descripcion" => "Las contraseñas ingresadas no coinciden. Por favor, asegúrate de ingresar la misma contraseña."
            ];
            return json_encode($alerta);
            exit();
        } else {

            $clave = password_hash($password1, PASSWORD_BCRYPT, ["cost" => 10]);
        }


        // Arrys que contiene los valores que se van a insertar a la base de datos
        $admin_datos_reg = [
            [
                "campo_nombre" => "admin_nombres",
                "campo_marcador" => ":Nombre",
                "campo_valor" => $nombre

            ],

            [
                "campo_nombre" => "admin_usuario",
                "campo_marcador" => ":Usuario",
                "campo_valor" => $usuario

            ],

            [
                "campo_nombre" => "admin_correo",
                "campo_marcador" => ":Correo",
                "campo_valor" => $email

            ],


            [
                "campo_nombre" => "admin_password",
                "campo_marcador" => ":Password",
                "campo_valor" => $clave

            ],

            [
                "campo_nombre" => "admin_tipo",
                "campo_marcador" => ":Tipo",
                "campo_valor" => $tipo

            ],

            [
                "campo_nombre" => "admin_creado",
                "campo_marcador" => ":Creado",
                "campo_valor" => date("Y-m-d H:i:s")

            ],

            [
                "campo_nombre" => "admin_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];



        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Añadio un nuevo administrador";
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

        // Insertando los datos a la base de datos
        $registar_admin = $this->insertarDatos("tbl_admin", $admin_datos_reg);

        if ($registar_admin->rowCount() == 1) {

            $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);


            if ($tipo == "Superadministrador") {
                $mensajeEmail = [
                    "asunto" => "Confirmación de Registro Exitoso",
                    "mensaje" => "<p>Estimado/a " . htmlspecialchars($nombre) . ",</p>" .
                        "<p>Nos complace informarle que su cuenta de superadministrador ha sido creada exitosamente en nuestro panel administrativo de Media T. A continuación, encontrará los detalles necesarios para acceder a su cuenta:</p>" .
                        "<p><strong>Nombre de Usuario:</strong> " . htmlspecialchars($usuario) . "<br>" .
                        "<strong>Contraseña Temporal:</strong> " . htmlspecialchars($password1) . "</p>" .
                        "<p>Como superadministrador, tendrá acceso completo a todos los servicios y herramientas del panel administrativo de Media T. Esto incluye la capacidad de gestionar otros usuarios, configurar el sistema y realizar todas las tareas necesarias para el funcionamiento del sitio web.</p>" .
                        "<p>Por razones de seguridad, le recomendamos cambiar su contraseña tan pronto como inicie sesión por primera vez. Puede hacerlo accediendo a la sección correspondiente en el panel administrativo.</p>" .
                        "<p>Le pedimos que haga un buen uso de sus privilegios para asegurar el correcto funcionamiento y seguridad del sitio web.</p>" .
                        "<p>Gracias por ser parte de Media T. Esperamos que aproveche al máximo las herramientas y servicios disponibles en el panel administrativo.</p>" .
                        "<p>Atentamente,<br>" .
                        "El equipo de Media T</p>",
                    "correo" => $email
                ];
            } else {
                $mensajeEmail = [
                    "asunto" => "Confirmación de Registro Exitoso",
                    "mensaje" => "<p>Estimado/a " . htmlspecialchars($nombre) . ",</p>" .
                        "<p>Nos complace informarle que su cuenta de administrador general ha sido creada exitosamente en nuestro panel administrativo de Media T. A continuación, encontrará los detalles necesarios para acceder a su cuenta:</p>" .
                        "<p><strong>Nombre de Usuario:</strong> " . htmlspecialchars($usuario) . "<br>" .
                        "<strong>Contraseña Temporal:</strong> " . htmlspecialchars($password1) . "</p>" .
                        "<p>Como administrador general, tendrá acceso a todos los servicios y herramientas del panel administrativo de Media T, con excepción de la gestión de usuarios y administradores. Esto le permitirá gestionar contenido, configurar aspectos operativos y realizar otras tareas esenciales para el funcionamiento del sitio web.</p>" .
                        "<p>Por razones de seguridad, le recomendamos cambiar su contraseña tan pronto como inicie sesión por primera vez. Puede hacerlo accediendo a la sección correspondiente en el panel administrativo.</p>" .
                        "<p>Le pedimos que haga un buen uso de sus privilegios para asegurar el correcto funcionamiento del sitio web.</p>" .
                        "<p>Gracias por ser parte de Media T. Esperamos que aproveche al máximo las herramientas y servicios disponibles en el panel administrativo.</p>" .
                        "<p>Atentamente,<br>" .
                        "El equipo de Media T</p>",
                    "correo" => $email
                ];
            }



            $this->enviarCorreo($mensajeEmail);


            $alerta = [
                "tipo" => "exito",
                "icono" => "success",
                "titulo" => "Registro Exitoso",
                "descripcion" => "El Administrador " . $nombre . " ha sido registrado correctamente."
            ];

            return json_encode($alerta);
        }
    }

    // Función listar Administradores
    public function listarAdminControlador($pagina, $registros, $url, $busqueda)
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
            $consulta_datos = "SELECT * FROM tbl_admin WHERE (admin_id!=1) and (admin_nombres LIKE '%$busqueda%' OR admin_usuario LIKE '%$busqueda%' OR admin_correo LIKE '%$busqueda%')  ORDER BY admin_nombres ASC LIMIT $inicio,$registros";

            $consulta_total = "SELECT COUNT(admin_id) FROM tbl_admin WHERE (admin_id !=1) and (admin_nombres LIKE '%$busqueda%' OR admin_usuario LIKE '%$busqueda%' OR admin_correo LIKE '%$busqueda%') ";
        } else {
            $consulta_datos = "SELECT * FROM tbl_admin WHERE admin_id != 1 ORDER BY admin_nombres ASC LIMIT $inicio, $registros";
            $consulta_total = "SELECT COUNT(admin_id) AS total FROM tbl_admin WHERE admin_id != 1";

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
                <td>' . $reg_baseDatos['admin_nombres'] . '</td>
                <td>' . $reg_baseDatos['admin_usuario'] . '</td>
                <td>' . $reg_baseDatos['admin_correo'] . '</td>
                <td>' . date("d-m-Y h:i:s A", strtotime($reg_baseDatos["admin_creado"])) . '</td>
                 <td>' . date("d-m-Y h:i:s A", strtotime($reg_baseDatos["admin_actualizado"])) . '</td>
                <td>
                    <a href="' . APP_URL . 'adminFoto/' . $reg_baseDatos['admin_id'] . '/" class="foto">Foto</a>
                </td>
                <td>
                    <a href="' . APP_URL . 'adminEditar/' . $reg_baseDatos['admin_id'] . '/" class="editar">Editar</a>
                </td>
                <td>
                    <form class="formAjax" action="' . APP_URL . 'app/ajax/adminAjax.php" method="POST" autocomplete="off">

                        <input type="hidden" name="modulo_admin" value="eliminar">
                        <input type="hidden" name="admin_id" value="' . $reg_baseDatos['admin_id'] . '">

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
                <p>Mostrando administradores <strong>' . $pag_inicio . '</strong> al <strong>' . $pag_final . '</strong> de un total de <strong>' . $total . '</strong></p>
            </div>
            ';

            $tabla .= $this->paginadorTablas($pagina, $numeroPaginas, $url, 5);
        }

        return $tabla;
    }


    // Controlador eliminar usuario
    public function eliminarAdminControlador()
    {

        // Almacenar el id del usuario a eliminar
        $id = $this->limpiarCadena($_POST["admin_id"]);

        // Verificar que exista el usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_admin WHERE admin_id='$id' and admin_id!=1");

        if ($datos->rowCount() <= 0) { //Si no se encontro un usuaio

            $alerta = [
                "tipo" => "error",
                "titulo" => "Error al eliminar usuario",
                "descripcion" => "El Administrador no existe en el sistema"

            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch(); //Almacenar los datos del usuario a eliminar
        }

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Elimino un administrador";
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



        $eliminarUsuario = $this->eliminarDatos("tbl_admin", "admin_id", $id);

        $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);


        if ($eliminarUsuario->rowCount() == 1) {
            if (is_file("../views/assets/img/admin/fotoUser/" . $datos["admin_foto"])) {

                chmod("../views/assets/img/admin/fotoUser/" . $datos["admin_foto"], 0777);
                unlink("../views/assets/img/admin/fotoUser/" . $datos["admin_foto"]);
            }

            $mensajeEmail = [
                "asunto" => "Eliminación de Cuenta de Administrador",
                "mensaje" => "<p>Estimado/a " . htmlspecialchars($datos["admin_nombres"]) . ",</p>" .
                    "<p>Le informamos que su cuenta de administrador en Media T ha sido eliminada exitosamente. A continuación, se detallan algunos puntos importantes:</p>" .
                    "<p><strong>Nombre de Usuario:</strong> " . htmlspecialchars($datos["admin_usuario"]) . "</p>" .
                    "<p>Agradecemos su contribución al equipo de Media T. Lamentamos su partida y le deseamos lo mejor en sus futuros emprendimientos.</p>" .
                    "<p>Atentamente,<br>" .
                    "El equipo de Media T</p>",
                "correo" => $datos["admin_correo"]
            ];


            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Administrador eliminado con éxito",
                "descripcion" => "El Administrador " . $datos["admin_nombres"] . "ha sido eliminado del sistema"
            ];

            $this->enviarCorreo($mensajeEmail);

            return  json_encode($alerta);
            exit();
        } else {

            $alerta = [
                "tipo" => "info",
                "titulo" => "Error al eliminar usuario",
                "descripcion" => "No se pudo eliminar el Administrador"
            ];
            return  json_encode($alerta);
            exit();
        }
    }


    // Función actualizar administradores

    public function actualizarAdminControlador()
    {

        // Almacenar el id del usuario a actualizar
        $id = $this->limpiarCadena($_POST["admin_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_admin WHERE admin_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Administrador no encontrado",
                "descripcion" => "El Administrador que deseas eliminar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {

            $datos = $datos->fetch();
        }
        // Almecenar los datos del formulario que viene por metedo post
        $nombre = $this->limpiarCadena($_POST["admin_nombres"]);
        $usuario = $this->limpiarCadena($_POST["admin_usuario"]);
        $email = $this->limpiarCadena($_POST["admin_email"]);
        $password1 = $this->limpiarCadena($_POST["admin_password1"]);
        $password2 = $this->limpiarCadena($_POST["admin_password2"]);
        $tipo = $this->limpiarCadena(($_POST["admin_tipo"]));



        // Verificar los inputs obligatorios
        if ($nombre == "" || $email == "" || $password1 == "" || $tipo == "" || $password2 == "" || $usuario == "") {

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
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,55}", $nombre)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Nombre Incorrecto",
                "descripcion" => "El nombre ingresado no cumple con el formato requerido. Por favor, verifica tu información."
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

        // Verificar usuario
        if ($usuario != $datos["admin_usuario"]) {
            $check_usuario = $this->ejecutarConsulta("SELECT admin_usuario FROM tbl_admin WHERE admin_usuario = '$usuario'");
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




        // Verificar el correo electrónico, que no se repita en la base de datos

        if ($email != "" && $email != $datos["admin_correo"]) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check_email = $this->ejecutarConsulta("SELECT admin_correo FROM tbl_admin WHERE  admin_correo = '$email'");
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



        // Verificar las contraseña, que no se repita en la base de datos
        if ($password1 != $password2) {

            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Contraseñas No Coinciden",
                "descripcion" => "Las contraseñas ingresadas no coinciden. Por favor, asegúrate de ingresar la misma contraseña."
            ];
            return json_encode($alerta);
            exit();
        } else {

            $clave = password_hash($password1, PASSWORD_BCRYPT, ["cost" => 10]);
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos a actualizar
        $admin_datos_up = [
            [
                "campo_nombre" => "admin_nombres",
                "campo_marcador" => ":Nombre",
                "campo_valor" => $nombre

            ],

            [
                "campo_nombre" => "admin_usuario",
                "campo_marcador" => ":Usuario",
                "campo_valor" => $usuario

            ],

            [
                "campo_nombre" => "admin_correo",
                "campo_marcador" => ":Correo",
                "campo_valor" => $email

            ],


            [
                "campo_nombre" => "admin_password",
                "campo_marcador" => ":Password",
                "campo_valor" => $clave

            ],

            [
                "campo_nombre" => "admin_tipo",
                "campo_marcador" => ":Tipo",
                "campo_valor" => $tipo

            ],

            [
                "campo_nombre" => "admin_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];



        $condicion = [
            "condicion_campo" => "admin_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Actualizo un administrador";
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

        if ($this->actualizarDatos("tbl_admin", $admin_datos_up, $condicion)) {
            $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);

            $_SESSION["tipo"] = $tipo;

            $alerta = [
                "tipo" => "exito",
                "icono" => "exito",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "El Administrador " . $datos["admin_nombres"] . " ha sido actualizado correctamente."
            ];
            if ($tipo == "Superadministrador") {

                $mensajeEmail = [
                    "asunto" => "Actualización de Información en Media T",
                    "mensaje" => "<p>Estimado/a " . htmlspecialchars($nombre) . ",</p>" .
                        "<p>Le informamos que su cuenta de superadministrador ha sido actualizada exitosamente desde el panel administrativo de Media T. A continuación, encontrará los detalles actualizados:</p>" .
                        "<ul>" .
                        "<li><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</li>" .
                        "<li><strong>Nombre de Usuario:</strong> " . htmlspecialchars($usuario) . "</li>" .
                        "<li><strong>Contraseña Temporal:</strong> " . htmlspecialchars($password1) . "</li>" .
                        "<li><strong>Dirección de Correo Electrónico:</strong> " . htmlspecialchars($email) . "</li>" .
                        "</ul>" .
                        "<p>Como superadministrador, tendrá acceso completo a todos los recursos y herramientas del panel administrativo de Media T. Por razones de seguridad, le recomendamos cambiar su contraseña si se le ha proporcionado una nueva. Puede hacerlo accediendo a la sección correspondiente en el panel administrativo.</p>" .
                        "<p>Además, todos los futuros mensajes y notificaciones relacionadas con su cuenta serán enviados a la dirección de correo electrónico proporcionada anteriormente.</p>" .
                        "<p>Le pedimos que haga un buen uso de sus privilegios para asegurar el correcto funcionamiento del sitio web.</p>" .
                        "<p>Gracias por su atención. Estamos aquí para ayudarle con cualquier necesidad que pueda tener.</p>" .
                        "<p>Atentamente,<br>" .
                        "El equipo de Media T</p>",
                    "correo" => $email
                ];
            } else {
                $mensajeEmail = [
                    "asunto" => "Actualización de Información en Media T",
                    "mensaje" => "<p>Estimado/a " . htmlspecialchars($nombre) . ",</p>" .
                        "<p>Le informamos que su cuenta de administrador general ha sido actualizada exitosamente desde el panel administrativo de Media T. A continuación, encontrará los detalles actualizados:</p>" .
                        "<ul>" .
                        "<li><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "</li>" .
                        "<li><strong>Nombre de Usuario:</strong> " . htmlspecialchars($usuario) . "</li>" .
                        "<li><strong>Contraseña Temporal:</strong> " . htmlspecialchars($password1) . "</li>" .
                        "<li><strong>Dirección de Correo Electrónico:</strong> " . htmlspecialchars($email) . "</li>" .
                        "</ul>" .
                        "<p>Como administrador general, tendrá acceso a los servicios y herramientas del panel administrativo de Media T, con excepción de la gestión de usuarios y administradores. Por razones de seguridad, le recomendamos cambiar su contraseña si se le ha proporcionado una nueva. Puede hacerlo accediendo a la sección correspondiente en el panel administrativo.</p>" .
                        "<p>Además, todos los futuros mensajes y notificaciones relacionadas con su cuenta serán enviados a la dirección de correo electrónico proporcionada anteriormente.</p>" .
                        "<p>Le pedimos que haga un buen uso de sus privilegios para asegurar el correcto funcionamiento del sitio web.</p>" .
                        "<p>Gracias por su atención. Estamos aquí para ayudarle con cualquier necesidad que pueda tener.</p>" .
                        "<p>Atentamente,<br>" .
                        "El equipo de Media T</p>",
                    "correo" => $email
                ];
            }




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


    // Actualizar foto administrador
    public function actualizarFotoAdminControlador()
    {

        // Almacenar el id del usuario 
        $id = $this->limpiarCadena($_POST["admin_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_admin WHERE admin_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Administrador no encontrado",
                "descripcion" => "El Administrador que deseas eliminar la foto no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/admin/fotoUser/";

        // Comprobar si se selecciono una foto
        if ($_FILES["admin_foto"]["name"] == "" && $_FILES['admin_foto']['size'] <= 0) {
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
        if (mime_content_type($_FILES["admin_foto"]["tmp_name"]) != "image/jpeg" && mime_content_type($_FILES["admin_foto"]["tmp_name"]) != "image/png") {
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
        if (($_FILES["admin_foto"]["size"] / 1024) > 5120) {

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
        if ($datos["admin_foto"] != "") {
            $foto = explode(".", $datos["admin_foto"]);
            $foto = $foto[0];
            $foto = $foto . "1";
            $foto = str_ireplace(" ", "", $foto);
        } else {
            $foto = explode(".", $_FILES["admin_foto"]["name"]);
            $foto[0] = $datos["admin_nombres"];
            $foto = str_ireplace(" ", "_", $datos["admin_nombres"]);
            $foto = $foto . "_" . rand(0, 100);
        }

        // Agregar extensión a la foto

        switch (mime_content_type($_FILES["admin_foto"]["tmp_name"])) {

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
        if (!move_uploaded_file($_FILES["admin_foto"]["tmp_name"], $img_dir . $foto)) {

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
        if (is_file($img_dir . $datos['admin_foto']) && $datos['admin_foto'] != $foto) {

            chmod($img_dir . $datos['admin_foto'], 0777);
            unlink($img_dir . $datos['admin_foto']);
        }


        // Arrys que contiene los valores que se van a mandar a la base de datos
        $admin_datos_up = [
            [
                "campo_nombre" => "admin_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => $foto

            ],
            [
                "campo_nombre" => "admin_actualizado",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];

        $condicion = [
            "condicion_campo" => "admin_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Actualizo la foto de un administrador";
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

        if ($this->actualizarDatos("tbl_admin", $admin_datos_up, $condicion)) {
            $registar_actua = $this->insertarDatos("actualizaciones", $admin_datos_ac);
            $_SESSION["foto_admin"] = $foto;
            // $mensajeEmail = [
            //     "asunto" => "Actualización de Foto de Perfil",
            //     "mensaje" => "<p>Estimado/a " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . ",</p>" .
            //         "<p>Le informamos que su foto de perfil ha sido actualizada exitosamente desde el panel administrativo de Media T. Esta acción fue realizada por un administrador y no puede ser realizada por los usuarios directamente.</p>" .
            //         "<p><strong>Nombre de Usuario:</strong> " . $datos["usuario_usuario"] . "</p>" .
            //         "<p>Si usted no solicitó esta actualización o si tiene alguna duda respecto a este cambio, por favor, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos' en nuestro sitio web.</p>" .
            //         "<p>Gracias por su atención y por formar parte de Media T.</p>" .
            //         "<p>Atentamente,<br>" .
            //         "El equipo de Media T</p>",
            //     "correo" => $datos["usuario_correo"]
            // ];
            // $this->enviarCorreo($mensajeEmail);



            $alerta = [
                "tipo" => "exito",
                "icono" => "exito",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "La foto del administrador " . $datos["admin_nombres"] . " ha sido actualizado correctamente."
            ];
        } else {

            $alerta = [
                "tipo" => "recargar",
                "icono" => "warning",
                "titulo" => "Error al Actualizar la foto",
                "descripcion" => "No hemos podido actualizar algunos datos, sin embargo la foto del usuario " . $datos['admin_nombres'] . " ha sido actualizada"

            ];
        }

        return json_encode($alerta);
    }



    // Eliminar imagen
    public function EliminarFotoAdminControlador()

    {
        // Almacenar el id del usuario 
        $id = $this->limpiarCadena($_POST["admin_id"]);

        $datos = $this->ejecutarConsulta("SELECT * FROM tbl_admin WHERE admin_id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Usuario no encontrado",
                "descripcion" => "El administrador y la foto que deseas eliminar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch();
        }

        // Directorio de imágenes
        $img_dir = "../views/assets/img/admin/fotoUser/";
        chmod($img_dir, 0777);

        if (is_file($img_dir . $datos["admin_foto"])) {

            chmod($img_dir . $datos["admin_foto"], 0777);

            if (!unlink($img_dir . $datos["admin_foto"])) {

                $alerta = [
                    "tipo" => "simple",
                    "icono" => "error",
                    "titulo" => "Foto del Usuario No Encontrada",
                    "descripcion" => "No hemos encontrado la foto del administrador en el sistema."
                ];

                return json_encode($alerta);
                exit();
            }
        } else {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Foto del suario no encontrado",
                "descripcion" => "No hemos encontrado la foto del administrador en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $admin_datos_up = [
            [
                "campo_nombre" => "admin_foto",
                "campo_marcador" => ":Foto",
                "campo_valor" => ""

            ],

            [
                "campo_nombre" => "admin_foto",
                "campo_marcador" => ":Actualizado",
                "campo_valor" => date("Y-m-d H:i:s")

            ]
        ];

        $condicion = [
            "condicion_campo" => "admin_id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];

        if ($this->actualizarDatos("tbl_admin", $admin_datos_up, $condicion)) {

            // $mensajeEmail = [
            //     "asunto" => "Eliminación de Foto de Perfil",
            //     "mensaje" => "<p>Estimado/a " . $datos["usuario_nombres"] . " " . $datos["usuario_apellidos"] . ",</p>" .
            //         "<p>Le informamos que su foto de perfil ha sido eliminada exitosamente desde el panel administrativo de Media T. Esta acción fue realizada por un administrador y no puede ser realizada por los usuarios directamente.</p>" .
            //         "<p><strong>Nombre de Usuario:</strong> " . $datos["usuario_usuario"] . "</p>" .
            //         "<p>Si usted no solicitó esta eliminación o si tiene alguna duda respecto a este cambio, por favor, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos' en nuestro sitio web.</p>" .
            //         "<p>Gracias por su atención y por formar parte de Media T.</p>" .
            //         "<p>Atentamente,<br>" .
            //         "El equipo de Media T</p>",
            //     "correo" => $datos["usuario_correo"]
            // ];


            // $this->enviarCorreo($mensajeEmail);

            $alerta = [
                "tipo" => "recargar",
                "icono" => "exito",
                "titulo" => "Foto eliminada",
                "descripcion" => "La foto del  administrador " . $datos["admin_nombres"] . "  ha sido eliminada correctamente."
            ];
        } else {

            $alerta = [
                "tipo" => "recargar",
                "icono" => "exito",
                "titulo" => "Error al eliminar Usuario",
                "descripcion" => "No hemos podido actualizar algunos datos del administrador " . $datos['admin_nombres'] . ", sin embargo la foto ha sido actualizada",

            ];
        }

        return json_encode($alerta);
    }
}
