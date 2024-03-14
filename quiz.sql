-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2024 a las 16:09:26
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
-- Base de datos: `quiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `campaña` varchar(30) DEFAULT NULL,
  `intentos` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`username`, `pass`, `nombre`, `cargo`, `campaña`, `intentos`) VALUES
('12', '123', 'prueba agentes movil', 'agente', 'Movil', 1),
('123', '123', 'prueba agentes hogar', 'agente', 'Hogar', 0),
('1234', '111', 'prueba staff', 'staff', 'Staff', 1),
('12345', '111', 'prueba admin', 'admin', 'Staff', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `opcion1` varchar(255) DEFAULT NULL,
  `opcion2` varchar(255) DEFAULT NULL,
  `opcion3` varchar(255) DEFAULT NULL,
  `opcion4` varchar(255) DEFAULT NULL,
  `opcion5` varchar(225) DEFAULT NULL,
  `respuesta` int(11) DEFAULT NULL,
  `campaña` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `opcion1`, `opcion2`, `opcion3`, `opcion4`, `opcion5`, `respuesta`, `campaña`) VALUES
(1, '¿Por qué herramientas se hacen los escalamientos para desbloque de documentos en móvil?', 'Visor', 'Poliedro', 'PEOG', 'Agendamiento', NULL, 3, 'Hogar'),
(2, '¿Qué tiempo de respuesta nos da VISOR para los escalamientos que se realizan por agendamiento?', '24 horas', '2 horas', 'sevillaInmediato', '4 días', NULL, 1, 'Hogar'),
(3, '¿Cuándo en RR nos aparece en el apartado de estrato lo siguiente “NR” a qué hace referencia?', 'No residencial', NULL, NULL, NULL, NULL, 1, 'Hogar'),
(4, '¿Cuántas líneas móviles pueden recibir le beneficio T.C.?', '6', NULL, NULL, NULL, NULL, 1, 'Hogar'),
(5, '¿Cuántas cuentas hogar pueden recibir el beneficio T.C.?', '2', NULL, NULL, NULL, NULL, 1, 'Hogar'),
(6, '¿Cuánto es el tiempo que da VISOR al momento de digitar una venta hogar en la validación de identidad?', '4 minutos', '2 minutos', '3 minutos', '24 horas', NULL, 3, 'Hogar'),
(7, '¿Qué beneficio incluye el paquete de Hot Pack?', '3 meses con el 50%', '6 meses con el 50% ', '1 mes con el 100% y 3 meses con el 50%', 'Ninguna de las anteriores', NULL, 1, 'Hogar'),
(8, '¿El internet Gamer solo se puede ofrecer en red HFC?', 'Verdadero', 'Falso', NULL, NULL, NULL, 1, 'Hogar'),
(9, '¿Cuál es el primer método de validación de identidad que se debe realizar a una venta de portabilidad con contrato leído?', 'Otp Interno', 'Preguntas poliedro', 'No se hace validación de identidad', 'Id_Vision', NULL, 3, 'Hogar'),
(10, '¿En la consulta de poliedro cuando sale tikler transfer es posible continuar con la venta?', 'Verdadero', 'Falso', NULL, NULL, NULL, 1, 'Hogar'),
(11, '¿En la consulta de poliedro cuando sale tikler plan par es posible continuar con la venta?', 'Verdadero', 'Falso', NULL, NULL, NULL, 2, 'Hogar'),
(12, 'Según la política de validación de identidad ¿cuánto es la vigencia de una validación para migración?', '10 días', '12 días', '15 días', NULL, NULL, 1, 'Movil'),
(13, '¿Qué vigencia tiene un NIP?', '15 días calendario', '24 horas calendario', '12 días calendario', NULL, NULL, 1, 'Movil'),
(14, '¿Cuáles son los tipos de multi asistencia que tenemos en Claro?', 'Oro', 'Plata', 'Bronce', 'Diamante', 'Todas las anteriores', 5, 'Movil'),
(15, '¿Qué significa AC?', 'Administración Clientes', 'Acceso Claro', 'Ninguna de las anteriores', NULL, NULL, 1, 'Movil'),
(16, 'Según la política de validación de identidad ¿Cuántas portabilidades puede tener un cliente bajo la misma cédula?', '6', '2', '4', NULL, NULL, 3, 'Movil'),
(17, '¿Qué horarios se manejan para las respuestas en el ABD?', 'Lunes-Sábado antes de las 2:50 p.m.', 'Lunes-Viernes antes de las 2:50 p.m', 'Todos los días de la semana antes de las 2:50 p.m.', NULL, NULL, 2, 'Movil'),
(18, '¿Si un cliente adquiere los servicios de hogar tiene derecho a los beneficio de la app de Claro Club?', 'Verdadero', 'Falso', NULL, NULL, NULL, 1, 'Movil'),
(19, '¿Si un cliente tiene el paquete de TV Digital Avanzada, y quiere tomar un deco Box Tv, es posible continuar con la venta?\r\n', 'Verdadero', 'Falso\r\n', NULL, NULL, NULL, 2, 'Movil'),
(20, '¿Según la PTAR 5128 NT, qué marcar deben ser los tv para las 3 pantallas que incluye Claro TV +?\r\n', 'LG', 'Samsung', 'Oppo ', 'No se puede', NULL, 4, 'Movil'),
(21, '¿Qué significan las siglas “NT”?\r\n', 'Nuevo transitorio', NULL, NULL, NULL, NULL, 1, 'Movil'),
(22, 'Qué significan las siglas “UET”?', 'Up grade nuevo transitorio', NULL, NULL, NULL, NULL, 1, 'Movil'),
(23, '¿Cuál es la capital de Colombia?', 'Bogotá', 'Medellín', 'Cali', 'Barranquilla', NULL, 1, 'Movil'),
(24, '¿Club con mas títulos de champions league?', 'Barcelona', 'AC Milán', 'Real Madrid', 'Bayern Múnich', NULL, 3, 'Hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `nombre` varchar(80) DEFAULT NULL,
  `correctas` int(11) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL,
  `fecha` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`nombre`, `correctas`, `porcentaje`, `fecha`) VALUES
('prueba admin', 3, NULL, '2024-03-08'),
('prueba admin', 5, 100, '2024-03-08'),
('prueba agentes', 1, 20, '2024-03-08'),
('prueba staff', 4, 80, '2024-03-08'),
('prueba agentes movil', 4, 80, '2024-03-09'),
('prueba admin', 4, 80, '2024-03-11'),
('prueba agentes hogar', 3, 60, '2024-03-11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
