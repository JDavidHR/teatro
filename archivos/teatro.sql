-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 20:19:23
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teatro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(11) NOT NULL,
  `cedula` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `Genero_id` int(11) NOT NULL,
  `Tipo_papel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `cedula`, `nombre`, `fecha_nacimiento`, `Genero_id`, `Tipo_papel_id`) VALUES
(1, '1006318241', 'Luis Eduardo', '1973-04-16', 1, 1),
(2, '1006741852', 'Juan Miguel', '1996-11-10', 1, 2),
(3, '1010951753', 'Benito Velez', '1919-11-02', 1, 1),
(4, '325124590', 'Ellen Page', '1989-09-08', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL COMMENT 'Identificador del administrador',
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombres del administrador',
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellidos del administrador',
  `numero_documento` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Numero del documento',
  `password` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombres`, `apellidos`, `numero_documento`, `password`, `tipo_usuario_id`, `estado`) VALUES
(1, 'Natalia', 'Agudelo Valdes', '1006318241', '123456', 1, 1),
(2, 'Juan David', 'Hoyos Ramirez', '1006291396', '123456', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `nombre`) VALUES
(1, 'William Shakespeare'),
(2, 'Federico García Lorca'),
(3, 'Fernando De Rojas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cedula` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Funciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `cedula`, `Nombre`, `Fecha_nacimiento`, `Funciones_id`) VALUES
(1, '1006123768', 'Natalia Agudelo', '2000-03-08', 2),
(2, '1006291367', 'Juan David Hoyos', '2000-06-09', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `cedula` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Universidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id`, `cedula`, `nombre`, `Universidad_id`) VALUES
(1, '31419590', 'Luis Fernando', 1),
(2, '31789456', 'Pedro Morales', 2),
(3, '36156492', 'Martha Cuña', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `Teatro_id` int(11) NOT NULL,
  `Tipo_funcion_id` int(11) NOT NULL,
  `Tipo_cliente_id` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id`, `fecha_hora`, `Teatro_id`, `Tipo_funcion_id`, `Tipo_cliente_id`, `precio`) VALUES
(1, '2019-09-26 09:27:00', 1, 1, 2, 10000),
(2, '2019-03-08 17:00:00', 2, 2, 2, 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `horario` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `horario`) VALUES
(1, 'Diurno'),
(2, 'Nocturno'),
(3, 'Sabatino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL,
  `nit` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Funciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id`, `nit`, `Nombre`, `Funciones_id`) VALUES
(1, '2478', 'GABO', 1),
(2, '1068', 'Academico', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Autor_id` int(11) NOT NULL,
  `Tipo_obra_id` int(11) NOT NULL,
  `Director_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`id`, `nombre`, `Autor_id`, `Tipo_obra_id`, `Director_id`, `estado`) VALUES
(1, 'Romeo y Julieta', 1, 2, 1, 1),
(2, 'Sueño de una noche de verano', 1, 1, 2, 1),
(6, 'La casa de Bernarda Alba', 2, 5, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra_x_personajes`
--

CREATE TABLE `obra_x_personajes` (
  `Obra_id` int(11) NOT NULL,
  `Personajes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `obra_x_personajes`
--

INSERT INTO `obra_x_personajes` (`Obra_id`, `Personajes_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Actores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `descripcion`, `Actores_id`) VALUES
(1, 'Romeo', 'Personaje principal', 1),
(2, 'Julieta', 'Personaje principal', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reemplazos`
--

CREATE TABLE `reemplazos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Actores_id` int(11) NOT NULL,
  `Funciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reemplazos`
--

INSERT INTO `reemplazos` (`id`, `nombre`, `Actores_id`, `Funciones_id`) VALUES
(1, 'Antonio Gonzales', 2, 2),
(2, 'Allan Gimenes', 1, 1),
(3, 'Daniel Arias', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teatro`
--

CREATE TABLE `teatro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `paginaWeb` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_teatro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `teatro`
--

INSERT INTO `teatro` (`id`, `nombre`, `direccion`, `telefono`, `email`, `paginaWeb`, `Tipo_teatro_id`) VALUES
(1, 'San Jorge', 'Cra 12 #15-07', 2112415, 'ejemplo@hotmail.com', 'SanJorge.com', 1),
(2, 'De la Luz', 'Calle 10 #01-68', 2091678, 'teatro@hotmail.com', 'DelaLuz.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `id` int(11) NOT NULL,
  `Teatro_id` int(11) NOT NULL,
  `Horario_id` int(11) NOT NULL,
  `Obra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`id`, `Teatro_id`, `Horario_id`, `Obra_id`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id`, `Nombre`) VALUES
(1, 'Corriente'),
(2, 'Institucion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_funcion`
--

CREATE TABLE `tipo_funcion` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_funcion`
--

INSERT INTO `tipo_funcion` (`id`, `Nombre`) VALUES
(1, 'Benefica'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_obra`
--

CREATE TABLE `tipo_obra` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_obra`
--

INSERT INTO `tipo_obra` (`id`, `nombre`) VALUES
(1, 'Comedia'),
(2, 'Tragedia'),
(3, 'Teatro absurdo'),
(4, 'Romance'),
(5, 'Suspenso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_papel`
--

CREATE TABLE `tipo_papel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_papel`
--

INSERT INTO `tipo_papel` (`id`, `nombre`) VALUES
(1, 'Heroe'),
(2, 'Villano'),
(3, 'Martir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_teatro`
--

CREATE TABLE `tipo_teatro` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_teatro`
--

INSERT INTO `tipo_teatro` (`id`, `tipo`) VALUES
(1, 'Estatal'),
(2, 'Privado'),
(3, 'Mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del tipo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id`, `nombre`) VALUES
(1, 'COTECNOVA'),
(2, 'UTP'),
(3, 'Javeriana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

CREATE TABLE `versiones` (
  `id` int(11) NOT NULL,
  `detalles` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_director_version` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `video_presentacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `valor_contrato` double NOT NULL,
  `Director_id` int(11) NOT NULL,
  `Obra_id` int(11) NOT NULL,
  `afiche` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id`, `detalles`, `fecha_director_version`, `fecha_inicio`, `fecha_fin`, `video_presentacion`, `valor_contrato`, `Director_id`, `Obra_id`, `afiche`) VALUES
(1, 'Mejores efectos', '2015-04-25', '2019-12-09', '2019-10-01', 'Muestra.avi', 25000000, 1, 1, 'presentacion.jpg'),
(2, 'Cambio ligero de trama', '2016-02-16', '2019-05-06', '2019-10-06', 'Trailer.mp4', 18000000, 2, 2, 'afiche.png'),
(3, 'Escenarios distintos', '2018-07-08', '2019-08-10', '2019-10-14', 'Presentación.avi', 13000000, 3, 6, 'repartir.bmp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id`,`Genero_id`,`Tipo_papel_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Actores_Genero1_idx` (`Genero_id`),
  ADD KEY `fk_Actores_Tipo_papel1_idx` (`Tipo_papel_id`);

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`,`tipo_usuario_id`) USING BTREE,
  ADD KEY `fk_tipo_usuario_id` (`tipo_usuario_id`) USING BTREE;

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`,`Funciones_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Clientes_Funciones1_idx` (`Funciones_id`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`,`Universidad_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Director_Universidad1_idx` (`Universidad_id`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id`,`Teatro_id`,`Tipo_funcion_id`,`Tipo_cliente_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Funciones_Teatro1_idx` (`Teatro_id`),
  ADD KEY `fk_Funciones_Tipo_funcion1_idx` (`Tipo_funcion_id`),
  ADD KEY `fk_Funciones_Tipo_cliente1_idx` (`Tipo_cliente_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idHorario_UNIQUE` (`id`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`,`Funciones_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Instituciones_Funciones1_idx` (`Funciones_id`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id`,`Autor_id`,`Tipo_obra_id`,`Director_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Obra_Autor1_idx` (`Autor_id`),
  ADD KEY `fk_Obra_Tipo_obra1_idx` (`Tipo_obra_id`),
  ADD KEY `fk_Obra_Director1_idx` (`Director_id`);

--
-- Indices de la tabla `obra_x_personajes`
--
ALTER TABLE `obra_x_personajes`
  ADD PRIMARY KEY (`Obra_id`,`Personajes_id`),
  ADD KEY `fk_Obra_has_Personajes_Personajes1_idx` (`Personajes_id`),
  ADD KEY `fk_Obra_has_Personajes_Obra1_idx` (`Obra_id`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`,`Actores_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Personajes_Actores1_idx` (`Actores_id`);

--
-- Indices de la tabla `reemplazos`
--
ALTER TABLE `reemplazos`
  ADD PRIMARY KEY (`id`,`Actores_id`,`Funciones_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Reemplazos_Actores1_idx` (`Actores_id`),
  ADD KEY `fk_Reemplazos_Funciones1_idx` (`Funciones_id`);

--
-- Indices de la tabla `teatro`
--
ALTER TABLE `teatro`
  ADD PRIMARY KEY (`id`,`Tipo_teatro_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Teatro_Tipo_teatro_idx` (`Tipo_teatro_id`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`id`,`Teatro_id`,`Horario_id`,`Obra_id`),
  ADD UNIQUE KEY `idTemporada_UNIQUE` (`id`),
  ADD KEY `fk_Temporada_Teatro1_idx` (`Teatro_id`),
  ADD KEY `fk_Temporada_Horario1_idx` (`Horario_id`),
  ADD KEY `fk_Temporada_Obra1_idx` (`Obra_id`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `tipo_funcion`
--
ALTER TABLE `tipo_funcion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `tipo_obra`
--
ALTER TABLE `tipo_obra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `tipo_papel`
--
ALTER TABLE `tipo_papel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `tipo_teatro`
--
ALTER TABLE `tipo_teatro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD PRIMARY KEY (`id`,`Director_id`,`Obra_id`) USING BTREE,
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_Versiones_Director1_idx` (`Director_id`),
  ADD KEY `fk_Versiones_Obra1_idx` (`Obra_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reemplazos`
--
ALTER TABLE `reemplazos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `teatro`
--
ALTER TABLE `teatro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_funcion`
--
ALTER TABLE `tipo_funcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_obra`
--
ALTER TABLE `tipo_obra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_papel`
--
ALTER TABLE `tipo_papel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `versiones`
--
ALTER TABLE `versiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actores`
--
ALTER TABLE `actores`
  ADD CONSTRAINT `fk_Actores_Genero1` FOREIGN KEY (`Genero_id`) REFERENCES `genero` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Actores_Tipo_papel1` FOREIGN KEY (`Tipo_papel_id`) REFERENCES `tipo_papel` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_Clientes_Funciones1` FOREIGN KEY (`Funciones_id`) REFERENCES `funciones` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `fk_Director_Universidad1` FOREIGN KEY (`Universidad_id`) REFERENCES `universidad` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `fk_Funciones_Teatro1` FOREIGN KEY (`Teatro_id`) REFERENCES `teatro` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Funciones_Tipo_cliente1` FOREIGN KEY (`Tipo_cliente_id`) REFERENCES `tipo_cliente` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Funciones_Tipo_funcion1` FOREIGN KEY (`Tipo_funcion_id`) REFERENCES `tipo_funcion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD CONSTRAINT `fk_Instituciones_Funciones1` FOREIGN KEY (`Funciones_id`) REFERENCES `funciones` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `fk_Obra_Autor1` FOREIGN KEY (`Autor_id`) REFERENCES `autor` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Obra_Director1` FOREIGN KEY (`Director_id`) REFERENCES `director` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Obra_Tipo_obra1` FOREIGN KEY (`Tipo_obra_id`) REFERENCES `tipo_obra` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `obra_x_personajes`
--
ALTER TABLE `obra_x_personajes`
  ADD CONSTRAINT `fk_Obra_has_Personajes_Obra1` FOREIGN KEY (`Obra_id`) REFERENCES `obra` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Obra_has_Personajes_Personajes1` FOREIGN KEY (`Personajes_id`) REFERENCES `personajes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD CONSTRAINT `fk_Personajes_Actores1` FOREIGN KEY (`Actores_id`) REFERENCES `actores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reemplazos`
--
ALTER TABLE `reemplazos`
  ADD CONSTRAINT `fk_Reemplazos_Actores1` FOREIGN KEY (`Actores_id`) REFERENCES `actores` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Reemplazos_Funciones1` FOREIGN KEY (`Funciones_id`) REFERENCES `funciones` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `teatro`
--
ALTER TABLE `teatro`
  ADD CONSTRAINT `fk_Teatro_Tipo_teatro` FOREIGN KEY (`Tipo_teatro_id`) REFERENCES `tipo_teatro` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD CONSTRAINT `fk_Temporada_Horario1` FOREIGN KEY (`Horario_id`) REFERENCES `horario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Temporada_Obra1` FOREIGN KEY (`Obra_id`) REFERENCES `obra` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Temporada_Teatro1` FOREIGN KEY (`Teatro_id`) REFERENCES `teatro` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD CONSTRAINT `versiones_ibfk_1` FOREIGN KEY (`Obra_id`) REFERENCES `obra` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `versiones_ibfk_2` FOREIGN KEY (`Director_id`) REFERENCES `director` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
