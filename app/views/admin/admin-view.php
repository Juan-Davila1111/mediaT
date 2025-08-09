<?php

use app\controllers\userController;

$insUsuario = new userController();

$sentenicia = "SELECT * FROM actualizaciones ORDER BY id DESC LIMIT 6";
$datos = $insUsuario->ejecutarConsulta($sentenicia);
$datos = $datos->fetchAll();

$sentencia2 = "SELECT MONTH(usuario_creado) AS mes, COUNT(*) AS total FROM tbl_usuarios GROUP BY mes";
$datosMes = $insUsuario->ejecutarConsulta($sentencia2);
$datosMes = $datosMes->fetchAll(PDO::FETCH_ASSOC);

$usuariosPorMes = array_fill(1, 12, 0);


foreach ($datosMes as $fila) {
    $usuariosPorMes[(int)$fila['mes']] = (int)$fila['total'];
}

// Convertir los datos en formato JSON
$datosJSON = json_encode(array_values($usuariosPorMes));
echo "<script>var datosUsuarios = $datosJSON;</script>";



// Consulta SQL para obtener los temas y el número de preguntas
$sentencia3 = "SELECT t.nombre, COUNT(p.id) AS total_preguntas FROM temas t LEFT JOIN preguntas p ON t.tema_id = p.tema GROUP BY t.tema_id;";

$datosTemas = $insUsuario->ejecutarConsulta($sentencia3);
$datosTemas = $datosTemas->fetchAll(PDO::FETCH_ASSOC);

$datosJSON = json_encode($datosTemas);

// Enviar los datos a JavaScript
echo "<script>var datosTemas = $datosJSON;</script>";



?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- imagen de la pestaña -->
    <link rel="shortcut icon" href="<?php echo APP_URL ?>app/views/assets/img/admin/bombilla.png" type="image/x-icon">
    <!-- link de los iconos -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- Link para las gráficas -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- css del header -->
    <link rel="stylesheet" href="<?php echo APP_URL ?>app/views/assets/css/admin/dashboard.css">
    <title>Media T</title>
</head>

<body class="overflow">
    <!--  animacion del load -->
    <div class="centrado-cargando">
        <div class="cargando" id="cargando">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="container">
        <?php require_once("./app/views/inc/admin/aside.php") ?>

        <!-- --------------
          end aside
        -------------------- -->
        <main>
            <h1 class="titulo">Dashboard</h1>

            <div class="date">
                <input type="date" id="almanaque">
            </div>
            <div class="canvas">
                <div class="canva cien">
                    <canvas class="grafica1" id="grafica" width="500" height="0"></canvas>
                </div>
                <div class="canva">
                    <canvas id="grafica2" width="400" height="200"></canvas>
                </div>
                <div class="canva">
                    <div class="contador">
                        <h5><span data-contador="<?php echo htmlspecialchars($contador); ?>">0</span>+</h5>
                        <p>Visitas totales</p>
                    </div>
                </div>
            </div>
        </main>
        <!------------------
           end main
          ------------------->
        <!----------------
          start right main 
        ---------------------->
        <div class="right">
            <?php require_once("./app/views/inc/admin/info.php") ?>
            <div class="recent_updates">
                <h2>Actualizaciones recientes</h2>
                <div class="updates">
                    <?php foreach ($datos as $dato) { ?>
                        <?php $rutaImg = APP_URL . "app/views/assets/img/admin/fotoUser/" . $dato["img"];
                        ?>
                        <div class="update">
                            <div class="profile-photo">
                                <?php if ($dato["img"] != "" && !is_file($rutaImg)) { ?>
                                    <img src="<?php echo APP_URL ?>app/views/assets/img/admin/fotoUser/<?php echo $dato["img"] ?>" alt="" />
                                <?php } else { ?>
                                    <img src="<?php echo APP_URL ?>app/views/assets/img/admin/fotoUser/defecto.png" alt="" />
                                <?php } ?>
                            </div>

                            <div class="message">
                                <p><b><?php echo $dato["usuario"] ?> </b><?php echo $dato["texto"]  ?></p>
                            </div>
                        </div>
                    <?php } ?>





                </div>
            </div>
        </div>


    </div>

    <script src="./app/views/assets/js/admin/header.js"></script>
    <script src="./app/views/assets/js/admin/script.js"></script>
</body>