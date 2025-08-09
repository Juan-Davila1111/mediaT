<?php


namespace app\controllers;

use app\models\mainModel;



// Contrilador para los usuarios
class loginController extends mainModel
{


    // Funcion de crear cuenta
    public function registrarUsuarioControlador()
    {
        // Almecenar los datos del formulario que viene por metedo post
        $nombre = $this->limpiarCadena($_POST["usuario_nombre"]);
        $usuario = $this->limpiarCadena($_POST["usuario_usuario"]);
        $email = $this->limpiarCadena($_POST["usuario_email"]);
        $password1 = $this->limpiarCadena($_POST["usuario_password1"]);
        $password2 = $this->limpiarCadena($_POST["usuario_password2"]);



        // Verificar los inputs obligatorios
        if ($nombre == "" || $email == "" || $password1 == "" || $password2 == "" || $usuario == "") {
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
                        "tipo" => "error",
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
                "tipo" => "error",
                "icono" => "error",
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
                "tipo" => "error",
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


        // Insertando los datos a la base de datos
        $registar_usuario = $this->insertarDatos("tbl_usuarios", $usuario_datos_reg);

        if ($registar_usuario->rowCount() == 1) {

            $mensajeEmail = [
                "asunto" => "Confirmación de Registro Exitoso",
                "mensaje" => "<p>Estimado/a " . htmlspecialchars($nombre) . ",</p>" .
                    "<p>Nos complace informarle que se ha registrado exitosamente en Media T. A continuación, encontrará los detalles de su cuenta:</p>" .
                    "<p><strong>Nombre:</strong> " . htmlspecialchars($nombre) . "<br>" .
                    "<strong>Nombre de Usuario:</strong> " . htmlspecialchars($usuario) . "<br>" .
                    "<strong>Correo Electrónico:</strong> " . htmlspecialchars($email) . "</p>" .
                    "<p>Si tiene alguna pregunta o necesita asistencia adicional, no dude en ponerse en contacto con nuestro equipo de soporte a través del apartado de 'Contáctenos'.</p>" .
                    "<p>Gracias por elegir Media T. Esperamos que disfrute de nuestros servicios.</p>" .
                    "<p>Atentamente,<br>" .
                    "El equipo de Media T</p>",
                "correo" => $email
            ];

            $this->enviarCorreo($mensajeEmail);



            $alerta = [
                "tipo" => "recargar",
                "icono" => "success",
                "titulo" => "Registro Exitoso",
                "descripcion" => "El usuario " . $usuario . " ha sido registrado correctamente. inice sesión con sus datos"
            ];


            return json_encode($alerta);
        }
    }

    // Función para iniciar sesión
    public function iniciaresionControlador()
    {
        // Almacenar los datos que vienen desde el login
        $usuario = $this->limpiarCadena($_POST["login_usuario"]);
        $password = $this->limpiarCadena($_POST["login_password"]);

        // Si un input viene vacío, mostrar alerta
        if ($usuario == "" || $password == "") {
            echo '
                <script>
                agregarToast({
                    tipo: "error",
                    titulo: "Error de inicio de sesión",
                    descripcion: "Por favor, ingresa tanto el usuario como la contraseña.",
                    autoCierre: true
                });
                </script>
            ';
        } else {
            // Verificar que los datos cumplan con el formato solicitado
            if ($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $password)) {
                echo '
                    <script>
                    agregarToast({
                        tipo: "error",
                        titulo: "Formato de contraseña incorrecto",
                        descripcion: "La contraseña ingresada no cumple con el formato solicitado.",
                        autoCierre: true
                    });
                    </script>
                ';
            } else {
                // Verificar que el usuario exista en la base de datos
                $check_usuario = $this->ejecutarConsulta("SELECT * FROM tbl_usuarios WHERE usuario_usuario = '$usuario'");
                if ($check_usuario->rowCount() == 1) {
                    // Obtener todos los datos de dicho usuario
                    $check_usuario = $check_usuario->fetch();

                    if ($check_usuario["usuario_usuario"] == $usuario && password_verify($password, $check_usuario["usuario_password"])) {
                        // Creando las variables de sesión
                        session_start();
                        $_SESSION['id'] = $check_usuario["usuarios_id"];
                        $_SESSION['nombre'] = $check_usuario["usuario_nombres"];
                        $_SESSION['apellido'] = $check_usuario["usuario_apellidos"];
                        $_SESSION['usuario'] = $check_usuario["usuario_usuario"];
                        $_SESSION['correo'] = $check_usuario["usuario_correo"];
                        $_SESSION['foto'] = $check_usuario["usuario_foto"];

                        // Redirigir a la vista del dashboard
                        if (headers_sent()) {
                            echo '
                                <script>
                                window.location.href = "' . APP_URL . 'dashboard";
                                </script>
                            ';
                        } else {
                            header("Location: " . APP_URL . "dashboard");
                        }
                    } else {
                        echo '
                            <script>
                            agregarToast({
                                tipo: "error",
                                titulo: "Usuario o clave incorrecta",
                                descripcion: "Por favor, verifica tus datos e intenta nuevamente.",
                                autoCierre: true
                            });
                            </script>
                        ';
                    }
                } else {
                    echo '
                        <script>
                        agregarToast({
                            tipo: "error",
                            titulo: "Usuario o clave incorrecta",
                            descripcion: "Por favor, verifica tus datos e intenta nuevamente.",
                            autoCierre: true
                        });
                        </script>
                    ';
                }
            }
        }
    }



    
    // Función para iniciar sesión admin
    public function iniciaresionAdminControlador()
    {
        // Almacenar los datos que vienen desde el login
        $usuario = $this->limpiarCadena($_POST["admin_usuario"]);
        $password = $this->limpiarCadena($_POST["admin_password"]);

        // Si un input viene vacío, mostrar alerta
        if ($usuario == "" || $password == "") {
            echo '
                <script>
                agregarToast({
                    tipo: "error",
                    titulo: "Error de inicio de sesión",
                    descripcion: "Por favor, ingresa tanto el usuario como la contraseña.",
                    autoCierre: true
                });
                </script>
            ';
        } else {
            // Verificar que los datos cumplan con el formato solicitado
            if ($this->verificarDatos("[a-zA-Z0-9$@.-]{7,100}", $password)) {
                echo '
                    <script>
                    agregarToast({
                        tipo: "error",
                        titulo: "Formato de contraseña incorrecto",
                        descripcion: "La contraseña ingresada no cumple con el formato solicitado.",
                        autoCierre: true
                    });
                    </script>
                ';
            } else {
                // Verificar que el usuario exista en la base de datos
                $check_usuario = $this->ejecutarConsulta("SELECT * FROM tbl_admin WHERE admin_usuario = '$usuario'");
                if ($check_usuario->rowCount() == 1) {
                    // Obtener todos los datos de dicho usuario
                    $check_usuario = $check_usuario->fetch();

                    if ($check_usuario["admin_usuario"] == $usuario && password_verify($password, $check_usuario["admin_password"])) {
                        // Creando las variables de sesión
                        session_start();
                        $_SESSION['id_admin'] = $check_usuario["admin_id"];
                        $_SESSION['usuario_admin'] = $check_usuario["admin_usuario"];
                        $_SESSION['tipo'] = $check_usuario["admin_tipo"];
                        $_SESSION['foto_admin'] = $check_usuario["admin_foto"];

                        // Redirigir a la vista del dashboard
                        if (headers_sent()) {
                            echo '
                                <script>
                                window.location.href = "' . APP_URL . 'admin";
                                </script>
                            ';
                        } else {
                            header("Location: " . APP_URL . "admin");
                        }
                    } else {
                        echo '
                            <script>
                            agregarToast({
                                tipo: "error",
                                titulo: "Usuario o clave incorrecta",
                                descripcion: "Por favor, verifica tus datos e intenta nuevamente.",
                                autoCierre: true
                            });
                            </script>
                        ';
                    }
                } else {
                    echo '
                        <script>
                        agregarToast({
                            tipo: "error",
                            titulo: "Usuario o clave incorrecta",
                            descripcion: "Por favor, verifica tus datos e intenta nuevamente.",
                            autoCierre: true
                        });
                        </script>
                    ';
                }
            }
        }
    }

    
    public function cerrarSessionControlador()
    {

        session_destroy();
        session_unset();

        if (headers_sent()) {
            echo "
            <script>
                window.location.href='" . APP_URL . "login';
            </script>

            ";
        } else {
            header("location:" . APP_URL . "login");
        }
    }
}
