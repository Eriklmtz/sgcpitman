-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
DROP DATABASE IF EXISTS sgcpitman;

-- Volcando estructura de base de datos para sgcpitman
CREATE DATABASE IF NOT EXISTS `sgcpitman` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sgcpitman`;

-- Volcando estructura para tabla sgcpitman.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apaterno` varchar(45) NOT NULL,
  `amaterno` varchar(45) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `alergia` varchar(45) NOT NULL,
  `tel_emergencia` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sgcpitman.alumnos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`id`, `nombre`, `apaterno`, `amaterno`, `correo`, `telefono`, `direccion`, `alergia`, `tel_emergencia`, `created_at`, `updated_at`) VALUES
	(1, 'Erik', 'Lurias', 'Martínez', 'erik.uni@outlook.com', '9581170453', 'Colonia Morelos, Salina Cruz', 'ninguna', '958 115 0059', '2019-11-05 19:04:17', '2019-11-06 03:58:31'),
	(2, 'María', 'Moreno', 'Mendoza', 'maria.uni@outlook.com', '971 562 4455', 'Colonia Hgo Mayoral, Salina Cruz', 'ninguna', '9581170453', '2019-11-05 19:06:16', '2019-11-05 19:06:33');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla sgcpitman.especialidades
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(4150) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sgcpitman.especialidades: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` (`id`, `nombre`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Informática', 'Herramientas iformáticos', 1, '2019-11-05 19:09:43', '2019-11-05 19:09:43'),
	(2, 'Preparatoria', 'Preparatotia normal', 1, '2019-11-05 19:10:18', '2019-11-05 19:10:18');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;

-- Volcando estructura para tabla sgcpitman.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_general_ci NOT NULL,
  `queue` text COLLATE utf8_general_ci NOT NULL,
  `payload` longtext COLLATE utf8_general_ci NOT NULL,
  `exception` longtext COLLATE utf8_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla sgcpitman.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla sgcpitman.matriculas
CREATE TABLE IF NOT EXISTS `matriculas` (
  `matricula` varchar(15) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `especialidade_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`matricula`),
  UNIQUE(matricula),
  KEY `fk_matriculas_alumnos_idx` (`alumno_id`),
  KEY `fk_matriculas_especialidades1_idx` (`especialidade_id`),
  CONSTRAINT `fk_matriculas_alumnos` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_matriculas_especialidades1` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sgcpitman.matriculas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `matriculas` DISABLE KEYS */;
INSERT INTO `matriculas` (`matricula`, `alumno_id`, `especialidade_id`, `status`, `created_at`, `updated_at`) VALUES
	('151020190', 1, 1, NULL, '2019-11-05 19:16:42', '2019-11-05 19:16:42'),
	('151030146', 1, 2, NULL, '2019-11-06 18:17:02', '2019-11-06 18:17:02'),
	('151030150', 2, 1, NULL, '2019-11-06 20:35:46', '2019-11-06 20:35:46');
/*!40000 ALTER TABLE `matriculas` ENABLE KEYS */;

-- Volcando estructura para tabla sgcpitman.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Volcando datos para la tabla sgcpitman.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
-- Volcando estructura para tabla sgcpitman.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(45) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  especialidad_id INT, 
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  
  PRIMARY KEY (`id`),
  FOREIGN KEY(especialidad_id) REFERENCES especialidades(id)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sgcpitman.servicios: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` (`id`, `concepto`, `precio`, `descripcion`,especialidad_id, `created_at`, `updated_at`) VALUES
	(1, 'Inscripción', 500, 'Cuota de inscripción', 1,'2019-11-06 08:49:21', '2019-11-06 08:49:21'),
	(2, 'Mensualidad', 300, 'Cuaota de mensualidad', 1,'2019-11-06 08:51:10', '2019-11-06 08:51:10'),
	(3, 'Credencial', 50, 'Costo de credencial', 2,'2019-11-06 08:52:10', '2019-11-06 08:52:10'),
	(4, 'Constancia de estudios', 50, 'Costo de Constancia',2, '2019-11-06 08:52:53', '2019-11-06 08:52:53');


CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_general_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Abimael', 'admin', NULL, '$2y$10$FiBgTg6FNw6GoOCZMclP0.Q.vPD4G1jQELzUwqDxh6XNB6rRl33Xa', 'admin', NULL, '2019-11-05 19:11:48', '2019-11-05 19:12:22'),
	(2, 'Erik LMtz', 'erik', NULL, '$2y$10$vh6z2xJqZ30cDM/fPOgqq.VMQx4D4WTzy68ElJZZFHJ72zH/VkukO', NULL, NULL, '2019-11-06 01:33:30', '2019-11-06 01:33:30');



-- Volcando estructura para tabla sgcpitman.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_cobro` date NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `matricula` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  tipo VARCHAR(20),
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`matricula`) REFERENCES `matriculas` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Volcando estructura para tabla sgcpitman.pago_servicio
CREATE TABLE IF NOT EXISTS `pago_servicio` (
  `pago_id` int(11) NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` float NOT NULL,
  `descuento` float NOT NULL,
  `fecha_pago_servicio` date NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (pago_id,servicio_id),
  FOREIGN KEY (`pago_id`) REFERENCES `pagos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE egresos(
  id INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE,
  nombre varchar(200),
  descripcion TEXT,
  monto FLOAT,
  usuario INT,
  estado int(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;  