<?php

//funcion para agrear un nuevo tema a la BD
namespace app\controllers;

use app\models\mainModel;

class quizController extends mainModel
{

    function agregarNuevoTema()
    {
        $tema = $this->limpiarCadena($_POST["nombreTema"]);
        // Verificar los filtros con las expresiones regulares del tema
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $tema)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Tema Incorrecto",
                "descripcion" => "El nombre del tema ingresado no cumple con el formato requerido. Por favor, verifica tu información."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar usuario
        $check_tema = $this->ejecutarConsulta("SELECT nombre FROM temas WHERE nombre = '$tema'");
        if ($check_tema->rowCount() > 0) {

            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Tema Existente",
                "descripcion" => "El tema ingresado ya está registrado en nuestro sistema. Por favor, utiliza otro usuario."
            ];

            return json_encode($alerta);
            exit();
        }

        $img_dir = "../views/assets/img/user/quiz/";
        // Comprobar si se selecciono una foto
        if ($_FILES["foto"]["name"] != "" && $_FILES["foto"]["size"] > 0) {

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
            if (mime_content_type($_FILES["foto"]["tmp_name"]) != "image/jpeg" && mime_content_type($_FILES["foto"]["tmp_name"]) != "image/png") {
                $alerta = [
                    "tipo" => "error",
                    "icono" => "error",
                    "titulo" => "Formato de Imagen No Permitido",
                    "descripcion" => "La imagen que intentas subir no cumple con el formato permitido."
                ];

                return json_encode($alerta);
                exit();
            }

            // Verificar el peso de la imágen
            if (($_FILES["foto"]["size"] / 1024) > 5120) {

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
            $foto = str_ireplace(" ", "_", $tema);
            $foto = $foto . "_" . rand(0, 100);

            switch (mime_content_type($_FILES["foto"]["tmp_name"])) {

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
            if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $img_dir . $foto)) {

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
                "campo_nombre" => "nombre",
                "campo_marcador" => ":Tema",
                "campo_valor" => $tema
            ],

            [
                "campo_nombre" => "foto",
                "campo_marcador" => ":foto",
                "campo_valor" => $foto
            ]

        ];

        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Agreo un nuevo tema de quizz";
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
        //armamos el query para insertar en la tabla temas
        // $query = "INSERT INTO temas (id, nombre) VALUES (NULL, '$tema')";

        //insertamos en la tabla temas
        $registar_quiz = $this->insertarDatos("temas", $novedades_datos_reg);

        if ($registar_quiz->rowCount() == 1) {

            $alerta = [
                "tipo" => "exito",
                "icono" => "success",
                "titulo" => "Registro Exitoso",
                "descripcion" => "El tema ha sido registrado correctamente."
            ];
        } else {

            // if (is_file($img_dir . $foto)) {

            //     chmod($img_dir . $foto, 0777);
            //     unlink($img_dir . $foto);
            // }

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Registrar tema de quiz",
                "descripcion" => "No se pudo registrar el tema en la base de datos."
            ];
        }
        return json_encode($alerta);
    }


    function obtenerNombreTema($id)
    {

        // $query = "SELECT * FROM temas WHERE id = '$id'";
        $resultado = $this->seleccionarDatos("Unico", "temas", "tema_id", $id);
        $resultado = $resultado->fetch();


        return $resultado["nombre"];
    }


    function obtenerNombreFoto($id)
    {

        // $query = "SELECT * FROM temas WHERE id = '$id'";
        $resultado = $this->seleccionarDatos("Unico", "temas", "tema_id", $id);
        $resultado = $resultado->fetch();


        return $resultado["foto"];
    }
    function obetenerTodasLasPreguntas()
    {
        $query = "SELECT * FROM preguntas";
        $result = $this->ejecutarConsulta($query);
        $result = $result->fetchAll();
        return $result;
    }

    function insertarPregunta()
    {
        /******************************************************* */
        //GUARDAMOS LA PREGUNTA

        //tomamos los datos que vienen del fosrmulario
        $pregunta = $this->limpiarCadena($_POST['pregunta']);
        $opcion_a = $this->limpiarCadena($_POST['opcion_a']);
        $opcion_b = $this->limpiarCadena($_POST['opcion_b']);
        $opcion_c = $this->limpiarCadena($_POST['opcion_c']);
        $id_tema = $this->limpiarCadena($_POST['tema']);
        $correcta = $this->limpiarCadena($_POST['correcta']);

        // Verificar los inputs obligatorios
        if ($pregunta == "" || $opcion_a == "" || $opcion_b == "" || $opcion_c == "" || $id_tema == "" || $correcta == "") {
            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Campos Incompletos",
                "descripcion" => "Faltan campos obligatorios por completar."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares 
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,70}", $opcion_a)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Pregunta Incorrecta",
                "descripcion" => "La opción A no cumple con el formato requerido."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares 
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,70}", $opcion_b)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Pregunta Incorrecta",
                "descripcion" => "La opción B no cumple con el formato requerido."
            ];

            return json_encode($alerta);
            exit();
        }

        // Verificar los filtros con las expresiones regulares 
        if ($this->verificarDatos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{3,70}", $opcion_c)) {
            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Pregunta Incorrecta",
                "descripcion" => "La opción C no cumple con el formato requerido."
            ];

            return json_encode($alerta);
            exit();
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $quiz_datos_reg = [
            [
                "campo_nombre" => "tema",
                "campo_marcador" => ":Tema",
                "campo_valor" => $id_tema

            ],


            [
                "campo_nombre" => "pregunta",
                "campo_marcador" => ":Pregunta",
                "campo_valor" => $pregunta

            ],

            [
                "campo_nombre" => "opcion_a",
                "campo_marcador" => ":OpcionA",
                "campo_valor" => $opcion_a

            ],

            [
                "campo_nombre" => "opcion_b",
                "campo_marcador" => ":OpcionB",
                "campo_valor" => $opcion_b

            ],


            [
                "campo_nombre" => "opcion_c",
                "campo_marcador" => ":OpcionC",
                "campo_valor" => $opcion_c

            ],

            [
                "campo_nombre" => "correcta",
                "campo_marcador" => ":Correcta",
                "campo_valor" => $correcta

            ]
        ];


        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Agreo una nueva pregunta de quizz";
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

        // / Insertando los datos a la base de datos
        $registar_quiz = $this->insertarDatos("preguntas", $quiz_datos_reg);

        if ($registar_quiz->rowCount() == 1) {
            $alerta = [
                "tipo" => "exito",
                "icono" => "success",
                "titulo" => "Registro Exitoso",
                "descripcion" => "La pregunta ha sido registrado correctamente."
            ];

            return json_encode($alerta);
        }
    }


    public function obtenerTotalPreguntas()
    {
        //Añadimos un alias AS total para identificar mas facil
        $consulta_total = "SELECT COUNT(id) FROM preguntas";
        $total = $this->ejecutarConsulta($consulta_total);
        $total = $total->fetchColumn();

        return $total;
    }

    public function obtenerPreguntaPorId($id)
    {
        // $query = "SELECT * FROM preguntas WHERE id = $id";
        // $result = $this->ejecutarConsulta($query);
        // $pregunta = $result->fetchAll();

        $resultado = $this->seleccionarDatos("Unico", "preguntas", "id", $id);
        $resultado = $resultado->fetch();

        return $resultado;
    }
    public function totalPreguntasPorCategoria($tema)
    {
        $query = "SELECT COUNT(*) AS total FROM preguntas WHERE tema = '$tema'";
        $result = $this->ejecutarConsulta($query);
        $result = $result->fetch();
        return $result['total'];
    }

    public function obtenerCategorias()
    {
        //ACOntamos la cantidad de cada categoria
        $query = "SELECT tema, COUNT(*) as cantidad FROM preguntas GROUP BY tema";
        $resultado = $this->ejecutarConsulta($query);
        $resultado = $resultado->fetchAll();
        return $resultado;
    }
    public function obtenerIdsPreguntasPorCategoria($tema)
    {
        $query = "SELECT id FROM preguntas WHERE tema = $tema";
        $result = $this->ejecutarConsulta($query);
        $result = $result->fetchAll();

        return $result;
    }

    public function EliminarPregunta()
    {

        // Almacenar el id del usuario a eliminar
        $id = $this->limpiarCadena($_POST["quiz_id"]);

        // Verificar que exista el usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM preguntas WHERE id='$id'");

        if ($datos->rowCount() <= 0) { //Si no se encontro un usuaio

            $alerta = [
                "tipo" => "error",
                "titulo" => "Error al eliminar pregunta",
                "descripcion" => "La pregunta no existe en el sistema"

            ];

            return  json_encode($alerta);
            exit();
        } else {
            $datos = $datos->fetch(); //Almacenar los datos del usuario a eliminar
        }

        $eliminarUsuario = $this->eliminarDatos("preguntas", "id", $id);


        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Elimino una pregunta del quizz";
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

        if ($eliminarUsuario->rowCount() == 1) {

            $alerta = [
                "tipo" => "recargar",
                "titulo" => "Pregunta eliminado con éxito",
                "descripcion" => "La pregunta ha sido eliminado del sistema"
            ];


            return  json_encode($alerta);
            exit();
        } else {

            $alerta = [
                "tipo" => "info",
                "titulo" => "Error al eliminar pregunta",
                "descripcion" => "No se pudo eliminar la pregunta"
            ];
            return  json_encode($alerta);
            exit();
        }
    }


    public function EditarPregunta()
    {
        // Almacenar los datos del usuario a editar
        $id = $this->limpiarCadena($_POST["quiz_id"]);

        // Verificar usuario
        $datos = $this->ejecutarConsulta("SELECT * FROM preguntas WHERE id='$id'");

        if ($datos->rowCount() <= 0) {

            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Pregunta no encontrado",
                "descripcion" => "La pregunta que deseas actualizar no existe en el sistema."
            ];

            return  json_encode($alerta);
            exit();
        } else {

            $datos = $datos->fetch();
        }


        // Almecenar los datos del formulario que viene por metedo post



        //tomamos los datos que vienen del fosrmulario
        $pregunta = $this->limpiarCadena($_POST['pregunta']);
        $opcion_a = $this->limpiarCadena($_POST['opcion_a']);
        $opcion_b = $this->limpiarCadena($_POST['opcion_b']);
        $opcion_c = $this->limpiarCadena($_POST['opcion_c']);
        $id_tema = $this->limpiarCadena($_POST['tema']);
        $correcta = $this->limpiarCadena($_POST['correcta']);

        // Verificar los inputs obligatorios
        if ($pregunta == "" || $opcion_a == "" || $opcion_b == "" || $opcion_c == "" || $id_tema == "" || $correcta == "") {
            $alerta = [
                "tipo" => "warning",
                "icono" => "warning",
                "titulo" => "Campos Incompletos",
                "descripcion" => "Faltan campos obligatorios por completar."
            ];

            return json_encode($alerta);
            exit();
        }

        // Arrys que contiene los valores que se van a mandar a la base de datos
        $quiz_datos_up = [
            [
                "campo_nombre" => "tema",
                "campo_marcador" => ":Tema",
                "campo_valor" => $id_tema

            ],


            [
                "campo_nombre" => "pregunta",
                "campo_marcador" => ":Pregunta",
                "campo_valor" => $pregunta

            ],

            [
                "campo_nombre" => "opcion_a",
                "campo_marcador" => ":OpcionA",
                "campo_valor" => $opcion_a

            ],

            [
                "campo_nombre" => "opcion_b",
                "campo_marcador" => ":OpcionB",
                "campo_valor" => $opcion_b

            ],


            [
                "campo_nombre" => "opcion_c",
                "campo_marcador" => ":OpcionC",
                "campo_valor" => $opcion_c

            ],

            [
                "campo_nombre" => "correcta",
                "campo_marcador" => ":Correcta",
                "campo_valor" => $correcta

            ]

        ];

        $condicion = [
            "condicion_campo" => "id",
            "condicion_marcador" => ":ID",
            "condicion_valor" => $id
        ];


        $usuario_ac = $_SESSION["usuario_admin"];
        $texto_ac = "Modificó una nueva preguna del quizz";
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




        if ($this->actualizarDatos("preguntas", $quiz_datos_up, $condicion)) {

            $alerta = [
                "tipo" => "exito",
                "icono" => "exito",
                "titulo" => "Actualización Exitosa",
                "descripcion" => "La pregunta ha sido actualizada correctamente."
            ];
        } else {


            $alerta = [
                "tipo" => "error",
                "icono" => "error",
                "titulo" => "Error al Actualizar pregunta",
                "descripcion" => "No se pudo actualizar la pregunta."
            ];
        }

        return json_encode($alerta);
    }
}
