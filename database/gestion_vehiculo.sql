-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2025 a las 23:10:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_vehiculo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actas_personal`
--

CREATE TABLE `actas_personal` (
  `ACP_Item` int(10) UNSIGNED NOT NULL,
  `ACP_FechaInicio` date NOT NULL,
  `ACP_FechaFin` date NOT NULL,
  `ACP_Documento` varchar(20) DEFAULT NULL,
  `PER_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `ALM_Id` int(10) UNSIGNED NOT NULL,
  `ALM_Nombre` varchar(50) NOT NULL,
  `ALM_Direccion` varchar(50) NOT NULL,
  `ALM_Ruc` varchar(12) DEFAULT NULL,
  `ALM_Celular` varchar(9) DEFAULT NULL,
  `ALM_Status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `ARE_Id` int(10) UNSIGNED NOT NULL,
  `ARE_Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`ARE_Id`, `ARE_Nombre`) VALUES
(1, 'GERENCIA GENERAL'),
(2, 'ADMINISTRACION'),
(3, 'LOGISTICA'),
(4, 'OPERACIONES'),
(5, 'RECURSOS HUMANOS'),
(6, 'SEGURIDAD Y SALUD EN EL TRABAJO'),
(7, 'MANTENIMIENTO'),
(8, 'INFORMATICA'),
(9, 'CONTABILIDAD Y FINANZAS'),
(10, 'TRANSPORTE'),
(11, 'SANEAMIENTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `ASI_Id` int(10) UNSIGNED NOT NULL,
  `ASI_MarcacionEntrada` datetime NOT NULL,
  `ASI_MarcacionSalidaIntermedia` datetime DEFAULT NULL,
  `ASI_MarcacionEntradaIntermedia` datetime DEFAULT NULL,
  `ASI_MarcacionSalida` datetime DEFAULT NULL,
  `PER_Id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE
  `cliente` (
    `CLI_Id` int (11) UNSIGNED NOT NULL,
    `CLI_TipoDocumento` varchar(5) NOT NULL,
    `CLI_NumDocumento` varchar(12) NOT NULL,
    `CLI_Nombre` varchar(150) NOT NULL,
    `CLI_Direccion` varchar(150) DEFAULT NULL,
    `CLI_Celular` varchar(12) DEFAULT NULL,
    `CLI_Correo` varchar(50) DEFAULT NULL,
    `CLI_Status` tinyint(1) NOT NULL DEFAULT 1,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

ALTER TABLE `cliente` ADD PRIMARY KEY (`CLI_Id`);

ALTER TABLE `cliente` MODIFY `CLI_Id` int (20) UNSIGNED NOT NULL AUTO_INCREMENT;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CAT_Id` int(10) UNSIGNED NOT NULL,
  `CAT_Nombre` varchar(20) DEFAULT NULL,
  `CLA_Id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CAT_Id`, `CAT_Nombre`, `CLA_Id`, `created_at`, `updated_at`) VALUES
(1, 'DONAS', 1, NULL, NULL),
(2, 'FRESI DULCE', 1, NULL, NULL),
(3, 'WAFFLES', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `CLA_Id` int(10) UNSIGNED NOT NULL,
  `CLA_Nombre` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`CLA_Id`, `CLA_Nombre`, `created_at`, `updated_at`) VALUES
