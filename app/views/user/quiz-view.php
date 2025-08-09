<?php require_once("./app/views/inc/user/header.php");

use app\controllers\quizController;

$insQuiz = new quizController();

$datosTema = $insQuiz->obtenerCategorias();
if (isset($_POST['idCategoria'])) {
    $_SESSION['idCategoria'] = $_POST['idCategoria'];
    if (headers_sent()) {
        echo '
            <script>
            window.location.href = "' . APP_URL . 'jugar";
            </script>
        ';
    } else {
        header("Location: " . APP_URL . "jugar");
    }
}



?>
<!-- Contenedor de el quiz -->

<div class="containerQuiz" id="cantainer">
    <div class="left">
        <div class="logo">
            Realiza tu Quizz
        </div>
        <h2>Pon a prueba tus conocimientos sobre nutrición, entrenamiento y más.</h2>
    </div>
    <div class="right">
        <h3>Elige una categoría</h3>
        <div class="categoriasquiz">
            <?php foreach ($datosTema as $tema) { ?>
                <div class="categoria">
                    <form action="" id="<?php echo $tema['tema']?>" method="post" >
                        <input type="hidden" name="idCategoria" value="<?php echo $tema['tema']?>" >
                        <?php $datosFoto = $insQuiz->obtenerNombreFoto($tema["tema"]); ?>
                        <a href="javascript:{}" onclick="document.getElementById(<?php echo $tema['tema']?>).submit(); return false;">

                            <div class="fichaImg">
                                <?php if ($datosFoto == "") { ?>
                                    <img src="<?php echo APP_URL?>app/views/assets/img/user/quiz/matematicas.png" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo APP_URL?>app/views/assets/img/user/quiz/<?php echo $datosFoto ?>" alt="">
                                <?php } ?>


                            </div>
                            <p> <?php echo $datosNombre = $insQuiz->obtenerNombreTema($tema["tema"]); ?> </p>
                        </a>
                    </form>
                </div>
            <?php } ?>

        </div>

    </div>
</div>




<?php require_once("./app/views/inc/user/footer.php"); ?>
</body>