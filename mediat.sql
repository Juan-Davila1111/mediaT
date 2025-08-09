-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2024 a las 06:21:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mediat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizaciones`
--

CREATE TABLE `actualizaciones` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actualizaciones`
--

INSERT INTO `actualizaciones` (`id`, `usuario`, `texto`, `img`) VALUES
(1, 'mediat123', 'Modificó una nueva preguna del quizz', 'Keiner_441111.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `visitas` int(11) DEFAULT 1,
  `ultima_visita` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `ip`, `visitas`, `ultima_visita`) VALUES
(1, '::1', 4, '2024-09-18 04:20:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `tema` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `opcion_a` text NOT NULL,
  `opcion_b` text NOT NULL,
  `opcion_c` text NOT NULL,
  `correcta` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `tema`, `pregunta`, `opcion_a`, `opcion_b`, `opcion_c`, `correcta`) VALUES
(1, 1, 'La definición de algoritmo es...', 'Un tipo de código informático para aprender', 'Una secuencia de instrucciones que representan un modelo de solución para determinado tipo de problemas, incluyendo todos los pasos necesarios.', 'Un lenguaje de programación', 'B'),
(2, 1, '¿Qué es C++?', 'Un juego', 'Un programa', 'Un lenguaje de programación', 'C'),
(3, 1, '¿Qué es una variable?', 'Un valor o dato', 'Un espacio dentro del espacio de memoria ram', 'Un lenguaje', 'B'),
(4, 1, 'En javascript, la sentencia for sirve para', 'Repetir la ejecución de instrucciones', 'Cargar datos en un arreglo', 'Ninguna de las anteriores', 'A'),
(5, 1, 'En un lenguaje de programación las constantes son...', 'Datos que varían', 'Datos regulares', 'Datos que no cambian en el proceso', 'C'),
(6, 1, 'Un diagrama de flujo es ...', 'la forma de resolver un problema', 'La representación gráfica de un problema', 'El proceso de diseño de un algoritmo', 'B'),
(7, 1, '¿Qué tipo de dato es el ejemplo A=5?', 'char', 'integer', 'string', 'B'),
(8, 1, '¿Para qué sirve los lenguajes de programación de tipo general?', 'Crear y facilitar datos', 'Crear diferentes mecanismos', 'Crear distintos tipos de aplicaciones', 'C'),
(9, 1, 'El número en binario 1010 corresponde', '10 en decimal', '8 en decimal', '7 en decimal', 'A'),
(10, 1, 'Un &quot;array&quot; es...', 'Un tipo de dato estructurado que almacena datos, del mismo tipo y relacionados.', 'Una estructura que me permite repetir instrucciones la cantidad de veces que quiera', 'Ninguna de las anteriores', 'A'),
(11, 2, '¿Con qué nombre se conoce el escándalo que obligó al presidente estadounidense Richard Nixon a dimitir?', 'Vietnam', 'NixonPrecess', 'Watergate', 'C'),
(12, 2, '¿Qué emperador romano legalizó el cristianismo y puso fin a la persecución de los cristianos?', 'Nerón', 'Constanstino', 'Adriano', 'B'),
(13, 2, '¿Qué hito informático de 1969 cambiaría radicalmente el curso de la historia de la humanidad?', 'El primer router wi-fi', 'La primera computadora personal', 'Internet', 'C'),
(14, 2, '¿Quién fue el primer Presidente de Estados Unidos?', 'George Washington', 'Abraham Lincoln', 'Andrew Jackson', 'A'),
(15, 2, '¿Por qué es significativo el Poema de Gilgamesh?', 'Fue un libro de estrategia militar de 500 páginas que sirvió en la antigua Mesopotamia', 'Es la primera obra épica que hace referencia a la inmortalidad y la percepción humana del alma', 'El tratado más antiguo que existe sobre el Inframundo.', 'B'),
(16, 2, '¿Cuál es el nombre de la famosa batalla donde Napoleón Bonaparte fue derrotado?', 'La batalla de Hstings', 'La batalla de Álamo', 'La batalla de Waterloo', 'C'),
(17, 2, '¿A través de qué río africano se alzó el antiguo Egipto?', 'Amazonas', 'Tigris', 'Nilo', 'C'),
(18, 2, '¿A qué filósofo griego se atribuye la famosa obra “La República”?', 'Platón', 'Sócrates', 'Aristótleles', 'A'),
(19, 2, '¿En qué año se disolvió la Unión Soviética?', 'En 1987', 'En 1989', 'En 1991', 'C'),
(20, 2, '¿Qué científico es considerado el Padre de la Bomba Atómica?', 'Albert Einsein', 'Robert Openheimer', 'Leó Szilárd', 'B'),
(21, 3, '¿Qué contienen los cloroplastos de las células vegetales?', 'Clorofila', 'Agua', 'Sábila', 'A'),
(22, 3, '¿Qué es la malacología?', 'La ciencia que estudia los hongos', 'La ciencia que estudia los molusculos', 'La ciencia que estudia los ácaros', 'B'),
(23, 3, '¿Qué significan las siglas ADN?', ' Ácido deoxinucleico', 'Ácido desorribonucleico', 'Ácido desoxirribonucleico', 'C'),
(24, 3, 'Todos los organismos en el reino Animalia son:', 'Multicelulares y autótrofos', 'Multicelulares y autótrofos', 'Unicelulares y heterótrofos', 'B'),
(25, 3, '¿Qué es un cardumen?', 'Una especie de planta', 'Un banco de peces', 'Una parte del abdomen de los insectos', 'B'),
(26, 3, 'El sistema de clasificación taxonómica actual fue ideado por:', 'Darwin', 'Pateur', 'Linneo', 'B'),
(27, 3, '¿Cuál de los siguientes animales tiene incisivos que continúan creciendo toda su vida?', 'Morsa', 'Hámster', 'Elefante', 'B'),
(28, 3, '¿Cuánto vive un erizo?', 'Aproximadamente entre 4 y 5 años', 'Aproximadamente entre 7 y 8 años', 'Aproximadamente entre 9 y 12 años', 'A'),
(29, 3, '¿Dónde realizan las plantas la fotosíntesis?', 'En las hojas', 'En la raíz', 'En el aire', 'A'),
(30, 3, '¿Qué músculo impulsa la sangre por todo nuestro cuerpo?', 'El cerebro', 'Los pulmones', 'El corazón', 'C'),
(32, 4, 'En natación, ¿cuánto mide de largo una piscina de competición para olimpiadas y mundiales?', '50 metros', '25 metros', '30 metros', 'A'),
(33, 4, '¿Con cuántos jugadores en pista juega un equipo de voleibol?', '5', '9', '6', 'C'),
(34, 4, '¿Cómo se llama en golf cuando completas un hoyo en un lanzamiento menos que el par del hoyo?', 'Albatros', 'Birdie', 'Eagle', 'B'),
(35, 4, 'Las tres modalidades de la esgrima son: sable, espada y ...', 'Estoque', 'Florete', 'Estilo lbre', 'B'),
(36, 4, '¿Cómo se llama en béisbol cuando un bateador golpea la bola y ésta sale del campo de juego, lo que le permite recorrer todas las bases con facilidad?', 'Strike', 'Hit', 'Home run', 'C'),
(37, 4, '¿A qué distancia está el punto de penalty de la portería en fútbol?', '7 metros', '11 metros', '12 metros', 'B'),
(38, 4, 'Completa esta frase de baloncesto: &quot;El arbitro pitó _____ segundos en la zona y el equipo local perdió el balón&quot;', 'Cinco', 'Venticuatro', 'Tres', 'C'),
(39, 4, 'Si hablamos del jugador boya, estamos hablando de...', 'Boleibol', 'Hockey sobre patines', 'Waterpolo', 'C'),
(40, 4, '¿Cómo se llama en rugby la lucha frente a frente de dos grupos de jugadores de los dos equipos que empujan para obtener el balón sin tocarlo con la mano?', 'Placaje', 'Melé', 'Ensayo', 'B'),
(41, 5, 'Un poco de historia. ¿Qué sabio griego creía que la única ley básica que gobernaba el universo era el principio del cambio y que nada permanecía en el mismo estado indefinidamente?', 'Tales de Mileto', 'Heráclito', 'Aristóteles', 'B'),
(42, 5, 'El método científico se usa en todas las ciencias, incluidas la física y la psicología.', 'Verdadero', 'Falso, en física no', 'Ninguna de las anteriores', 'A'),
(43, 5, '¿Cómo se llama el instrumento que mide y registra la humedad relativa del aire?', 'Barómetro', 'Hidrómetro', 'Higrómetro', 'C'),
(44, 5, 'Todo cuerpo que cae libremente en el vacío se caracteriza por tener...', 'Aceleración constante y velocidad variable', 'Fuerza variable y velocidad decreciente', 'Energía potencial constante y aceleración creciente', 'B'),
(45, 5, 'Hablando de fuerzas... ¿cuál es la que mantiene unidas las moléculas de un cuerpo?', 'La fuerza de gravedad', 'La fuerza de cohesión', 'La fuerza de adhesión', 'B'),
(46, 5, '¿Cuál es la distancia más pequeña posible en mecánica cuántica?', 'Tiempo de Wearden', 'Espuma cuántica', 'Longitud de Planck', 'C'),
(47, 5, '¿Qué dos partículas elementales se describen como &lt;sin masa&gt;?', 'Fotón y gluón', ' Muón y neutrino', 'Electrón y protón', 'A'),
(48, 5, '¿Cuál de estos fenómenos inspiró a Albert Einstein en su desarrollo de la relatividad general?', 'Ver a dos trenes moverse en direcciones opuestas', 'Ver a un hombre caerse de un tejado', 'La vibración de las cuerdas en un violín', 'B'),
(49, 5, '¿El tiempo va siempre hacia adelante?', 'Siempre', 'No', 'En teoría...sí', 'C'),
(50, 5, '¿Qué es la hidrostática?', 'Cantidad de masa encerrada en un volumen', 'Presión de los líquidos a todas las direcciones', 'Cuerpo de masa que crece de una forma', 'B'),
(51, 7, 'Originario del Oriente Medio, el falafel es una de las comidas callejeras favoritas de todo el mundo. ¿Cuál es el ingrediente principal del falafel?', 'Las semillas de sésamo', 'La harina', 'Los garbanzos', 'C'),
(52, 7, 'Las arepas son pasteles de maíz a menudo rellenos con ingredientes como queso, verduras y carne. ¿Qué 2 países dicen haber inventado este delicioso plato?', 'Colombia y Venezuela', 'Venezuela y Argentina', 'Chile y Colombia', 'A'),
(53, 7, 'La comida callejera más popular del Perú, y éxito de exportación culinaria, es sin duda el ceviche. En este plato, ¿el pescado crudo se cura agregándole qué ingrediente?', 'Vinagre', 'Zumos cítricos', 'Aceite caliente', 'B'),
(54, 7, '¿En qué país se considera de mala educación comer mientras se camina (con algunas excepciones)?', 'Italia', 'China', 'Japón', 'C'),
(55, 7, 'En Italia, ¿los arancini son unas albóndigas fritas de qué?', 'Espaguetis', 'Risotto', 'Aceitunas', 'B'),
(56, 7, '¿En qué país se considera de mala educación comer mientras se camina (con algunas excepciones)?', 'Italia', 'China', 'Japón', 'C'),
(57, 7, 'Un buen mate se prepara con el agua...', 'A 80 grados', 'Hirviendo', 'Tibia', 'A'),
(58, 7, '¿Qué otro país nos disputa la invención del argentinísimo dulce de leche?', 'Chile', 'Brasil', 'Uruguay', 'C'),
(59, 7, 'Una milanesa con jamón, queso y salsa de tomate se llama...', 'Milanesa siciliana', 'Milanesa napolitana', 'Milanesa maradoniana', 'B'),
(60, 7, '¿Cuáles son los ingredientes más comunes de toda empanada de carne?', 'Carne picada, huevos, cebollas y aceitunas', 'Carne picada, huevos, tomate y aceitunas', 'Carne picada, huevos, uva y choclo', 'A'),
(63, 4, 'cyanti es ewjdhefhf', 'rrrrrrrrrrrrrrrrrrrrrrrr', 'rttttttttttttttttttttttttttttt', 'ttttgfggggggggggggg', 'B'),
(69, 8, '¿Quién pintó \"La noche estrellada\"?', 'Pablo Picasso', 'Vincent van Gogh', 'Claude Monet', 'B'),
(70, 8, '¿Qué movimiento artístico es conocido por su uso de formas geométricas y colores brillantes, y fue desarrollado por Pablo Picasso y Georges Braque?', 'Impresionismo', 'Cubismo', 'Surrealismo', 'B'),
(71, 8, '¿Cuál es el nombre de la famosa ópera compuesta por Wolfgang Amadeus Mozart que cuenta la historia de Don Giovanni?', 'La flauta mágica', 'Las bodas de Fígaro', 'Don Giovanni', 'C'),
(72, 8, '¿Cuál es el país de origen de la pizza?', 'Francia', 'Italia', 'España', 'B'),
(73, 8, '¿Quién escribió \"Cien años de soledad\"?', 'Gabriel García Márquez', 'Mario Vargas Llosa', 'Julio Cortázar', 'A'),
(74, 8, '¿En qué año se realizó el primer viaje a la Luna?', '1965', '1969', '1972', 'B'),
(75, 8, '¿Cuál es el símbolo químico del oro?', 'Au', 'Ag', 'Fe', 'A'),
(76, 8, '¿Qué continente es el hogar de los pingüinos?', 'África', 'Asia', 'Antártida', 'C'),
(77, 8, '¿Quién es conocido como el \"padre de la teoría de la relatividad\"?', 'Isaac Newton', 'Albert Einstein', 'Niels Bohr', 'B'),
(78, 8, '¿Cuál es el río más largo del mundo?', 'Nilo', 'Amazonas', 'Yangtsé', 'B'),
(79, 9, '¿Quién es conocido como el \"padre de la economía moderna\"?', 'Adam Smith', 'John Maynard Keynes', 'Milton Friedman', 'A'),
(80, 9, '¿Qué es el PIB?', 'Producto Interno Bruto', 'Punto de Interés Bancario', 'Participación Internacional Bursátil', 'A'),
(81, 9, '¿Cuál de los siguientes es un indicador adelantado en economía?', 'Tasa de desempleo', 'Índice de precios al consumidor', 'Permisos de construcción', 'C'),
(82, 9, '¿Qué teoría económica defiende la intervención mínima del gobierno en la economía?', 'Keynesianismo', 'Neoclásico', 'Liberalismo económico', 'C'),
(83, 9, '¿Qué es la inflación?', 'Aumento en el nivel general de precios', 'Disminución del producto interno bruto', 'Aumento en la tasa de interés', 'A'),
(84, 9, '¿Qué organismo internacional se encarga de promover la cooperación monetaria global?', 'Fondo Monetario Internacional (FMI)', 'Banco Mundial', 'Banco Central Europeo', 'A'),
(85, 9, '¿Qué tipo de mercado es el que se encuentra en equilibrio donde la oferta y la demanda se cruzan?', 'Mercado de competencia perfecta', 'Mercado de monopolio', 'Mercado oligopólico', 'A'),
(86, 9, '¿Qué es la curva de Phillips?', 'Relación entre inflación y desempleo', 'Gráfico de oferta y demanda', 'Curva de crecimiento económico', 'A'),
(87, 9, '¿Qué es la política monetaria expansiva?', 'Reducción de tasas de interés para estimular la economía', 'Aumento de tasas de interés para controlar la inflación', 'Política fiscal para reducir el déficit', 'A'),
(88, 9, '¿Cuál es el objetivo principal del Banco Mundial?', 'Reducir la pobreza y apoyar el desarrollo económico', 'Regular el mercado de divisas', 'Controlar la inflación global', 'A'),
(89, 10, '¿Cuál es el órgano principal del sistema respiratorio?', 'Corazón', 'Estómago', 'Pulmón', 'C'),
(90, 10, '¿Qué vitamina es esencial para la coagulación sanguínea?', 'Vitamina C', 'Vitamina D', 'Vitamina K', 'C'),
(91, 10, '¿Cuál es el nombre de la enfermedad caracterizada por la falta de insulina?', 'Diabetes tipo 1', 'Hipertensión', 'Asma', 'A'),
(92, 10, '¿Qué estructura en el cuerpo humano produce la insulina?', 'Hígado', 'Páncreas', 'Riñón', 'B'),
(93, 10, '¿Qué tipo de célula es responsable de la defensa inmune en el cuerpo?', 'Neurona', 'Eritrocito', 'Linfocito', 'C'),
(94, 10, '¿Cuál es el nombre de la glándula que regula el metabolismo?', 'Glándula pituitaria', 'Glándula tiroides', 'Glándula adrenal', 'B'),
(95, 10, '¿Qué tipo de tejido conecta los músculos con los huesos?', 'Tejido epitelial', 'Tejido conectivo', 'Tejido nervioso', 'B'),
(96, 10, '¿Qué prueba se utiliza comúnmente para detectar niveles de colesterol en la sangre?', 'Electrocardiograma', 'Radiografía', 'Perfil lipídico', 'C'),
(97, 10, '¿Cuál es el propósito principal de los antibióticos?', 'Eliminar células cancerosas', 'Combatir infecciones bacterianas', 'Reducir la inflamación', 'B'),
(98, 10, '¿Qué enfermedad es causada por una deficiencia de vitamina D?', 'Escorbuto', 'Raquitismo', 'Anemia', 'B'),
(100, 1, '¿Qué es un algoritmo?', 'Una serie de pasos para resolver un probelma', 'Una suma', 'Dato que se almacena en la memoria ram', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nombres` varchar(100) NOT NULL,
  `admin_correo` varchar(100) NOT NULL,
  `admin_usuario` varchar(50) NOT NULL,
  `admin_creado` varchar(30) NOT NULL,
  `admin_actualizado` varchar(30) NOT NULL,
  `admin_tipo` varchar(20) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nombres`, `admin_correo`, `admin_usuario`, `admin_creado`, `admin_actualizado`, `admin_tipo`, `admin_password`, `admin_foto`) VALUES