(1, 'Postres', NULL, NULL),
(2, 'Agregados', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `COM_Id` int(10) UNSIGNED NOT NULL,
  `COM_TipoDocumento` varchar(50) NOT NULL,
  `COM_NumDocumento` varchar(12) NOT NULL,
  `COM_TipoPago` varchar(50) NOT NULL,
  `MEP_Id` int(10) UNSIGNED NOT NULL,
  `PROV_Id` int(10) UNSIGNED NOT NULL,
  `COM_Status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato_personal`
--

CREATE TABLE `contrato_personal` (
  `COP_Item` int(10) UNSIGNED NOT NULL,
  `ARE_Id` int(11) DEFAULT NULL,
  `PUE_Id` int(11) DEFAULT NULL,
  `COP_FechaInicio` date NOT NULL,
  `COP_FechaFin` date DEFAULT NULL,
  `COP_Sueldo` decimal(10,2) DEFAULT NULL,
  `COP_FechaFinEjecutada` date DEFAULT NULL,
  `COP_MotivoSalida` varchar(255) DEFAULT NULL,
  `PER_Id` int(11) NOT NULL,
  `COP_TipoContrato` varchar(20) DEFAULT NULL,
  `COP_Pension` varchar(20) DEFAULT NULL,
  `COP_TipoFondo` varchar(20) DEFAULT NULL,
  `COP_Contrato` varchar(40) DEFAULT NULL,
  `COP_ListaNegra` char(2) DEFAULT NULL,
  `SUB_Nombre` varchar(40) DEFAULT NULL,
  `COP_Categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `DCOM_Id` int(10) UNSIGNED NOT NULL,
  `COM_Id` int(10) UNSIGNED NOT NULL,
  `ALM_Id` int(10) UNSIGNED NOT NULL,
  `PRO_Id` int(10) UNSIGNED NOT NULL,
  `DCOM_Cantidad` int(11) NOT NULL,
  `DCOM_PrecioCompra` decimal(10,2) NOT NULL,
  `DCOM_PrecioVenta` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar_personal`
--

CREATE TABLE `familiar_personal` (
  `FAP_Item` int(10) UNSIGNED NOT NULL,
  `FAP_Parentesco` varchar(100) NOT NULL,
  `FAP_Nombre` varchar(100) NOT NULL,
  `FAP_Apellidos` varchar(20) NOT NULL,
  `FAP_Edad` varchar(20) NOT NULL,
  `FAP_DNI` varchar(20) NOT NULL,
  `FAP_FechaNacimiento` varchar(20) NOT NULL,
  `FAP_Direccion` varchar(250) NOT NULL,
  `FAP_Documento` varchar(20) DEFAULT NULL,
  `PER_Id` int(11) NOT NULL,
  `FAP_Ocupacion` varchar(80) DEFAULT NULL,
  `FAP_Sexo` varchar(20) DEFAULT NULL,
  `FAP_EstadoCivil` varchar(20) DEFAULT NULL,
  `FAP_DocumentoActa` varchar(20) DEFAULT NULL,
  `FAP_Celular` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `LOT_Id` int(10) UNSIGNED NOT NULL,
  `ALM_Id` int(10) UNSIGNED NOT NULL,
  `PRO_Id` int(10) UNSIGNED NOT NULL,
  `LOT_TipoIngreso` varchar(20) NOT NULL,
  `LOT_IdIngreso` int(10) UNSIGNED NOT NULL,
  `LOT_CantidadReal` decimal(10,2) UNSIGNED NOT NULL,
  `LOT_CantidadIngreso` decimal(10,0) UNSIGNED NOT NULL,
  `LOT_PrecioCompra` decimal(10,2) NOT NULL,
  `LOT_PrecioVenta` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `MEP_Id` int(10) UNSIGNED NOT NULL,
  `MEP_Pago` varchar(50) NOT NULL,
  `MEP_Status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_17_003058_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estadopermiso` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `estadopermiso`, `descripcion`, `nombre`) VALUES
(1, 'users.index', 'web', '2024-03-17 19:20:57', '2024-03-17 19:20:57', 1, 'Lista y navega todos los usuarios del sistema', 'USUARIO'),
(2, 'users.show', 'web', '2024-03-17 19:20:57', '2024-04-06 07:19:07', 1, 'Ver cualquier dato de un usuario', 'Visualización de detalles de usuario'),
(3, 'users.create', 'web', '2024-03-17 22:00:57', '2024-03-17 22:00:57', 1, 'Crear registro de usuario', 'Creación de usuarios'),
(4, 'users.edit', 'web', '2024-03-17 22:00:57', '2024-04-06 07:19:28', 1, 'Editar cualquier dato de un usuario', 'Edición de usuarios'),
(5, 'users.destroy', 'web', '2024-04-04 07:48:51', '2024-04-04 07:48:51', 1, 'Eliminar cualquier usuario', 'Eliminación de usuarios'),
(6, 'role.index', 'web', '2024-04-04 08:45:11', '2024-04-04 08:45:11', 1, 'Lista y navega todos los roles del sistema', 'ROLES'),
(7, 'role.show', 'web', '2024-04-05 00:48:07', '2024-04-06 05:58:31', 1, 'Ver cualquier dato de un rol', 'Ver Detalles de roles'),
(8, 'role.create', 'web', '2024-04-05 23:00:57', '2024-04-06 07:42:24', 1, 'Crear registro de rol', 'Creación de roles'),
(9, 'role.edit', 'web', '2024-04-06 08:20:38', '2024-04-06 08:20:38', 1, 'Editar algún dato de un rol', 'Edición de roles'),
(10, 'role.destroy', 'web', '2024-04-06 08:21:26', '2024-04-06 08:21:26', 1, 'Elimina un registro de rol', 'Eliminación de roles'),
(11, 'permiso.index', 'web', '2024-04-06 20:50:15', '2024-04-06 20:50:15', 1, 'Lista y navega todos los permisos del sistema', 'PERMISOS'),
(12, 'permiso.show', 'web', '2024-04-06 20:51:11', '2024-04-06 20:51:11', 1, 'Ver cualquier dato de un permiso', 'Visualización de detalles de permiso'),
(13, 'permiso.create', 'web', '2024-04-06 20:52:28', '2024-04-06 20:52:28', 1, 'Crear registro de permiso', 'Creación de permisos'),
(14, 'permiso.edit', 'web', '2024-04-06 20:53:45', '2024-04-06 20:53:45', 1, 'Editar algún dato de un permiso', 'Edición de permisos'),
(15, 'permiso.destroy', 'web', '2024-04-06 20:58:28', '2024-04-06 20:58:28', 1, 'Eliminar algun registro de permiso', 'Eliminación de permisos'),
(16, 'clase.index', 'web', '2025-01-10 02:14:24', '2025-01-10 02:14:24', 1, '-', 'CLASE'),
(17, 'clase.show', 'web', '2025-01-10 02:16:09', '2025-01-10 02:16:09', 1, '-', 'VER DETALLES'),
(18, 'clase.create', 'web', '2025-01-10 02:18:11', '2025-01-10 02:18:11', 1, '-', 'Creacion de clases'),
(19, 'clase.edit', 'web', '2025-01-10 02:18:33', '2025-01-10 02:18:33', 1, '-', 'Edicion de clases'),
(20, 'clase.destroy', 'web', '2025-01-10 02:19:05', '2025-01-10 02:19:05', 1, '-', 'Eliminacion de clases'),
(21, 'categoria.index', 'web', '2025-01-10 02:25:59', '2025-01-10 02:25:59', 1, '-', 'CATEGORIA'),
(22, 'categoria.show', 'web', '2025-01-10 02:26:43', '2025-01-10 02:26:43', 1, '-', 'Visualizacion de detalles de categoria'),
(23, 'categoria.create', 'web', '2025-01-10 02:27:11', '2025-01-10 02:27:11', 1, '-', 'Creacion de categoria'),
(24, 'categoria.edit', 'web', '2025-01-10 02:27:31', '2025-01-10 02:27:31', 1, '-', 'Edicion de categoria'),
(25, 'categoria.destroy', 'web', '2025-01-10 02:28:24', '2025-01-10 02:28:24', 1, '-', 'Eliminacion de categoria'),
(26, 'producto.index', 'web', '2025-01-10 02:28:41', '2025-01-10 15:48:37', 1, '-', 'PRODUCTO 3'),
(27, 'producto.show', 'web', '2025-01-10 02:29:25', '2025-01-10 02:29:25', 1, '-', 'Visualizacion de detalles de producto'),
(28, 'producto.create', 'web', '2025-01-10 02:29:43', '2025-01-10 02:29:43', 1, '-', 'Creacion de producto'),
(29, 'producto.edit', 'web', '2025-01-10 02:30:11', '2025-01-10 02:30:11', 1, '-', 'Edicion de producto'),
(30, 'producto.destroy', 'web', '2025-01-10 02:30:42', '2025-01-10 02:30:42', 1, '-', 'Eliminacion de producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `PER_Id` int(10) UNSIGNED NOT NULL,
  `PER_Nombre` varchar(50) NOT NULL,
  `PER_Apellido` varchar(50) NOT NULL,
  `PER_TipoDocumento` varchar(20) NOT NULL,
  `PER_NumeroDocumento` varchar(11) NOT NULL,
  `PER_FechaNacimiento` date DEFAULT NULL,
  `PER_Edad` int(11) NOT NULL,
  `PER_Sexo` varchar(20) NOT NULL,
  `PER_EstadoCivil` varchar(20) DEFAULT NULL,
  `PER_NumeroHijos` int(11) DEFAULT 0,
  `PER_Procedencia` varchar(150) DEFAULT NULL,
  `PER_Direccion` varchar(250) DEFAULT NULL,
  `PER_Referencia` varchar(255) DEFAULT NULL,
  `PER_Correo` varchar(100) DEFAULT NULL,
  `PER_Celular` char(12) DEFAULT NULL,
  `PER_Parenteso` varchar(20) DEFAULT NULL,
  `PER_PNombre` varchar(50) DEFAULT NULL,
  `PER_PCelular` char(12) DEFAULT NULL,
  `PER_PDireccion` varchar(80) DEFAULT NULL,
  `PER_Parenteso2` varchar(40) DEFAULT NULL,
  `PER_PNombre2` varchar(150) DEFAULT NULL,
  `PER_PCelular2` varchar(20) DEFAULT NULL,
  `PER_PDireccion2` varchar(150) DEFAULT NULL,
  `PUE_Id` int(11) DEFAULT NULL,
  `PER_Carrera` varchar(40) DEFAULT NULL,
  `PER_GradoAcademico` varchar(40) DEFAULT NULL,
  `PER_EstadoLaboral` varchar(40) DEFAULT 'ACTIVO',
  `ARE_Id` int(11) DEFAULT NULL,
  `PER_TPolo` varchar(6) DEFAULT NULL,
  `PER_TPantalon` varchar(6) DEFAULT NULL,
  `PER_TZapatos` varchar(6) DEFAULT NULL,
  `PER_Titular` varchar(60) DEFAULT NULL,
  `PER_Banco` varchar(30) DEFAULT NULL,
  `PER_NumeroCuenta` varchar(20) DEFAULT NULL,
  `PER_CCI` varchar(22) DEFAULT NULL,
  `PER_Documento` char(10) DEFAULT NULL,
  `PER_Foto` varchar(10) DEFAULT NULL,
  `PER_CV` char(20) DEFAULT NULL,
  `PER_ListaNegra` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`PER_Id`, `PER_Nombre`, `PER_Apellido`, `PER_TipoDocumento`, `PER_NumeroDocumento`, `PER_FechaNacimiento`, `PER_Edad`, `PER_Sexo`, `PER_EstadoCivil`, `PER_NumeroHijos`, `PER_Procedencia`, `PER_Direccion`, `PER_Referencia`, `PER_Correo`, `PER_Celular`, `PER_Parenteso`, `PER_PNombre`, `PER_PCelular`, `PER_PDireccion`, `PER_Parenteso2`, `PER_PNombre2`, `PER_PCelular2`, `PER_PDireccion2`, `PUE_Id`, `PER_Carrera`, `PER_GradoAcademico`, `PER_EstadoLaboral`, `ARE_Id`, `PER_TPolo`, `PER_TPantalon`, `PER_TZapatos`, `PER_Titular`, `PER_Banco`, `PER_NumeroCuenta`, `PER_CCI`, `PER_Documento`, `PER_Foto`, `PER_CV`, `PER_ListaNegra`) VALUES
(1, 'ABNER ELIAS', 'MERLO ALVITES', 'DNI', '73662777', '1998-06-20', 25, 'MASCULINO', 'CASADO', 1, 'PACASMAYO - PACASMAYO - LA LIBERTAD', 'LAS PALMERAS MZ X LT 25', 'PLAZA', '-', '123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.jpg', NULL, NULL),
(2, 'JUAN DENNIS', 'LOPEZ DARIO', 'DNI', '73662756', '1995-05-15', 28, 'MASCULINO', NULL, NULL, '-', '-', '-', '-', '55555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'JUAN', 'PEREZ ESQUEN', 'DNI', '74562569', '1986-09-26', 37, 'MASCULINO', NULL, NULL, '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'LEONARD', 'ROMERO SUXE', 'DNI', '71302093', '1994-04-12', 29, 'MASCULINO', NULL, NULL, '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4.jpg', NULL, NULL),
(5, 'SERGIO', 'VASQUEZ ESTELA', 'DNI', '43810919', '1986-09-25', 37, 'MASCULINO', NULL, NULL, '-', '-', '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `PRO_Id` int(10) UNSIGNED NOT NULL,
  `PRO_Nombre` varchar(50) NOT NULL,
  `PRO_Descripcion` varchar(250) DEFAULT NULL,
  `PRO_PrecioCompra` decimal(10,2) NOT NULL,
  `PRO_PrecioVenta` decimal(10,2) NOT NULL,
  `PRO_Marca` varchar(50) DEFAULT NULL,
  `CAT_Id` int(10) UNSIGNED NOT NULL,
  `PRO_Status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`PRO_Id`, `PRO_Nombre`, `PRO_Descripcion`, `PRO_PrecioCompra`, `PRO_PrecioVenta`, `PRO_Marca`, `CAT_Id`, `PRO_Status`, `created_at`, `updated_at`) VALUES
(1, 'GRANDE', '4 WAFFLES + 4 TOPPINGS', 10.00, 15.00, '-', 3, 1, NULL, NULL),
(2, 'MEDIANO', '3 WAFFLES', 5.00, 10.00, '-', 3, 1, NULL, NULL),
(3, 'MINI PLACER', 'ELECCION A TOPPINGS + 1 JALEAS', 3.00, 6.00, '-', 2, 1, NULL, NULL),
(4, 'FRESURA MEDIA', 'ELECION A 3 TOPPINGS + 2 JALEAS', 4.00, 8.00, '-', 2, 1, NULL, NULL),
(5, 'MEGA FRESA SUPREMA', 'ELECCION 3 TOPPINGS + 3 JALEAS', 8.00, 13.00, '-', 2, 1, NULL, NULL),
(6, 'DUO DULCES', '-', 5.00, 7.00, '-', 1, 1, NULL, NULL),
(7, 'TRI DONAS', '-', 7.00, 10.00, '-', 1, 1, NULL, NULL),
(8, 'DONAS FAMILIAR', '-', 10.00, 15.00, '-', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `PROV_Id` int(10) UNSIGNED NOT NULL,
  `PROV_TipoDocumento` varchar(50) NOT NULL,
  `PROV_NumDocumento` varchar(12) NOT NULL,
  `PROV_RazonSocial` varchar(50) NOT NULL,
  `PROV_Direccion` varchar(50) DEFAULT NULL,
  `PROV_Descripcion` varchar(100) DEFAULT NULL,
  `PROV_Celular` varchar(9) DEFAULT NULL,
  `PROV_Correo` varchar(50) DEFAULT NULL,
  `PROV_Status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `PUE_Id` int(10) UNSIGNED NOT NULL,
  `PUE_Nombre` varchar(100) NOT NULL,
  `PUE_Roles` text DEFAULT NULL,
  `ARE_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`PUE_Id`, `PUE_Nombre`, `PUE_Roles`, `ARE_Id`) VALUES
(1, 'GERENTE GENERAL', NULL, 1),
(2, 'JEFE DE LOGÍSTICA', NULL, 2),
(3, 'AUXILIAR DE LOGÍSTICA', NULL, 2),
(4, 'RESPONSABLE DE TRANSPORTES', NULL, 2),
(5, 'PRACTICANTE DE LOGISTICA', NULL, 2),
(6, 'JEFE DE OPERACIONES', NULL, 3),
(7, 'PLANER DE MANTENIMIENTO Y PROYECTOS', NULL, 3),
(8, 'TORNERO', NULL, 3),
(9, 'SUPERVISOR DE PROYECTOS', NULL, 3),
(10, 'AUXILIAR DE PROYECTOS', NULL, 3),
(11, 'TÉCNICO ELECTRICISTA', NULL, 3),
(12, 'TÉCNICO MECÁNICO', NULL, 3),
(13, 'TÉCNICO ELECTROMECÁNICO', NULL, 3),
(14, 'SUPERVISOR DE MANTENIMIENTO', NULL, 4),
(15, 'TÉCNICO ELECTROMECÁNICO', NULL, 4),
(16, 'ASISTENTE DE BIENESTAR SOCIAL', NULL, 7),
(17, 'SUPERVISOR DE SEGURIDAD Y SALUD EN EL TRABAJO', NULL, 6),
(18, 'PREVENCIONISTA', NULL, 6),
(20, 'CONTADOR (TERCERO)', NULL, 5),
(21, 'OPERARIO DE MANTENIMIENTO', NULL, 3),
(22, 'OPERARIO MECANICO', NULL, 3),
(23, 'OPERARIO ELECTRICO', NULL, 3),
(24, 'TECNICO DE MANTENIMIENTO', NULL, 3),
(25, 'OPERARIO  DE MANTENIMIENTO', NULL, 3),
(28, 'AUXILIAR DOCUMENTARIO', NULL, 5),
(29, 'OPERARIO MECANICO', NULL, 3),
(30, 'RESPONSABLE DE ALMACEN', NULL, 2),
(31, 'GASFITERO', NULL, 3),
(32, 'DESARROLLADOR WEB', NULL, 8),
(33, 'AUXILIAR DE MANTENIMIENTO', NULL, 3),
(34, 'SUPERVISOR DE MANTENIMIENTO', NULL, 3),
(35, 'OPERARIO CARPINTERO', NULL, 3),
(36, 'AUXILIAR DE LIMPIEZA', NULL, 9),
(37, 'OPERARIO SOLDADOR', NULL, 3),
(38, 'OFICIAL SOLDADOR', NULL, 3),
(39, 'CONDUCTOR DE TRANSPORTE', NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estadorol` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `estadorol`, `descripcion`) VALUES
(1, 'ADMIN', 'web', '2023-11-02 02:23:21', '2024-04-06 04:37:22', 1, 'administra todo'),
(2, 'BLOGGER', 'web', '2024-03-15 23:55:57', '2024-04-05 23:16:33', 1, 'Sin descripcion'),
(3, 'ROLES', 'web', '2024-03-17 17:20:57', '2024-04-06 04:45:28', 1, 'Todo el acceso a los roles'),
(4, 'PERMISO', 'web', '2024-03-17 17:20:57', '2024-03-17 17:20:57', 1, 'Todos los permisos'),
(5, 'PERSONAL TECNICO', 'web', '2024-03-17 17:20:57', '2024-03-17 17:20:57', 1, 'Roles unicamente para personal técnico'),
(6, 'PERSONAL TECNICO 2', 'web', '2024-04-03 23:52:07', '2024-04-03 23:52:07', 1, 'Sin descripcion'),
(7, 'ASISTENTE ADMINISTRATIVO', 'web', '2024-04-04 01:13:32', '2024-04-04 01:13:32', 1, 'Sin descripcion'),
(8, 'GERENTE', 'web', '2024-04-05 01:25:40', '2024-04-05 01:25:40', 1, 'administra el sistema'),
(9, 'GERENTE 2', 'web', '2024-04-05 01:28:27', '2024-04-05 01:28:27', 1, 'suplanta al gerente'),
(10, 'SUPERVISOR', 'web', '2024-04-06 01:00:01', '2024-04-06 01:00:01', 1, 'supervisa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 6),
(1, 8),
(1, 10),
(2, 1),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 1),
(3, 8),
(3, 10),
(4, 1),
(4, 8),
(4, 9),
(4, 10),
(5, 1),
(5, 8),
(5, 10),
(6, 1),
(6, 3),
(6, 8),
(6, 10),
(7, 1),
(7, 3),
(7, 10),
(8, 1),
(8, 3),
(8, 8),
(8, 10),
(9, 1),
(9, 8),
(10, 1),
(10, 8),
(11, 1),
(11, 8),
(12, 1),
(13, 1),
(13, 8),
(14, 1),
(14, 8),
(15, 1),
(15, 8),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `photo_extension` varchar(50) DEFAULT NULL,
  `provider` varchar(50) DEFAULT NULL,
  `provider_id` varchar(50) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estadousuario` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(191) DEFAULT NULL,
  `tipousuario` int(11) NOT NULL,
  `numerodocumento` varchar(12) DEFAULT NULL,
  `PER_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo_extension`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`, `estadousuario`, `avatar`, `tipousuario`, `numerodocumento`, `PER_Id`) VALUES
(1, 'Elias s Merlo', 'merloalviteselias@gmail.com', NULL, '$2y$10$QIRp4TJ1IyW4WHxUZnCd3eOmNqpldLkUUepaedJP/lMcNpIQTQCsa', NULL, NULL, NULL, 'v6GbOTVXfxpiKud9IFub1q6KIXC5h1J75N6pYz8M0jBYlQZwj0rA5W1tl1Ke', '2023-11-02 02:23:21', '2024-04-03 22:02:46', 1, '', 0, NULL, 1),
(2, 'Cielo Menor Saavedra', 'cmenorsaavedra@gmail.com', NULL, '$2y$10$dhmXJkshrLc/fyo.99zst.Tsi8WWDA3XsY5BM16MBpYowMva8dtp2', NULL, NULL, NULL, '3HzaPl8ZCUKAqVkSGqEcJfMKvPFJeE0Ehm2rp5BPGu6tNTS8vUUVoli2vteD', '2024-04-01 23:07:44', '2024-04-01 23:07:44', 1, NULL, 0, NULL, 0),
(3, 'Maria Saavedra Chalan', 'maria@gmail.com', NULL, '$2y$10$ABQomQ0BTGNDqv96p78YKupnd7HHEf421iwGiaxEOxyfzuNmbtuFa', NULL, NULL, NULL, 'qxtZXnDr2S', '2024-04-02 06:19:48', '2024-04-02 06:19:48', 1, NULL, 0, NULL, 0),
(4, 'Carlos Puemape', 'carlos@gmail.com', NULL, '$2y$10$dpwR75v8GipiCmzFA73iMuGG2cfPRPO0zZQjg5AioZULIpTuMPRm6', NULL, NULL, NULL, 'M4EbcYXsNMSZV4RkRuJfzOBuaiGslH92SBQwUT2VoKG9t8G6dEDU03sadaty', '2024-04-02 06:45:51', '2024-04-03 23:22:11', 1, NULL, 0, NULL, 0),
(5, 'Carla Sanchez', 'carla@gmail.com', NULL, '$2y$10$8ZSq.GwYld3nprqw5fNnquVp8IVSBIYMiP.PtQmuUW5PfTNZm9lyG', NULL, NULL, NULL, '6h1ylhmzfD', '2024-04-03 20:52:26', '2024-04-03 23:20:57', 1, NULL, 0, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actas_personal`
--
ALTER TABLE `actas_personal`
  ADD PRIMARY KEY (`ACP_Item`,`PER_Id`);

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`ALM_Id`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`ARE_Id`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ASI_Id`),
  ADD KEY `RASI_1` (`PER_Id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CAT_Id`),
  ADD KEY `KFR1` (`CLA_Id`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`CLA_Id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`COM_Id`),
  ADD KEY `COM_KFR1` (`MEP_Id`),
  ADD KEY `COM_KFR2` (`PROV_Id`);

--
-- Indices de la tabla `contrato_personal`
--
ALTER TABLE `contrato_personal`
  ADD PRIMARY KEY (`COP_Item`,`PER_Id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`DCOM_Id`),
  ADD KEY `DCOM_KFR1` (`COM_Id`),
  ADD KEY `DCOM_KFR2` (`ALM_Id`),
  ADD KEY `DCOM_KFR3` (`PRO_Id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `familiar_personal`
--
ALTER TABLE `familiar_personal`
  ADD PRIMARY KEY (`FAP_Item`,`PER_Id`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`LOT_Id`),
  ADD KEY `LOT_KFR1` (`PRO_Id`),
  ADD KEY `LOT_KFR2` (`ALM_Id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`MEP_Id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`PER_Id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`PRO_Id`),
  ADD KEY `PRO_KFR1` (`CAT_Id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`PROV_Id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`PUE_Id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `ALM_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `ARE_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `ASI_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CAT_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `CLA_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `COM_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `DCOM_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `LOT_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `MEP_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `PER_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `PRO_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `PROV_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `PUE_Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `KFR1` FOREIGN KEY (`CLA_Id`) REFERENCES `clase` (`CLA_Id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `COM_KFR1` FOREIGN KEY (`MEP_Id`) REFERENCES `metodo_pago` (`MEP_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `COM_KFR2` FOREIGN KEY (`PROV_Id`) REFERENCES `proveedor` (`PROV_Id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `DCOM_KFR1` FOREIGN KEY (`COM_Id`) REFERENCES `compra` (`COM_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `DCOM_KFR2` FOREIGN KEY (`ALM_Id`) REFERENCES `almacen` (`ALM_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `DCOM_KFR3` FOREIGN KEY (`PRO_Id`) REFERENCES `producto` (`PRO_Id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `LOT_KFR1` FOREIGN KEY (`PRO_Id`) REFERENCES `producto` (`PRO_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `LOT_KFR2` FOREIGN KEY (`ALM_Id`) REFERENCES `almacen` (`ALM_Id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `PRO_KFR1` FOREIGN KEY (`CAT_Id`) REFERENCES `categoria` (`CAT_Id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
