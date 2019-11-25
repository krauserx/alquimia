-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2019 a las 05:37:43
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_alquimia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_texto` varchar(255) DEFAULT NULL,
  `c_descripcion` text DEFAULT NULL,
  `c_url_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `c_texto`, `c_descripcion`, `c_url_img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Energeticos', 'Todo los productos relacioanados con la hidratacion....', 'logo_2161347095816486724.png', '2019-11-25 07:14:26', '2019-11-25 07:33:29', NULL),
(2, 'Ropa Deportiva Mujer', 'ropa para las damas, como blusas....', 'logo_2257100870777453574.png', '2019-11-25 07:15:38', '2019-11-25 07:15:38', NULL),
(3, 'Suscripciones', NULL, 'logo_127211883002618562.jpeg', '2019-11-25 09:04:57', '2019-11-25 09:04:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_dato_id` int(10) UNSIGNED NOT NULL,
  `c_info` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `tipo_dato_id`, `c_info`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '60061484', '2019-11-18 10:35:21', '2019-11-18 10:35:21', NULL),
(2, 2, 'info@linkercr.com', '2019-11-18 10:35:21', '2019-11-18 10:35:21', NULL),
(3, 3, '3001118055', '2019-11-18 10:35:23', '2019-11-18 10:35:23', NULL),
(4, 1, '60061484', '2019-11-18 10:36:26', '2019-11-18 10:36:26', NULL),
(5, 2, 'yeral@linkercr.com', '2019-11-18 10:36:26', '2019-11-18 10:36:26', NULL),
(6, 3, '22222', '2019-11-18 10:36:26', '2019-11-18 10:36:51', NULL),
(7, 1, '3434', '2019-11-18 10:56:55', '2019-11-18 10:56:55', NULL),
(8, 2, 'info@linkercr.com', '2019-11-18 10:56:55', '2019-11-18 10:56:55', NULL),
(9, 3, '1254', '2019-11-18 10:56:55', '2019-11-18 10:56:55', NULL),
(10, 1, '2323', '2019-11-19 09:19:52', '2019-11-19 09:19:52', NULL),
(11, 2, '3232', '2019-11-19 09:19:52', '2019-11-19 09:19:52', NULL),
(12, 3, '2323', '2019-11-19 09:19:52', '2019-11-19 09:19:52', NULL),
(13, 1, '334', '2019-11-19 09:24:47', '2019-11-19 09:24:47', NULL),
(14, 2, 'er3', '2019-11-19 09:24:47', '2019-11-19 09:24:47', NULL),
(15, 3, NULL, '2019-11-19 09:24:47', '2019-11-19 09:24:47', NULL),
(16, 1, '3434', '2019-11-19 09:26:02', '2019-11-19 09:26:02', NULL),
(17, 2, '3434', '2019-11-19 09:26:02', '2019-11-19 09:26:02', NULL),
(18, 3, '3434', '2019-11-19 09:26:02', '2019-11-19 09:26:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_empresa`
--

CREATE TABLE `contacto_empresa` (
  `empresa_id` int(10) UNSIGNED NOT NULL,
  `contacto_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto_empresa`
--

INSERT INTO `contacto_empresa` (`empresa_id`, `contacto_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-11-18 10:35:21', '2019-11-18 10:35:21'),
(1, 2, '2019-11-18 10:35:21', '2019-11-18 10:35:21'),
(1, 3, '2019-11-18 10:35:23', '2019-11-18 10:35:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_persona`
--

CREATE TABLE `contacto_persona` (
  `persona_id` int(10) UNSIGNED NOT NULL,
  `contacto_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto_persona`
--

INSERT INTO `contacto_persona` (`persona_id`, `contacto_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-11-18 10:36:26', '2019-11-18 10:36:26'),
(1, 5, '2019-11-18 10:36:26', '2019-11-18 10:36:26'),
(1, 6, '2019-11-18 10:36:26', '2019-11-18 10:36:26'),
(2, 7, '2019-11-18 10:56:55', '2019-11-18 10:56:55'),
(2, 8, '2019-11-18 10:56:55', '2019-11-18 10:56:55'),
(2, 9, '2019-11-18 10:56:55', '2019-11-18 10:56:55'),
(3, 10, '2019-11-19 09:19:52', '2019-11-19 09:19:52'),
(3, 11, '2019-11-19 09:19:52', '2019-11-19 09:19:52'),
(3, 12, '2019-11-19 09:19:52', '2019-11-19 09:19:52'),
(4, 13, '2019-11-19 09:24:47', '2019-11-19 09:24:47'),
(4, 14, '2019-11-19 09:24:47', '2019-11-19 09:24:47'),
(4, 15, '2019-11-19 09:24:47', '2019-11-19 09:24:47'),
(5, 16, '2019-11-19 09:26:02', '2019-11-19 09:26:02'),
(5, 17, '2019-11-19 09:26:02', '2019-11-19 09:26:02'),
(5, 18, '2019-11-19 09:26:02', '2019-11-19 09:26:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_empresa` varchar(255) NOT NULL,
  `direccion_empresa` text NOT NULL,
  `logo_empresa` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `nombre_empresa`, `direccion_empresa`, `logo_empresa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ALQUIMIA', 'Guapiles', 'logo_524459448273953214.jpeg', '2019-11-18 10:35:21', '2019-11-18 10:35:21', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_11_08_000000_create_users_table', 1),
(2, '2019_11_08_200000_create_password_resets_table', 1),
(3, '2019_11_08_235224_create_permission_tables', 1),
(4, '2019_11_08_300000_create_failed_jobs_table', 1),
(5, '2019_11_09_001754_create_posts_table', 2),
(6, '2019_11_11_032202_create_empresas_table', 3),
(8, '2019_11_11_032620_create_tipo_dato_contacto_table', 4),
(10, '2019_11_14_021530_create_contactos_table', 5),
(13, '2019_11_14_061330_create_contacto_empresa_table', 6),
(15, '2019_11_14_182831_create_personas_table', 7),
(16, '2019_11_15_221013_create_test_table', 8),
(17, '2019_11_15_221013_create_test_table', 8),
(18, '2019_11_15_232928_create_contacto_persona_table', 9),
(23, '2019_11_19_035659_create_categorias_table', 10),
(27, '2019_11_25_000431_create_productos_table', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administer roles & permissions', 'web', '2019-11-09 07:34:19', '2019-11-09 07:34:19'),
(2, 'Create Post', 'web', '2019-11-09 07:34:35', '2019-11-09 07:34:35'),
(3, 'Edit Post', 'web', '2019-11-09 07:34:47', '2019-11-09 07:34:47'),
(4, 'Delete Post', 'web', '2019-11-09 07:35:01', '2019-11-09 07:35:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_nombre` varchar(255) NOT NULL,
  `p_apellido` varchar(255) DEFAULT NULL,
  `p_tipo_persona` int(11) DEFAULT 1 COMMENT '1 cliente 2 proveedor',
  `p_sexo` int(11) DEFAULT 3 COMMENT '1 hombre 2 mujer, 3 no indica',
  `p_direccion` text DEFAULT NULL,
  `p_fecha_nacimeinto` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `p_nombre`, `p_apellido`, `p_tipo_persona`, `p_sexo`, `p_direccion`, `p_fecha_nacimeinto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Yeral', 'Duron Rivera', 2, 1, 'Puerto viejo, limon, CR, Home Creeck', '1970-01-01', '2019-11-18 10:36:26', '2019-11-18 10:39:38', NULL),
(2, 'Jose', 'Chinchilla', 1, 1, 'guapiles', '1970-01-01', '2019-11-18 10:56:55', '2019-11-19 09:47:59', NULL),
(3, 'Test', 'asas', 1, 1, '23333', '2019-12-11', '2019-11-19 09:19:52', '2019-11-19 09:50:47', '2019-11-19 09:50:47'),
(4, 'Carro', 'as', 1, 1, 'wew', '2019-11-27', '2019-11-19 09:24:47', '2019-11-19 09:49:53', '2019-11-19 09:49:53'),
(5, 'Carro', 'we', 1, 1, 'wewe', '2019-10-30', '2019-11-19 09:26:02', '2019-11-19 09:35:20', '2019-11-19 09:35:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mause', 'Mause inalambrico, con bateria<br>\r\nIs there a truncate modifier for the blade templates in Laravel, pretty much like Smarty?\r\n\r\nI know I could just write out the actual php in the template but i\'m looking for something a little nicer to write (let\'s not get into the whole PHP is a templating engine debate).', '2019-11-09 07:40:23', '2019-11-09 08:03:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_codigo` varchar(255) NOT NULL,
  `p_codigo_barra` varchar(255) DEFAULT NULL,
  `p_nombre` varchar(255) NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `p_precio_costo` double(15,2) DEFAULT NULL,
  `p_precio_venta` double(15,2) NOT NULL,
  `p_catidad` double(15,2) DEFAULT NULL,
  `p_tipo` int(10) UNSIGNED NOT NULL COMMENT '1 servicio, 2 mercaderia',
  `p_descripcion` text DEFAULT NULL,
  `p_url_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `p_codigo`, `p_codigo_barra`, `p_nombre`, `categoria_id`, `p_precio_costo`, `p_precio_venta`, `p_catidad`, `p_tipo`, `p_descripcion`, `p_url_img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2590', NULL, 'Gatore 750ml update', 1, 250.00, 775.00, 15.00, 2, 'producto para venta en el gym', 'producto_2614075099963562284.jpeg', '2019-11-25 09:04:31', '2019-11-25 10:18:16', NULL),
(2, '2591', NULL, 'Suscripción mensual', 3, NULL, 15000.00, NULL, 1, 'suscripciones mesuales', 'producto_345734884554440816.jpeg', '2019-11-25 09:05:31', '2019-11-25 10:24:13', NULL),
(3, '2594', NULL, 'Test', 3, 12500.00, 2500.00, NULL, 1, 'sdsd', 'producto_1575714866997100836.jpeg', '2019-11-25 10:19:31', '2019-11-25 10:25:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-11-09 07:37:11', '2019-11-09 07:37:11'),
(2, 'Cliente', 'web', '2019-11-09 07:37:37', '2019-11-09 07:37:37'),
(3, 'Editor', 'web', '2019-11-09 07:38:08', '2019-11-09 07:38:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_dato_contacto`
--

CREATE TABLE `tipo_dato_contacto` (
  `id` int(10) UNSIGNED NOT NULL,
  `tdc_texto` varchar(255) NOT NULL,
  `tdc_descripcion` text DEFAULT NULL,
  `tdc_requerido` int(11) NOT NULL DEFAULT 1 COMMENT '1 requerido 2 no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_dato_contacto`
--

INSERT INTO `tipo_dato_contacto` (`id`, `tdc_texto`, `tdc_descripcion`, `tdc_requerido`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Celular', 'Número de celular', 1, NULL, NULL, NULL),
(2, 'Correo', 'Correo electromecánico', 1, NULL, NULL, NULL),
(3, 'Identificación', 'Número de identificación', 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@linkercr.com', NULL, '$2y$10$cdVDWS5ypRGsettZB5oHJuPFbSH91Y78Fe3jp50q3EiAjPXgd58iK', NULL, '2019-11-09 06:50:43', '2019-11-09 07:40:02'),
(2, 'Eze', 'yeral@linkercr.com', NULL, '$2y$10$48nbpcYuHxSnog3bZZ1kgeQJo24nXDAtYiWb0XNFvfUXqJ287FCU6', NULL, '2019-11-14 09:16:01', '2019-11-14 09:16:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactos_tipo_dato_id_foreign` (`tipo_dato_id`);

--
-- Indices de la tabla `contacto_empresa`
--
ALTER TABLE `contacto_empresa`
  ADD PRIMARY KEY (`empresa_id`,`contacto_id`),
  ADD KEY `contacto_empresa_contacto_id_foreign` (`contacto_id`);

--
-- Indices de la tabla `contacto_persona`
--
ALTER TABLE `contacto_persona`
  ADD PRIMARY KEY (`persona_id`,`contacto_id`),
  ADD KEY `contacto_persona_contacto_id_foreign` (`contacto_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_p_codigo_unique` (`p_codigo`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `productos_p_nombre_index` (`p_nombre`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tipo_dato_contacto`
--
ALTER TABLE `tipo_dato_contacto`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_dato_contacto`
--
ALTER TABLE `tipo_dato_contacto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_tipo_dato_id_foreign` FOREIGN KEY (`tipo_dato_id`) REFERENCES `tipo_dato_contacto` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contacto_empresa`
--
ALTER TABLE `contacto_empresa`
  ADD CONSTRAINT `contacto_empresa_contacto_id_foreign` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacto_empresa_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contacto_persona`
--
ALTER TABLE `contacto_persona`
  ADD CONSTRAINT `contacto_persona_contacto_id_foreign` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacto_persona_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

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