(1, 'MediaT', 'mediat2024k@gmail.com', 'mediat123', '2024-09-01 23:52:14', '2024-09-16 03:18:30', 'Superadministrador', '$2y$10$L5qbmlpiddjfla3ndgmrhOYW6DsbEUkGv/4E8eXXw9IAoli1M57XK', 'Keiner_441111.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactenos`
--

CREATE TABLE `tbl_contactenos` (
  `contac_id` int(11) NOT NULL,
  `contac_nombres` varchar(100) NOT NULL,
  `contac_correo` varchar(100) NOT NULL,
  `contac_telefono` varchar(20) NOT NULL,
  `contac_mensaje` text NOT NULL,
  `contac_enviado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_foros`
--

CREATE TABLE `tbl_foros` (
  `foro_id` int(11) NOT NULL,
  `foro_usuario` varchar(40) NOT NULL,
  `foro_publicado` varchar(50) NOT NULL,
  `foro_texto` text NOT NULL,
  `foro_foto` varchar(30) NOT NULL,
  `foro_tecnica` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_novedades`
--

CREATE TABLE `tbl_novedades` (
  `novedades_id` int(11) NOT NULL,
  `novedades_foto` varchar(100) NOT NULL,
  `novedades_titulo` varchar(50) NOT NULL,
  `novedades_texto` text NOT NULL,
  `novedades_tecnica` varchar(50) NOT NULL,
  `novedades_fecha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `usuario_nombres` varchar(80) NOT NULL,
  `usuario_usuario` varchar(50) NOT NULL,
  `usuario_correo` varchar(100) NOT NULL,
  `usuario_creado` varchar(100) NOT NULL,
  `usuario_actualizado` varchar(100) NOT NULL,
  `usuario_apellidos` varchar(50) NOT NULL,
  `usuario_password` varchar(200) NOT NULL,
  `usuario_foto` varchar(80) NOT NULL,
  `usuario_quiz` int(10) NOT NULL,
  `usuario_quiz_ganado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usuarios_id`, `usuario_nombres`, `usuario_usuario`, `usuario_correo`, `usuario_creado`, `usuario_actualizado`, `usuario_apellidos`, `usuario_password`, `usuario_foto`, `usuario_quiz`, `usuario_quiz_ganado`) VALUES
(23, 'Keiner Felipe', 'felipe12345', 'jaramillodiazkeinerfelipe14@gmail.com', '2024-09-17 23:00:05', '2024-09-17 23:01:03', 'Jaramillo Díaz', '$2y$10$1Aradn57HNpHSePDNkvRgeWi1DIN0.6SHpKoiHVWvJyARTzH/gLdm', 'juan_16.jpg', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `tema_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`tema_id`, `nombre`, `foto`) VALUES
(1, 'Programación', 'Programación_43.png'),
(2, 'Historia', 'Historia_18.png'),
(3, 'Biología', 'Biología_10.png'),
(4, 'Deporte', 'Deporte_7.png'),
(5, 'Física', 'Física_39.png'),
(6, 'Ingles', 'Ingles_48.png'),
(7, 'Comida', 'Comida_92.png'),
(8, 'Arte y cultura', 'Arte_y_cultura_66.png'),
(9, 'Economía', 'Economía_84.png'),
(10, 'Medicina', 'Medicina_2.png'),
(11, 'prueba', 'prueba_5.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizaciones`
--
ALTER TABLE `actualizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `tbl_contactenos`
--
ALTER TABLE `tbl_contactenos`
  ADD PRIMARY KEY (`contac_id`);

--
-- Indices de la tabla `tbl_foros`
--
ALTER TABLE `tbl_foros`
  ADD PRIMARY KEY (`foro_id`);

--
-- Indices de la tabla `tbl_novedades`
--
ALTER TABLE `tbl_novedades`
  ADD PRIMARY KEY (`novedades_id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`tema_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actualizaciones`
--
ALTER TABLE `actualizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contador`
--
ALTER TABLE `contador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_contactenos`
--
ALTER TABLE `tbl_contactenos`
  MODIFY `contac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_foros`
--
ALTER TABLE `tbl_foros`
  MODIFY `foro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_novedades`
--
ALTER TABLE `tbl_novedades`
  MODIFY `novedades_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `tema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
