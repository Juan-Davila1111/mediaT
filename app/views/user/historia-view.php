<!DOCTYPE html>
<html lang="es" class="overflow">

<head>
    <meta charset="UTF-8">
    <!-- imagen de la pestaña -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <!-- link de los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        ntegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <scrip src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></scrip>
    <!-- css del header -->
    <link rel="stylesheet" href="../assets/css/user/header.css">
    <!-- css del footer -->
    <link rel="stylesheet" href="../assets/css/user/footer.css">
    <!-- css de las Historia -->
    <link rel="stylesheet" href="../assets/css/user/mediaTecnica.css">
    <title>Media T</title>
</head>

<body class="overflow">
    <!-- <?php require_once("app/views/assets/inc/header.php") ?> -->
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
    <!-- header -->
    <header class="header">
        <div class="menu">
            <!-- logo -->
            <div class="logo"><img src="../assets/img/logo.png" alt=""></div>

            <nav class="nav">
                <ul class="menu-list">
                    <li class="link"><a href="index.php" class="menu-link">Inicio</a></li>
                    <li class="link"><a href="index.php" class="menu-link">Historia</a></li>

                    <li class="link liHover"><a href="index.php" class="menu-link">Media técnicas<i
                                class="fa-solid fa-chevron-right derecha"></i></a>
                        <ul class="ulHijo">
                            <li class="link liHijo"><a href="./app/views/user/construccion-view.html" class="menu-link">Construcción</a></li>
                            <li class="link liHijo"><a href="./app/views/user/fitnes-view.html" class="menu-link">Fitness</a></li>
                            <li class="link liHijo"><a href="./app/views/user/eventos-view.html" class="menu-link">Eventos</a></li>
                            <li class="link liHijo"><a href="./app/views/user/recursos-view.html" class="menu-link">Recursos</a></li>
                            <li class="link liHijo"><a href="./app/views/user/electronica-view.html" class="menu-link">Electrónica</a></li>
                            <li class="link liHijo"><a href="./app/views/user/software-view.html" class="menu-link">Software</a></li>
                            <li class="link liHijo"><a href="./app/views/user/patronaje-view.html" class="menu-link">Patronaje</a></li>
                            <li class="link liHijo"><a href="./app/views/user/academico-view.html" class="menu-link">Académico</a></li>
                        </ul>
                    </li>

                    <li class="link"><a href="index.php" class="menu-link">Quiz</a></li>
                    <li class="link"><a href="index.php" class="menu-link">Contáctenos</a></li>

                </ul>
                <!-- botones de Registrarse -->
                <div class="botones">
                    <span class="iniciar1">Iniciar Sesión</span>
                    <span class="iniciar">Registrarse</span>
                </div>
            </nav>
            <!-- boton animado -->
            <button class="btnAnimado">
                <span class="l1 span"></span>
                <span class="l2 span"></span>
                <span class="l3 span"></span>
            </button>
        </div>
    </header>

    <main class="main container ">
       
       
        <!-- Contenedor de la historia  -->
         <div class="textoSlogan">
        <h2 class="h2Slogan-Historia">Descubre nuestra historia</h2>
         </div>

        <div class="contenedor-Historia">

            <div class="contendor-item animacion">
                <div class="img-item">
                    <img src=" ../assets/img/user/servicio/1.png" alt="">
                </div>
                <div class="texto-item">
                    <h3 class="h3Item">(no se de momento)</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate dolore natus velit laborum dolorum aliquam consequatur omnis ullam molestiae sint! Placeat soluta voluptas commodi odit modi officia iure molestias ut.</p>
                </div>
            </div>

            <div class="contendor-item si animacion">
                <div class="img-item">
                    <img src=" ../assets/img/user/servicio/1.png " alt="">
                </div>
                <div class="texto-item  ">

                 <p>Loreknkkkkm ipsum dolor sit amet consectetur adipisicing elit. Voluptas aperiam sint eum consequatur maxime sit ipsum debitis aliquam veniam doloribus minus culpa, placeat harum maiores beatae assumenda ex delectus enim.</p>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas aperiam sint eum consequatur maxime sit ipsum debitis aliquam veniam doloribus minus culpa, placeat harum maiores beatae assumenda ex delectus enim.</p>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas aperiam sint eum consequatur maxime sit ipsum debitis aliquam veniam doloribus minus culpa, placeat harum maiores beatae assumenda ex delectus enim.</p>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas aperiam sint eum consequatur maxime sit ipsum debitis aliquam veniam doloribus minus culpa, placeat harum maiores beatae assumenda ex delectus enim.</p>

                

                </div>
            </div>

            
           

        </div>

    </main>
    
     

        </div>
    </section>

   


    <!-- Footer -->
    <footer class="pie_pagina">
        <div class="container">
            <div class="pie">
                <div class="pie_links">
                    <h4>Compañia</h4>
                    <ul>
                        <li><a href="#">Nosotros</a></li>
                        <li><a href="#">Nuestros servicios</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="pie_links">
                    <h4>Ayuda</h4>
                    <ul>
                        <li><a href="#">Preguntas frecuentes</a></li>
                        <li><a href="#">Soporte</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                        <li><a href="#">Política de privacidad</a></li>
                    </ul>
                </div>
                <div class="pie_links">
                    <h4>Recursos</h4>
                    <ul>
                        <li><a href="#">Documentación</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Guías</a></li>
                        <li><a href="#">Foro</a></li>
                    </ul>
                </div>
                <div class="pie_links">
                    <h4>Síguenos</h4>
                    <div class="social-link">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <div class="derechos">
        <p>© MediaT. Todos los derechos reservados</p>
    </div>

</body>
<script defer src="../assets/js/user/header.js"></script>
<script defer src="../assets/js/user/mediaTecnica.js"></script>

</html>