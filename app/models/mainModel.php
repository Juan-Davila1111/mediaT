<?php
// Creando el nombre de espacio y llamando a las funciones de PDO, para la conexión a la base de datos
namespace app\models;

use PDO;
use PDOException;

// Incluimos las constantes para conectarse a la base de datos
if (file_exists(__DIR__ . "/../../config/server.php")) {
    require_once(__DIR__ . "/../../config/server.php");
}

// Incluimos los archivos para enviar los correos
require(__DIR__ . "/../PHPMailer/Exception.php");
require(__DIR__ . "/../PHPMailer/PHPMailer.php");
require(__DIR__ . "/../PHPMailer/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;




// Clase del moedelo principal
class mainModel
{
    private $server = DB_SERVER;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;

    // conexion a la base de datos
    protected function conectar()
    {
        try {
            $conexion = new PDO("mysql:host=$this->server;dbname=$this->db", $this->user, $this->pass);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8"); //Permite todo tipo de caracteres

            return $conexion;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        };
    }

    // Ejecutar consultas a la base de datos
    public function ejecutarConsulta($consulta)
    {
        $sql = $this->conectar()->prepare($consulta);
        $sql->execute();
        return $sql;
    }


    public function ejecutarConsultaIp($consulta, $params = []) {
        $sql = $this->conectar()->prepare($consulta);
        $sql->execute($params);
        return $sql;
    }

    


    // Funcion para quitar palabras no permitidas(evitar ataques de inyeccion SQL)
    public function limpiarCadena($cadena)
    {
        // Posibles palabras que puedan vernir en el texto
        $palabras = [
            "<script>",
            "</script>",
            "<script src",
            "<script type=",
            "SELECT * FROM",
            "SELECT ",
            " SELECT ",
            "DELETE FROM",
            "INSERT INTO",
            "DROP TABLE",
            "DROP DATABASE",
            "TRUNCATE TABLE",
            "SHOW TABLES",
            "SHOW DATABASES",
            "<?php",
            "?>",
            "--",
            "^",
            "<",
            ">",
            "==",
            "=",
            ";",
            "::",
            "UNION SELECT",
            "UNION ALL",
            "OR 1=1",
            "1=1",
            "AND 1=1",
            "ORDER BY",
            "GROUP BY",
            "HAVING",
            "EXEC(",
            "EXECUTE(",
            "xp_",
            "sp_",
            "sysobjects",
            "syscolumns",
            "xp_cmdshell",
            "information_schema",
            "CREATE USER",
            "ALTER USER",
            "GRANT ALL PRIVILEGES",
            "mysql_",
            "pg_",
            "pgsql_",
            "schema.",
            "table_name",
            "column_name",
            "sleep(",
            "benchmark(",
            "/*",
            "*/",
            "CONCAT(",
            "CONCAT_WS(",
            "LOAD_FILE(",
            "INTO OUTFILE",
            "MID(",
            "SUBSTRING(",
            "BENCHMARK(",
            "CHAR(",
            "ASCII(",
            "UNICODE(",
            "ORD(",
            "HEX(",
            "XOR",
            "VERSION()"
        ];
        // Quitando los espacios en blanco al inico del texto y las barras(/)
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        // Eliminado la palabra no permitida
        foreach ($palabras as $palabra) {
            $cadena =  str_ireplace($palabra, "", $cadena);
        }
        // Quitando los espacios en blanco al inico del texto y las barras(/)
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);

        return $cadena;
    }




    //----------- Validar expresiones regulares----------
    protected function verificarDatos($filtro, $texto)
    {
        if (preg_match("/^" . $filtro . "$/", $texto)) {
            return false;
        } else {

            return true;
        }
    }



    /*----------  Funcion para ejecutar una consulta INSERT preparada  ----------*/
    protected function insertarDatos($tabla, $datos)
    {
        $query = "INSERT INTO $tabla ("; //Se pone la primeras instancia para insertar datos

        $contador = 0;
        foreach ($datos as $clave) {
            if ($contador >= 1) {
                $query .= ",";
            }
            $query .= $clave["campo_nombre"];
            $contador++;
        }
        $query .= ")VALUES(";
        // Poniendo los valores que se van a insertar
        $contador = 0;
        foreach ($datos as $clave) {
            if ($contador >= 1) {
                $query .= ",";
            }
            $query .= $clave["campo_marcador"];
            $contador++;
        }
        $query .= ")";

        $sql = $this->conectar()->prepare($query);

        foreach ($datos as $clave) {
            $sql->bindParam($clave["campo_marcador"], $clave["campo_valor"]);
        }
        $sql->execute();
        return $sql;
    }


    /*----------  Funcion para ejecutar una consulta UPDATE preparada  ----------*/
    public function seleccionarDatos($tipo, $tabla, $campo, $valor)
    {
        // Limpiar los datos recibidos
        $tipo = $this->limpiarCadena($tipo);
        $tabla = $this->limpiarCadena($tabla);
        $campo = $this->limpiarCadena($campo);
        $valor = $this->limpiarCadena($valor);


        if ($tipo == "Unico") {
            $sql = $this->conectar()->prepare("SELECT * FROM $tabla WHERE $campo =:ID");
            $sql->bindParam(":ID", $valor);
        } elseif ($tipo == "Normal") {
            $sql = $this->conectar()->prepare("SELECT $campo FROM $tabla");
        } elseif ($tipo == "Varios") {
            $sql = $this->conectar()->prepare("SELECT * FROM $tabla WHERE $campo =:Valor");
            $sql->bindParam(":Valor", $valor);
        }
        
        $sql->execute();
        return $sql;
    }

    public function seleccionarDatosTodo($tabla)
    {
        // Limpiar los datos recibidos
        $tabla = $this->limpiarCadena($tabla);

            $sql = $this->conectar()->prepare("SELECT * FROM $tabla");
              
        $sql->execute();
        return $sql;
    }


    // Actualizar datos de la base de dato
    public function actualizarDatos($tabla, $datos, $condicion)
    {
        $query = "UPDATE $tabla SET ";
        $c = 0;
        foreach ($datos as $clave) {
            if ($c >= 1) {
                $query .= ",";
            }
            $query .= $clave["campo_nombre"] . "=" . $clave["campo_marcador"];

            $c++;
        }

        $query .= " WHERE " . $condicion["condicion_campo"] . "=" . $condicion["condicion_marcador"];
        $sql = $this->conectar()->prepare($query);

        foreach ($datos as $clave) {

            $sql->bindParam($clave["campo_marcador"], $clave["campo_valor"]);
        }

        $sql->bindParam($condicion["condicion_marcador"], $condicion["condicion_valor"]);

        $sql->execute();
        return $sql;
    }


    // Eliminar datos de la base de datos
    protected function eliminarDatos($tabla, $campo, $id)
    {
        $sql = $this->conectar()->prepare("DELETE FROM $tabla WHERE $campo =:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql;
    }



    // Paginador de tablas
    protected function paginadorTablas($pagina, $numeroPaginas, $url, $botones)
    {
        $tabla = '<div class="botonera">';

        if ($pagina <= 1) {
            $tabla .= '<div class="botones">
            <span class="anterior prevenir">Anterior</span>
            <div class="btn1">';
        } else {
            $tabla .= '<div class="botones">
            <a href="' . $url . ($pagina - 1) . '/" class="anterior" >Anterior</a>
            <div class="btn1">
            <a class="boton" href="' . $url . '1/">1</a>
            <span class="material-symbols-sharp si">page_control</span>';
        }

        $ci = 0;
        for ($i = $pagina; $i <= $numeroPaginas; $i++) {
            if ($ci >= $botones) {
                break;
            }

            if ($pagina == $i) {
                $tabla .= '<a class="boton activo" href="' . $url . $i . '/">' . $i . '</a>';
            } else {
                $tabla .= '<a class="boton" href="' . $url . $i . '/">' . $i . '</a>';
            }
            $ci++;
        }



        if ($pagina == $numeroPaginas) {
            $tabla .= '
                </div>
                <span class="siguiente prevenir">Siguiente</span>
            ';
        } else {
            $tabla .= '
             <li>&hellip;</li>
            <a class="boton" href="' . $url . $numeroPaginas . '/">' . $numeroPaginas . '</a>
            </div>
            <a class="siguiente " href="' . $url . ($pagina + 1) . '/">Siguiente</a>
        ';
        }

        $tabla .= '</div>';
        return $tabla;
    }

    // Cuenta de los quizz
   

    // Enviar correos
    protected function enviarCorreo($mensaje)
    {
        $correo = $mensaje["correo"];
        $asunto = $mensaje["asunto"];
        $cuerpo = $mensaje["mensaje"];


        $mail = new PHPMailer(true);

        try {

            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mediat2024k@gmail.com';
            $mail->Password   = 'kg b j k k i a h x n p s o l s';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;
            $mail->CharSet = 'UTF-8';


            // Cabeceras del correo
            $mail->setFrom('mediat2024k@outlook.com', 'Media T');
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = $cuerpo;

            // Enviar correo
            $mail->send();
        } catch (Exception $e) {
            echo "El correo no pudo ser enviado. Error: {$mail->ErrorInfo}";
        }
    }



}
