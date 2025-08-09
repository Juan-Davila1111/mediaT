<?php if ($_SESSION["permiso"] != "true") {
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
    exit();
} ?>

<?php
$_SESSION["nombre"];
$_SESSION["apellido"];

?>

<?php ob_start() ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            width: 100%;
            height: 100vh;
            padding: 0;
            margin: 0;
            background-image: url("<?php echo APP_URL ?>/app/views/assets/img/user/fondo.png");
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .certificate {
            margin: auto;
            width: 90%;
            /* background-color: red; */
            max-width: 900px;
            height: 90%;
            max-height: 400px;
            text-align: center;
            /* background-color: red; */
            /* border: 1px solid #ccc; */
            border-radius: 10px;
            padding: 20px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            position: relative;
            padding: 260px 0 0 0;
        }


        .imgAbso {
            position: absolute;
            left: 0;
            bottom: 230px;

        }

        .certificate h1,
        .certificate h2 {
            margin-bottom: 10px;
        }

        .certificate h1 {
            font-size: 45px;
        }

        .certificate h2 {
            font-size: 40px;
            border-bottom: 1px solid gray;
        }

        .certificate .title {
            color: #333;
            margin: 10px 0;
        }

        .certificate .title.gold {
            color: gold;
            font-weight: bold;
        }

        .certificate .info {
            margin: 15px 0;
            color: #555;
        }

        .certificate .info strong {
            color: #333;
        }

        .signature {
            position: absolute;
            bottom: 20px;
            right: 20px;
            text-align: right;
        }

        .signature-name {
            margin: 5px 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="certificate">
            <h1 class="title">Certificado de Reconocimiento</h1>
            <p class="info">Otorgado a:</p>
            <h2 class="title"><?php echo $_SESSION["nombre"] ?> <?php echo $_SESSION["apellido"] ?></h2>
            <p class="info">
                QUIEN CONCLUYÓ DE MANERA SATISFACTORIA EL <strong>Quizz de Media T</strong>,
                COMPRUEBA HABER COMPLETADO Y GANADO <strong>5 QUIZZES</strong> DE CUALQUIER TÉCNICA O MATERIA OFRECIDO POR EL SISTEMA.
            </p>
            <p class="info">Fecha:<?php echo $_SESSION["fecha_actual"] ?></p>
            <p class="info">Emitido por: Media T</p>

            <img class="imgAbso" src="<?php echo APP_URL ?>app/views/assets/img/logo1.png" alt="">
        </div>
    </div>
</body>

</html>
<?php $html = ob_get_clean(); ?>

<?php
require_once './app/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Cargar el contenido HTML
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', "landscape");

$options = $dompdf->getOptions();
$options->set(array("isRemoteEnabled" => true));
$dompdf->setOptions($options);

$dompdf->render();

// Descargar el PDF (no adjuntar)
$dompdf->stream("mediaT.pdf", array("Attachment" => false));
?>