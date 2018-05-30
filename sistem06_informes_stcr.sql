-- phpMyAdmin SQL Dump
-- version 4.0.10.15
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-05-2018 a las 12:29:53
-- Versión del servidor: 5.1.73-community
-- Versión de PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistem06_informes`
--
CREATE DATABASE IF NOT EXISTS `sistem06_informes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistem06_informes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_102_llamados`
--

CREATE TABLE IF NOT EXISTS `tb_102_llamados` (
  `la_102_id` int(9) NOT NULL AUTO_INCREMENT,
  `la_102_us` int(6) NOT NULL,
  `la_102_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `la_102_tipo_llamado` int(2) NOT NULL,
  `la_102_relacion` int(2) NOT NULL,
  `la_clave_ex` int(6) NOT NULL,
  `la_dp_id` int(6) NOT NULL,
  PRIMARY KEY (`la_102_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_102_llamados_dp`
--

CREATE TABLE IF NOT EXISTS `tb_102_llamados_dp` (
  `dp_102_id` int(6) NOT NULL AUTO_INCREMENT,
  `dp_102_apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_parentesco` int(2) NOT NULL,
  `dp_102_tel1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_tel2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dp_102_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_102_resguardo`
--

CREATE TABLE IF NOT EXISTS `tb_102_resguardo` (
  `res_id` int(2) NOT NULL AUTO_INCREMENT,
  `res_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_acceso_agua`
--

CREATE TABLE IF NOT EXISTS `tb_acceso_agua` (
  `aa_id` int(2) NOT NULL,
  `aa_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`aa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_actividades`
--

CREATE TABLE IF NOT EXISTS `tb_actividades` (
  `act_id` int(3) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=217 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_antecedentes_laborales`
--

CREATE TABLE IF NOT EXISTS `tb_antecedentes_laborales` (
  `al_id` int(9) NOT NULL AUTO_INCREMENT,
  `al_dp_id` int(6) NOT NULL,
  `al_in` date NOT NULL,
  `al_out` date NOT NULL,
  `al_actual` int(1) NOT NULL,
  `al_tipo_trabajo` int(2) NOT NULL,
  `al_lugar_trabajo` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `al_puesto` int(3) NOT NULL,
  `al_categoria` int(3) NOT NULL,
  `al_actividad` int(3) NOT NULL,
  `al_descripcion_puesto` blob NOT NULL,
  `al_referencias` blob NOT NULL,
  PRIMARY KEY (`al_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5963 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areas_ur`
--

CREATE TABLE IF NOT EXISTS `tb_areas_ur` (
  `au_id` int(1) NOT NULL AUTO_INCREMENT,
  `au_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`au_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asistente_disc`
--

CREATE TABLE IF NOT EXISTS `tb_asistente_disc` (
  `ad_id` int(2) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asociaciones`
--

CREATE TABLE IF NOT EXISTS `tb_asociaciones` (
  `as_id` int(3) NOT NULL AUTO_INCREMENT,
  `as_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`as_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ayudas_discapacidad`
--

CREATE TABLE IF NOT EXISTS `tb_ayudas_discapacidad` (
  `ad_id` int(6) NOT NULL AUTO_INCREMENT,
  `ad_dp_id` int(6) NOT NULL,
  `ad_dat_id` int(2) NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_banios`
--

CREATE TABLE IF NOT EXISTS `tb_banios` (
  `ban_id` int(2) NOT NULL,
  `ban_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ban_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_barrios`
--

CREATE TABLE IF NOT EXISTS `tb_barrios` (
  `bar_id` int(2) NOT NULL AUTO_INCREMENT,
  `bar_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `bar_cod_muni` varchar(20) NOT NULL,
  PRIMARY KEY (`bar_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=184 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_barrios_coordenadas`
--

CREATE TABLE IF NOT EXISTS `tb_barrios_coordenadas` (
  `bc_id` int(6) NOT NULL AUTO_INCREMENT,
  `bc_bar_id` int(4) NOT NULL,
  `bc_lng` decimal(17,15) NOT NULL,
  `bc_lat` decimal(17,15) NOT NULL,
  PRIMARY KEY (`bc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4007 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_barrios_gloc`
--

CREATE TABLE IF NOT EXISTS `tb_barrios_gloc` (
  `bar_id` int(4) NOT NULL AUTO_INCREMENT,
  `bar_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `bar_min_lng` decimal(17,15) NOT NULL,
  `bar_max_lng` decimal(17,15) NOT NULL,
  `bar_min_lat` decimal(17,15) NOT NULL,
  `bar_max_lat` decimal(17,15) NOT NULL,
  PRIMARY KEY (`bar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=174 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiario_curso_externo`
--

CREATE TABLE IF NOT EXISTS `tb_beneficiario_curso_externo` (
  `bce_id` int(6) NOT NULL AUTO_INCREMENT,
  `bce_ce_id` int(3) NOT NULL,
  `bce_dp_id` int(9) NOT NULL,
  `bce_year` int(4) NOT NULL,
  `bce_situacion` int(2) NOT NULL,
  `bce_certificacion` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bce_id`),
  KEY `bce_id` (`bce_id`),
  KEY `bce_id_2` (`bce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1409 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiario_formacion_profesional`
--

CREATE TABLE IF NOT EXISTS `tb_beneficiario_formacion_profesional` (
  `bfp_id` int(6) NOT NULL AUTO_INCREMENT,
  `bfp_dp_id` int(6) NOT NULL,
  `bfp_situacion` int(2) NOT NULL,
  `bfp_fp_id` int(3) NOT NULL,
  `bfp_year` int(4) NOT NULL,
  PRIMARY KEY (`bfp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1608 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiario_idioma`
--

CREATE TABLE IF NOT EXISTS `tb_beneficiario_idioma` (
  `bi_id` int(6) NOT NULL AUTO_INCREMENT,
  `bi_dp_id` int(6) NOT NULL,
  `bi_idi_id` int(2) NOT NULL,
  `bi_nivel` int(2) NOT NULL,
  PRIMARY KEY (`bi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3392 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiarios_sistema`
--

CREATE TABLE IF NOT EXISTS `tb_beneficiarios_sistema` (
  `bs_id` int(9) NOT NULL AUTO_INCREMENT,
  `bs_dp_id` int(6) NOT NULL,
  `bs_dni` int(8) NOT NULL,
  `bs_sis` int(2) NOT NULL,
  `bs_sis_ini` int(2) NOT NULL,
  `bs_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bs_us` int(6) NOT NULL,
  PRIMARY KEY (`bs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3043 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caats`
--

CREATE TABLE IF NOT EXISTS `tb_caats` (
  `ca_id` int(2) NOT NULL AUTO_INCREMENT,
  `ca_name` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ca_lng` decimal(17,15) NOT NULL,
  `ca_lat` decimal(17,15) NOT NULL,
  `ca_min_lng` decimal(17,15) NOT NULL,
  `ca_max_lng` decimal(17,15) NOT NULL,
  `ca_min_lat` decimal(17,15) NOT NULL,
  `ca_max_lat` decimal(17,15) NOT NULL,
  PRIMARY KEY (`ca_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caats_coordenadas`
--

CREATE TABLE IF NOT EXISTS `tb_caats_coordenadas` (
  `cc_id` int(6) NOT NULL AUTO_INCREMENT,
  `cc_ca_id` int(3) NOT NULL,
  `cc_lng` decimal(17,15) NOT NULL,
  `cc_lat` decimal(17,15) NOT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=367 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_calle`
--

CREATE TABLE IF NOT EXISTS `tb_calle` (
  `ca_id` int(5) NOT NULL AUTO_INCREMENT,
  `ca_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ca_cod_muni` int(6) NOT NULL,
  `ca_gm` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ca_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1411 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carnets`
--

CREATE TABLE IF NOT EXISTS `tb_carnets` (
  `car_id` int(2) NOT NULL AUTO_INCREMENT,
  `car_name` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `car_descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=103 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cdi`
--

CREATE TABLE IF NOT EXISTS `tb_cdi` (
  `cdi_id` int(2) NOT NULL AUTO_INCREMENT,
  `cdi_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cdi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_combustible_cocina`
--

CREATE TABLE IF NOT EXISTS `tb_combustible_cocina` (
  `coco_id` int(2) NOT NULL,
  `coco_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`coco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comercios`
--

CREATE TABLE IF NOT EXISTS `tb_comercios` (
  `co_id` int(6) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `co_depto_provincial` int(3) NOT NULL,
  `co_localidad` int(3) NOT NULL,
  `co_calle` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `co_altura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `co_piso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `co_depto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `co_cuit` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `co_dp_id` int(6) NOT NULL,
  `co_tipo` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'C',
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_condicion_ocupacion`
--

CREATE TABLE IF NOT EXISTS `tb_condicion_ocupacion` (
  `co_id` int(2) NOT NULL,
  `co_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_condicion_uso`
--

CREATE TABLE IF NOT EXISTS `tb_condicion_uso` (
  `cu_id` int(2) NOT NULL,
  `cu_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_condiciones_organizacion`
--

CREATE TABLE IF NOT EXISTS `tb_condiciones_organizacion` (
  `co_id` int(2) NOT NULL AUTO_INCREMENT,
  `co_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cubierta_techo`
--

CREATE TABLE IF NOT EXISTS `tb_cubierta_techo` (
  `ct_id` int(2) NOT NULL,
  `ct_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cursos_externos`
--

CREATE TABLE IF NOT EXISTS `tb_cursos_externos` (
  `ce_id` int(3) NOT NULL AUTO_INCREMENT,
  `ce_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ce_dictado` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ce_ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ce_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=607 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_educativos`
--

CREATE TABLE IF NOT EXISTS `tb_datos_educativos` (
  `de_dp_id` int(9) NOT NULL,
  `de_idioma` int(2) NOT NULL,
  `de_continuar` int(1) NOT NULL DEFAULT '1',
  `de_pc` int(1) NOT NULL,
  `de_carnet` int(1) NOT NULL DEFAULT '0',
  `de_tipo_carnet` int(2) NOT NULL,
  `de_vencimiento_carnet` date NOT NULL,
  `de_libreta` int(1) NOT NULL DEFAULT '0',
  `de_vencimiento_libreta` date NOT NULL,
  `de_libreta_construccion` int(1) NOT NULL DEFAULT '0',
  `de_vencimiento_libreta_construccion` date NOT NULL,
  `de_observaciones` blob NOT NULL,
  `de_fecha_actualizacion` date NOT NULL,
  PRIMARY KEY (`de_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_educativos_social`
--

CREATE TABLE IF NOT EXISTS `tb_datos_educativos_social` (
  `des_dp_id` int(6) NOT NULL,
  `des_nivel` int(2) NOT NULL,
  `des_asiste` int(1) NOT NULL DEFAULT '0',
  `des_establecimiento` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `des_tipo` int(1) NOT NULL,
  PRIMARY KEY (`des_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_emprendimiento`
--

CREATE TABLE IF NOT EXISTS `tb_datos_emprendimiento` (
  `em_id` int(6) NOT NULL AUTO_INCREMENT,
  `em_dp_id` int(6) NOT NULL,
  `em_nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `em_rubro` int(2) NOT NULL,
  `em_subrubro` int(3) NOT NULL,
  `em_subrubro_old` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `em_descripcion` blob NOT NULL,
  `em_fecha_inicio` date NOT NULL,
  `em_domicilio` int(6) NOT NULL,
  `em_tipo_lugar` int(2) NOT NULL,
  `em_espacio` int(1) NOT NULL,
  `em_motivo_espacio` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `em_tipo_empresa` int(1) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`em_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=280 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_laborales_actuales`
--

CREATE TABLE IF NOT EXISTS `tb_datos_laborales_actuales` (
  `dla_dp_id` int(9) NOT NULL,
  `dla_actividad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dla_direccion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dla_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_nivel_educativo`
--

CREATE TABLE IF NOT EXISTS `tb_datos_nivel_educativo` (
  `dne_id` int(9) NOT NULL AUTO_INCREMENT,
  `dne_dp_id` int(6) NOT NULL,
  `dne_nivel` int(2) NOT NULL,
  `dne_termino` int(2) NOT NULL,
  `dne_modalidad` int(2) NOT NULL,
  `dne_titulo` int(4) NOT NULL,
  PRIMARY KEY (`dne_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3256 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_personales`
--

CREATE TABLE IF NOT EXISTS `tb_datos_personales` (
  `dp_id` int(6) NOT NULL AUTO_INCREMENT,
  `dp_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `dp_apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dp_tipo_doc` int(1) NOT NULL,
  `dp_nro_doc` int(8) NOT NULL,
  `dp_cuil` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `dp_nacimiento` date NOT NULL,
  `dp_sexo` int(1) NOT NULL,
  `dp_estado_civil` int(2) NOT NULL,
  `dp_barrio` int(3) NOT NULL,
  `dp_pais_nacimiento` int(4) NOT NULL,
  `dp_nacionalidad` int(2) NOT NULL,
  `dp_anos_residencia` int(3) NOT NULL,
  `dp_telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_movil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_telefono1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_movil1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_calle` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `dp_nro` int(5) NOT NULL,
  `dp_piso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dp_depto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dp_domicilio` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `dp_mail` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dp_mail1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dp_facebook` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `dp_web` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `dp_parentesco` int(2) NOT NULL,
  `dp_veterano` int(1) NOT NULL DEFAULT '0',
  `dp_fam_veterano` int(1) NOT NULL DEFAULT '0',
  `dp_pueblo_originario` int(1) NOT NULL DEFAULT '0',
  `dp_nombre_pueblo_originario` int(2) NOT NULL DEFAULT '0',
  `dp_edad` int(3) NOT NULL DEFAULT '0',
  `dp_observaciones` blob NOT NULL,
  `dp_vigente` int(1) NOT NULL DEFAULT '1',
  `dp_busqueda` varchar(240) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`dp_busqueda`),
  KEY `dp_id` (`dp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2983 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_personales_referente`
--

CREATE TABLE IF NOT EXISTS `tb_datos_personales_referente` (
  `dpr_id` int(6) NOT NULL AUTO_INCREMENT,
  `dpr_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_tipo_doc` int(1) NOT NULL,
  `dpr_nro_doc` int(8) NOT NULL,
  `dpr_parentesco` int(2) NOT NULL,
  `dpr_nacimiento` date NOT NULL,
  `dpr_sexo` int(1) NOT NULL,
  `dpr_estado_civil` int(2) NOT NULL,
  `dpr_telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_movil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_dpto_provincial` int(3) NOT NULL,
  `dpr_localidad` int(4) NOT NULL,
  `dpr_calle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_nro` int(6) NOT NULL,
  `dpr_piso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_dpto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_casa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_escalera` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dpr_edificio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dpr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_salud`
--

CREATE TABLE IF NOT EXISTS `tb_datos_salud` (
  `ds_dp_id` int(9) NOT NULL,
  `ds_tiene_os` int(1) NOT NULL,
  `ds_os` int(4) NOT NULL,
  `ds_tiene_discapacidad` int(1) NOT NULL DEFAULT '0',
  `ds_discapacidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ds_tiene_cud` int(1) NOT NULL,
  `ds_nro_cud` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ds_ley_cud` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ds_descripcion_cud` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ds_desde_cud` date NOT NULL,
  `ds_vencimiento_cud` date NOT NULL,
  `ds_ente_cud` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ds_tipo_discapacidad` int(2) NOT NULL DEFAULT '0',
  `ds_origen_discapacidad` int(2) NOT NULL DEFAULT '0',
  `ds_tipo_retraso` int(2) NOT NULL DEFAULT '0',
  `ds_situacion_discapacidad` int(2) NOT NULL DEFAULT '0',
  `ds_descripcion_diagnostico` blob NOT NULL,
  `ds_observaciones` blob NOT NULL,
  `ds_pension_jubilacion` int(1) NOT NULL,
  `ds_problemas_salud` int(1) NOT NULL,
  `ds_cuales_problemas_salud` mediumblob NOT NULL,
  `ds_medicacion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `ds_lugar_atencion` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `ds_rehabilitacion` int(1) NOT NULL DEFAULT '0',
  `ds_toma_medicacion` int(1) NOT NULL DEFAULT '0',
  `ds_frecuencia_medicacion` int(1) NOT NULL DEFAULT '0',
  `ds_traslado` int(2) NOT NULL,
  `ds_asistente_trabajo` int(2) NOT NULL,
  `ds_tratamientos_medicos` blob NOT NULL,
  `ds_informacion_importante` blob NOT NULL,
  `ds_tiene_ss` int(1) NOT NULL DEFAULT '0',
  `ds_tiene_subsidios` int(1) NOT NULL DEFAULT '0',
  `ds_ss` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `ds_subsidios` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ds_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamentos`
--

CREATE TABLE IF NOT EXISTS `tb_departamentos` (
  `dep_id` int(2) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dep_mostrar` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_derivaciones_102`
--

CREATE TABLE IF NOT EXISTS `tb_derivaciones_102` (
  `der_id` int(2) NOT NULL AUTO_INCREMENT,
  `der_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `der_es` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`der_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_desagues`
--

CREATE TABLE IF NOT EXISTS `tb_desagues` (
  `de_id` int(2) NOT NULL,
  `de_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`de_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_discapacidad_ayuda_tecnica`
--

CREATE TABLE IF NOT EXISTS `tb_discapacidad_ayuda_tecnica` (
  `dat_id` int(2) NOT NULL AUTO_INCREMENT,
  `dat_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dat_td_id` int(2) NOT NULL,
  PRIMARY KEY (`dat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_docs`
--

CREATE TABLE IF NOT EXISTS `tb_docs` (
  `do_id` int(1) NOT NULL AUTO_INCREMENT,
  `do_name` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`do_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_domicilios`
--

CREATE TABLE IF NOT EXISTS `tb_domicilios` (
  `dom_id` int(9) NOT NULL AUTO_INCREMENT,
  `dom_pr_dpto` int(2) NOT NULL,
  `dom_municipio` int(4) NOT NULL,
  `dom_localidad` int(4) NOT NULL,
  `dom_cp` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `dom_calle` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dom_nro` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_piso` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_depto` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_edificio` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_escalera` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_casa` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_domicilio` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `dom_dc_manzana` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_dc_parcela` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_dc_lote` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `dom_barrio` int(4) NOT NULL,
  `dom_caat` int(3) NOT NULL,
  `dom_lat` float(12,10) NOT NULL,
  `dom_lng` float(12,10) NOT NULL,
  `dom_emp` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2488 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_donde_vive`
--

CREATE TABLE IF NOT EXISTS `tb_donde_vive` (
  `dv_id` int(2) NOT NULL AUTO_INCREMENT,
  `dv_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_edad_padres`
--

CREATE TABLE IF NOT EXISTS `tb_edad_padres` (
  `ep_id` int(2) NOT NULL AUTO_INCREMENT,
  `ep_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_educacion_actual`
--

CREATE TABLE IF NOT EXISTS `tb_educacion_actual` (
  `ea_id` int(2) NOT NULL AUTO_INCREMENT,
  `ea_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ea_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_capacitaciones`
--

CREATE TABLE IF NOT EXISTS `tb_emprendedor_capacitaciones` (
  `ec_id` int(6) NOT NULL AUTO_INCREMENT,
  `ec_dp_id` int(6) NOT NULL,
  `ec_or_id` int(6) NOT NULL,
  `ec_motivo` int(4) NOT NULL,
  `ec_anio` int(4) NOT NULL,
  PRIMARY KEY (`ec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_credito`
--

CREATE TABLE IF NOT EXISTS `tb_emprendedor_credito` (
  `ec_id` int(6) NOT NULL AUTO_INCREMENT,
  `ec_dp_id` int(6) NOT NULL,
  `ec_or` int(4) NOT NULL,
  `ec_mo` int(4) NOT NULL,
  `ec_vigente` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`ec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_credito_nec`
--

CREATE TABLE IF NOT EXISTS `tb_emprendedor_credito_nec` (
  `ecn_id` int(6) NOT NULL AUTO_INCREMENT,
  `ecn_dp_id` int(6) NOT NULL,
  `ecn_rubro` int(4) NOT NULL,
  `ecn_rubro_cap` int(4) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`ecn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=217 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_organizacion`
--

CREATE TABLE IF NOT EXISTS `tb_emprendedor_organizacion` (
  `eo_id` int(6) NOT NULL AUTO_INCREMENT,
  `eo_dp_id` int(6) NOT NULL,
  `eo_or_id` int(6) NOT NULL,
  `eo_fa_id` int(3) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`eo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_ventas`
--

CREATE TABLE IF NOT EXISTS `tb_emprendedor_ventas` (
  `ev_id` int(6) NOT NULL AUTO_INCREMENT,
  `ev_dp_id` int(4) NOT NULL,
  `ev_tipo` int(2) NOT NULL,
  `ev_det_tipo` int(4) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  PRIMARY KEY (`ev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=224 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedores_asociados`
--

CREATE TABLE IF NOT EXISTS `tb_emprendedores_asociados` (
  `eas_id` int(6) NOT NULL AUTO_INCREMENT,
  `eas_dp_id` int(6) NOT NULL,
  `eas_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`eas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuestas`
--

CREATE TABLE IF NOT EXISTS `tb_encuestas` (
  `enc_id` int(9) NOT NULL AUTO_INCREMENT,
  `enc_caat` int(2) NOT NULL,
  `enc_usuario` int(3) NOT NULL,
  `enc_hogar` int(9) NOT NULL,
  `enc_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`enc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_entrevista`
--

CREATE TABLE IF NOT EXISTS `tb_entrevista` (
  `ent_id` int(9) NOT NULL AUTO_INCREMENT,
  `ent_sis` int(2) NOT NULL,
  `ent_us` int(3) NOT NULL,
  `ent_fin` int(1) NOT NULL,
  `ent_dp_id` int(6) NOT NULL,
  `ent_proxima` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ent_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17980 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_equipamiento_hogar`
--

CREATE TABLE IF NOT EXISTS `tb_equipamiento_hogar` (
  `eq_ho_id` int(9) NOT NULL,
  `eq_heladera` int(1) NOT NULL,
  `eq_cocina` int(1) NOT NULL,
  `eq_salamandra` int(1) NOT NULL,
  `eq_telefono` int(1) NOT NULL,
  `eq_celular` int(1) NOT NULL,
  `eq_lavarropa` int(1) NOT NULL,
  `eq_dvd` int(1) NOT NULL,
  `eq_tvcable` int(1) NOT NULL,
  `eq_directv` int(1) NOT NULL,
  `eq_hornom` int(1) NOT NULL,
  `eq_pc_web` int(1) NOT NULL,
  `eq_pc` int(1) NOT NULL,
  PRIMARY KEY (`eq_ho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_afip`
--

CREATE TABLE IF NOT EXISTS `tb_estado_afip` (
  `ea_dp_id` int(6) NOT NULL,
  `ea_tipo_relacion` int(2) NOT NULL,
  `ea_vencimiento` date NOT NULL,
  PRIMARY KEY (`ea_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_civil`
--

CREATE TABLE IF NOT EXISTS `tb_estado_civil` (
  `ec_id` int(2) NOT NULL AUTO_INCREMENT,
  `ec_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_titulo`
--

CREATE TABLE IF NOT EXISTS `tb_estado_titulo` (
  `et_id` int(1) NOT NULL AUTO_INCREMENT,
  `et_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`et_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_eventos`
--

CREATE TABLE IF NOT EXISTS `tb_eventos` (
  `ev_id` int(9) NOT NULL AUTO_INCREMENT,
  `ev_fecha` date NOT NULL,
  `ev_hora` time NOT NULL,
  `ev_usuario` int(6) NOT NULL,
  `ev_domicilio` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ev_condicion_org` int(2) NOT NULL,
  `ev_tipo` int(2) NOT NULL,
  `ev_observaciones` blob NOT NULL,
  PRIMARY KEY (`ev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_familiares`
--

CREATE TABLE IF NOT EXISTS `tb_familiares` (
  `fam_id` int(6) NOT NULL AUTO_INCREMENT,
  `fam_dp_id` int(6) NOT NULL,
  `fam_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fam_parentesco` int(4) NOT NULL,
  PRIMARY KEY (`fam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ferias`
--

CREATE TABLE IF NOT EXISTS `tb_ferias` (
  `fe_id` int(2) NOT NULL AUTO_INCREMENT,
  `fe_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fe_municipal` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fe_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_forma_asociacion`
--

CREATE TABLE IF NOT EXISTS `tb_forma_asociacion` (
  `fa_id` int(2) NOT NULL AUTO_INCREMENT,
  `fa_name` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`fa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_formacion_profesional`
--

CREATE TABLE IF NOT EXISTS `tb_formacion_profesional` (
  `fp_id` int(4) NOT NULL AUTO_INCREMENT,
  `fp_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fp_dictado` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`fp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1167 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_frecuencia_maltrato`
--

CREATE TABLE IF NOT EXISTS `tb_frecuencia_maltrato` (
  `fm_id` int(2) NOT NULL AUTO_INCREMENT,
  `fm_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`fm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_fuente_agua`
--

CREATE TABLE IF NOT EXISTS `tb_fuente_agua` (
  `fa_id` int(2) NOT NULL,
  `fa_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`fa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historial`
--

CREATE TABLE IF NOT EXISTS `tb_historial` (
  `hi_id` int(9) NOT NULL AUTO_INCREMENT,
  `hi_us_id` int(6) NOT NULL,
  `hi_dp_id` int(6) NOT NULL,
  `hi_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hi_detalle` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`hi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7932 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historial_tablas`
--

CREATE TABLE IF NOT EXISTS `tb_historial_tablas` (
  `ht_id` int(6) NOT NULL AUTO_INCREMENT,
  `ht_us` int(6) NOT NULL,
  `ht_tabla` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ht_item` int(6) NOT NULL,
  `ht_motivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ht_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ht_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar`
--

CREATE TABLE IF NOT EXISTS `tb_hogar` (
  `ho_id` int(9) NOT NULL AUTO_INCREMENT,
  `ho_dom_id` int(9) NOT NULL,
  `ho_inicio` date NOT NULL,
  `ho_viviendas_lote` int(2) NOT NULL,
  `ho_vivienda_lote_nro` int(2) NOT NULL,
  `ho_hogares_lote` int(2) NOT NULL,
  `ho_hogar_lote_nro` int(2) NOT NULL,
  `ho_tel_ref` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ho_movil_ref` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ho_mail_ref` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ho_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2950 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_beneficiario`
--

CREATE TABLE IF NOT EXISTS `tb_hogar_beneficiario` (
  `hb_id` int(9) NOT NULL AUTO_INCREMENT,
  `hb_ho_id` int(9) NOT NULL,
  `hb_dp_id` int(6) NOT NULL,
  PRIMARY KEY (`hb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2908 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_caracteristicas`
--

CREATE TABLE IF NOT EXISTS `tb_hogar_caracteristicas` (
  `hc_ho_id` int(6) NOT NULL,
  `hc_tipo_familia` int(2) NOT NULL,
  `hc_edad_padres` int(2) NOT NULL,
  `hc_ingresos_importes` int(2) NOT NULL,
  PRIMARY KEY (`hc_ho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_general`
--

CREATE TABLE IF NOT EXISTS `tb_hogar_general` (
  `hog_ho_id` int(9) NOT NULL,
  `hog_miembros` int(3) NOT NULL,
  `hog_habitaciones` int(3) NOT NULL,
  `hog_ubicacion_urbana` int(2) NOT NULL,
  `hog_tipo_casa` int(2) NOT NULL,
  `hog_material_piso` int(2) NOT NULL,
  `hog_material_paredes` int(2) NOT NULL,
  `hog_revestimiento_externo` int(1) NOT NULL,
  `hog_revestimiento_techo` int(2) NOT NULL,
  `hog_cielorraso` int(1) NOT NULL,
  `hog_sup_pb` int(6) NOT NULL,
  `hog_sup_viv` int(6) NOT NULL,
  PRIMARY KEY (`hog_ho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_propiedad`
--

CREATE TABLE IF NOT EXISTS `tb_hogar_propiedad` (
  `pr_ho_id` int(9) NOT NULL,
  `pr_propiedad` int(2) NOT NULL,
  `pr_ocupacion` int(2) NOT NULL,
  `pr_uso` int(2) NOT NULL,
  PRIMARY KEY (`pr_ho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_servicios`
--

CREATE TABLE IF NOT EXISTS `tb_hogar_servicios` (
  `hos_ho_id` int(9) NOT NULL,
  `hos_electricidad` int(1) NOT NULL,
  `hos_telefono` int(1) NOT NULL,
  `hos_acceso_agua` int(2) NOT NULL,
  `hos_fuente_agua` int(2) NOT NULL,
  `hos_combustible_cocina` int(2) NOT NULL,
  `hos_combustible_calefaccion` int(2) NOT NULL,
  `hos_desague` int(2) NOT NULL,
  `hos_banio` int(2) NOT NULL,
  PRIMARY KEY (`hos_ho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_idiomas`
--

CREATE TABLE IF NOT EXISTS `tb_idiomas` (
  `idi_id` int(2) NOT NULL AUTO_INCREMENT,
  `idi_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_imagenes`
--

CREATE TABLE IF NOT EXISTS `tb_imagenes` (
  `img_id` int(9) NOT NULL AUTO_INCREMENT,
  `img_dp_id` int(6) NOT NULL,
  `img_dni_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `img_front` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informes_listado`
--

CREATE TABLE IF NOT EXISTS `tb_informes_listado` (
  `inl_id` int(6) NOT NULL AUTO_INCREMENT,
  `inl_titulo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `inl_autor` int(3) NOT NULL,
  `inl_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inl_estado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`inl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=329 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informes_listado_detalles`
--

CREATE TABLE IF NOT EXISTS `tb_informes_listado_detalles` (
  `ild_id` int(6) NOT NULL AUTO_INCREMENT,
  `ild_inl_id` int(6) NOT NULL,
  `ild_tab_id` int(6) NOT NULL,
  `ild_values` varchar(240) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ild_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=625 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informes_listado_items`
--

CREATE TABLE IF NOT EXISTS `tb_informes_listado_items` (
  `ili_id` int(6) NOT NULL AUTO_INCREMENT,
  `ili_inl_id` int(6) NOT NULL,
  `ili_item` int(4) NOT NULL,
  `ili_tabla` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ili_variante` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ili_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3216 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos`
--

CREATE TABLE IF NOT EXISTS `tb_ingresos` (
  `in_dp_id` int(6) NOT NULL,
  `in_por` int(3) NOT NULL,
  `in_efector` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `in_efector_expediente` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`in_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos_hogar`
--

CREATE TABLE IF NOT EXISTS `tb_ingresos_hogar` (
  `ih_id` int(6) NOT NULL AUTO_INCREMENT,
  `ih_ho_id` int(6) NOT NULL,
  `ih_ti_id` int(2) NOT NULL,
  PRIMARY KEY (`ih_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos_importes`
--

CREATE TABLE IF NOT EXISTS `tb_ingresos_importes` (
  `ii_id` int(2) NOT NULL AUTO_INCREMENT,
  `ii_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ii_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos_otros`
--

CREATE TABLE IF NOT EXISTS `tb_ingresos_otros` (
  `io_id` int(6) NOT NULL AUTO_INCREMENT,
  `io_dp_id` int(6) NOT NULL,
  `io_ti_id` int(3) NOT NULL,
  PRIMARY KEY (`io_id`),
  KEY `io_id` (`io_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=216 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inscriptos_cdi`
--

CREATE TABLE IF NOT EXISTS `tb_inscriptos_cdi` (
  `ins_id` int(6) NOT NULL AUTO_INCREMENT,
  `ins_dp_id` int(6) NOT NULL,
  `ins_cdi` int(2) NOT NULL,
  `ins_sala` int(2) NOT NULL,
  `ins_turno` int(2) NOT NULL,
  `ins_motivo` mediumblob NOT NULL,
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_institucion_coorg`
--

CREATE TABLE IF NOT EXISTS `tb_institucion_coorg` (
  `ic_id` int(6) NOT NULL AUTO_INCREMENT,
  `ic_ins_id` int(4) NOT NULL,
  `ic_ev_id` int(6) NOT NULL,
  PRIMARY KEY (`ic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_institucion_participantes`
--

CREATE TABLE IF NOT EXISTS `tb_institucion_participantes` (
  `ip_id` int(4) NOT NULL AUTO_INCREMENT,
  `ip_ev_id` int(4) NOT NULL,
  `ip_ins_id` int(4) NOT NULL,
  PRIMARY KEY (`ip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_instituciones_cpa`
--

CREATE TABLE IF NOT EXISTS `tb_instituciones_cpa` (
  `ins_id` int(4) NOT NULL AUTO_INCREMENT,
  `ins_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ins_direccion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ins_contacto` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ins_telefono` int(12) NOT NULL,
  `ins_mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_licencias`
--

CREATE TABLE IF NOT EXISTS `tb_licencias` (
  `lic_id` int(3) NOT NULL AUTO_INCREMENT,
  `lic_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`lic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_licencias_beneficiario`
--

CREATE TABLE IF NOT EXISTS `tb_licencias_beneficiario` (
  `lb_id` int(5) NOT NULL AUTO_INCREMENT,
  `lb_dp_id` int(6) NOT NULL,
  `lb_lic_id` int(3) NOT NULL,
  `lb_vencimiento` date NOT NULL,
  `lb_emisora` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `lb_provincia` int(3) NOT NULL,
  `lb_municipio` int(5) NOT NULL,
  PRIMARY KEY (`lb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=336 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_localidades`
--

CREATE TABLE IF NOT EXISTS `tb_localidades` (
  `lo_id` int(2) NOT NULL AUTO_INCREMENT,
  `lo_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `lo_depto` int(2) NOT NULL,
  PRIMARY KEY (`lo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_localidades_pais`
--

CREATE TABLE IF NOT EXISTS `tb_localidades_pais` (
  `loc_id` int(4) NOT NULL,
  `departamento_id` int(3) NOT NULL,
  `loc_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `loc_pr_id` int(2) NOT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_manejo_pc`
--

CREATE TABLE IF NOT EXISTS `tb_manejo_pc` (
  `mp_id` int(1) NOT NULL AUTO_INCREMENT,
  `mp_name` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_material_paredes`
--

CREATE TABLE IF NOT EXISTS `tb_material_paredes` (
  `mpe_id` int(2) NOT NULL,
  `mpe_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mpe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_material_piso`
--

CREATE TABLE IF NOT EXISTS `tb_material_piso` (
  `mp_id` int(2) NOT NULL,
  `mp_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modalidad_cursado`
--

CREATE TABLE IF NOT EXISTS `tb_modalidad_cursado` (
  `mc_id` int(1) NOT NULL AUTO_INCREMENT,
  `mc_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mc_id`),
  KEY `mc_id` (`mc_id`),
  KEY `mc_id_2` (`mc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_motivo_credito`
--

CREATE TABLE IF NOT EXISTS `tb_motivo_credito` (
  `mc_id` int(4) NOT NULL AUTO_INCREMENT,
  `mc_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_motivo_llamado`
--

CREATE TABLE IF NOT EXISTS `tb_motivo_llamado` (
  `ml_id` int(2) NOT NULL AUTO_INCREMENT,
  `ml_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ml_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_municipios`
--

CREATE TABLE IF NOT EXISTS `tb_municipios` (
  `mun_id` int(3) NOT NULL AUTO_INCREMENT,
  `mun_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`mun_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_nivel_educativo`
--

CREATE TABLE IF NOT EXISTS `tb_nivel_educativo` (
  `ne_id` int(2) NOT NULL AUTO_INCREMENT,
  `ne_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ne_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_nivel_estudios_social`
--

CREATE TABLE IF NOT EXISTS `tb_nivel_estudios_social` (
  `nes_id` int(2) NOT NULL,
  `nes_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_niveles_idiomas`
--

CREATE TABLE IF NOT EXISTS `tb_niveles_idiomas` (
  `ni_id` int(2) NOT NULL AUTO_INCREMENT,
  `ni_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ni_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obras_sociales`
--

CREATE TABLE IF NOT EXISTS `tb_obras_sociales` (
  `os_id` int(4) NOT NULL AUTO_INCREMENT,
  `os_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `os_location` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `os_telefonos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`os_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_organizaciones`
--

CREATE TABLE IF NOT EXISTS `tb_organizaciones` (
  `or_id` int(3) NOT NULL AUTO_INCREMENT,
  `or_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `or_depto_provincial` int(2) NOT NULL,
  `or_localidad` int(3) NOT NULL,
  `or_calle` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `or_altura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `or_piso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `or_depto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `or_cuit` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`or_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_origen_discapacidad`
--

CREATE TABLE IF NOT EXISTS `tb_origen_discapacidad` (
  `od_id` int(2) NOT NULL AUTO_INCREMENT,
  `od_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`od_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_paises`
--

CREATE TABLE IF NOT EXISTS `tb_paises` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) DEFAULT NULL,
  `pa_name` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`pa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_parentesco`
--

CREATE TABLE IF NOT EXISTS `tb_parentesco` (
  `par_id` int(3) NOT NULL AUTO_INCREMENT,
  `par_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`par_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_postulaciones_cursos`
--

CREATE TABLE IF NOT EXISTS `tb_postulaciones_cursos` (
  `pc_id` int(6) NOT NULL AUTO_INCREMENT,
  `pc_dp_id` int(6) NOT NULL,
  `pc_curso` int(4) NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3516 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_postulaciones_laborales`
--

CREATE TABLE IF NOT EXISTS `tb_postulaciones_laborales` (
  `pl_id` int(6) NOT NULL AUTO_INCREMENT,
  `pl_dp_id` int(6) NOT NULL,
  `pl_actividad` int(4) NOT NULL,
  `pl_puesto` int(4) NOT NULL,
  PRIMARY KEY (`pl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8503 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_provincias`
--

CREATE TABLE IF NOT EXISTS `tb_provincias` (
  `pr_id` int(2) NOT NULL,
  `pr_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pueblos_originarios`
--

CREATE TABLE IF NOT EXISTS `tb_pueblos_originarios` (
  `po_id` int(2) NOT NULL AUTO_INCREMENT,
  `po_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_puestos`
--

CREATE TABLE IF NOT EXISTS `tb_puestos` (
  `pu_id` int(3) NOT NULL AUTO_INCREMENT,
  `pu_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pu_cat` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=612 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_red_contencion`
--

CREATE TABLE IF NOT EXISTS `tb_red_contencion` (
  `rc_id` int(2) NOT NULL AUTO_INCREMENT,
  `rc_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_referentes_beneficiarios`
--

CREATE TABLE IF NOT EXISTS `tb_referentes_beneficiarios` (
  `rb_id` int(6) NOT NULL AUTO_INCREMENT,
  `rb_dp_id` int(6) NOT NULL,
  `rb_dpr_id` int(6) NOT NULL,
  PRIMARY KEY (`rb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_relacion_danmificado`
--

CREATE TABLE IF NOT EXISTS `tb_relacion_danmificado` (
  `rd_id` int(2) NOT NULL AUTO_INCREMENT,
  `rd_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_riesgo_102`
--

CREATE TABLE IF NOT EXISTS `tb_riesgo_102` (
  `er_id` int(2) NOT NULL AUTO_INCREMENT,
  `er_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`er_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rubros`
--

CREATE TABLE IF NOT EXISTS `tb_rubros` (
  `ru_id` int(2) NOT NULL AUTO_INCREMENT,
  `ru_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ru_id`),
  KEY `ru_id` (`ru_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salas_cdi`
--

CREATE TABLE IF NOT EXISTS `tb_salas_cdi` (
  `sal_id` int(2) NOT NULL AUTO_INCREMENT,
  `sal_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sexos`
--

CREATE TABLE IF NOT EXISTS `tb_sexos` (
  `sx_id` int(1) NOT NULL AUTO_INCREMENT,
  `sx_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sx_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sistemas`
--

CREATE TABLE IF NOT EXISTS `tb_sistemas` (
  `sis_id` int(2) NOT NULL AUTO_INCREMENT,
  `sis_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situacion_discapacidad`
--

CREATE TABLE IF NOT EXISTS `tb_situacion_discapacidad` (
  `sd_id` int(2) NOT NULL AUTO_INCREMENT,
  `sd_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situacion_laboral`
--

CREATE TABLE IF NOT EXISTS `tb_situacion_laboral` (
  `sl_id` int(1) NOT NULL AUTO_INCREMENT,
  `sl_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situaciones_curso`
--

CREATE TABLE IF NOT EXISTS `tb_situaciones_curso` (
  `sc_id` int(2) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situaciones_violencia`
--

CREATE TABLE IF NOT EXISTS `tb_situaciones_violencia` (
  `sv_llamada_id` int(9) NOT NULL,
  `sv_dp_id` int(9) NOT NULL,
  `sv_vinculo` int(2) NOT NULL,
  `sv_convive` int(1) NOT NULL DEFAULT '0',
  `sv_red` int(2) NOT NULL,
  `sv_frecuencia` int(2) NOT NULL,
  `sv_tiempo` int(2) NOT NULL,
  PRIMARY KEY (`sv_llamada_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_subrubros`
--

CREATE TABLE IF NOT EXISTS `tb_subrubros` (
  `sr_id` int(5) NOT NULL AUTO_INCREMENT,
  `sr_ru_id` int(3) NOT NULL,
  `sr_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tabulaciones`
--

CREATE TABLE IF NOT EXISTS `tb_tabulaciones` (
  `tab_id` int(6) NOT NULL AUTO_INCREMENT,
  `tab_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tab_value` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tab_table` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tab_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_terminalidad`
--

CREATE TABLE IF NOT EXISTS `tb_terminalidad` (
  `ter_id` int(2) NOT NULL AUTO_INCREMENT,
  `ter_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tiempo_maltrato`
--

CREATE TABLE IF NOT EXISTS `tb_tiempo_maltrato` (
  `tm_id` int(2) NOT NULL AUTO_INCREMENT,
  `tm_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_asociacion`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_asociacion` (
  `ta_id` int(3) NOT NULL AUTO_INCREMENT,
  `ta_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_capacitaciones`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_capacitaciones` (
  `tc_id` int(4) NOT NULL AUTO_INCREMENT,
  `tc_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_casa`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_casa` (
  `tc_id` int(2) NOT NULL,
  `tc_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_discapacidad`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_discapacidad` (
  `td_id` int(2) NOT NULL AUTO_INCREMENT,
  `td_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`td_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_emprendimiento`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_emprendimiento` (
  `te_id` int(2) NOT NULL AUTO_INCREMENT,
  `te_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`te_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_eventos`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_eventos` (
  `te_id` int(2) NOT NULL AUTO_INCREMENT,
  `te_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`te_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_familia`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_familia` (
  `tf_id` int(2) NOT NULL AUTO_INCREMENT,
  `tf_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_ingresos`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_ingresos` (
  `ti_id` int(3) NOT NULL AUTO_INCREMENT,
  `ti_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_iva`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_iva` (
  `ti_id` int(2) NOT NULL,
  `ti_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_locacion`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_locacion` (
  `tl_id` int(2) NOT NULL AUTO_INCREMENT,
  `tl_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_nacionalidad`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_nacionalidad` (
  `tn_id` int(2) NOT NULL AUTO_INCREMENT,
  `tn_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_propiedad`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_propiedad` (
  `tp_id` int(2) NOT NULL,
  `tp_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_punto_venta`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_punto_venta` (
  `tpv_id` int(2) NOT NULL AUTO_INCREMENT,
  `tpv_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tpv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_retraso`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_retraso` (
  `tr_id` int(2) NOT NULL AUTO_INCREMENT,
  `tr_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_trabajo`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_trabajo` (
  `tt_id` int(2) NOT NULL AUTO_INCREMENT,
  `tt_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_usuarios` (
  `tus_id` int(2) NOT NULL AUTO_INCREMENT,
  `tus_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  KEY `tus_ud` (`tus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_violencia`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_violencia` (
  `tv_id` int(2) NOT NULL AUTO_INCREMENT,
  `tv_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tv_tipo` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_titulo_secundario`
--

CREATE TABLE IF NOT EXISTS `tb_titulo_secundario` (
  `ts_id` int(4) NOT NULL AUTO_INCREMENT,
  `ts_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ts_nivel` int(2) NOT NULL,
  PRIMARY KEY (`ts_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=907 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_transporte_disc`
--

CREATE TABLE IF NOT EXISTS `tb_transporte_disc` (
  `td_id` int(2) NOT NULL AUTO_INCREMENT,
  `td_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`td_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_turnos_cdi`
--

CREATE TABLE IF NOT EXISTS `tb_turnos_cdi` (
  `tur_id` int(2) NOT NULL AUTO_INCREMENT,
  `tur_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`tur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ubicaciones_urbanas`
--

CREATE TABLE IF NOT EXISTS `tb_ubicaciones_urbanas` (
  `uu_id` int(2) NOT NULL,
  `uu_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`uu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ultimo_domicilio`
--

CREATE TABLE IF NOT EXISTS `tb_ultimo_domicilio` (
  `ud_dp_id` int(6) NOT NULL,
  `ud_pais` int(4) NOT NULL,
  `ud_provincia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ud_localidad` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ud_domicilio` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ud_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `us_id` int(3) NOT NULL AUTO_INCREMENT,
  `us_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `us_pass` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=97 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios_sistemas`
--

CREATE TABLE IF NOT EXISTS `tb_usuarios_sistemas` (
  `uss_id` int(5) NOT NULL AUTO_INCREMENT,
  `uss_us_id` int(3) NOT NULL,
  `uss_sistema` int(2) NOT NULL,
  `uss_tipo` int(2) NOT NULL,
  `uss_conectado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uss_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=111 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vinculo_agresor`
--

CREATE TABLE IF NOT EXISTS `tb_vinculo_agresor` (
  `va_id` int(2) NOT NULL AUTO_INCREMENT,
  `va_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`va_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vive_beneficiario`
--

CREATE TABLE IF NOT EXISTS `tb_vive_beneficiario` (
  `vb_dp_id` int(6) NOT NULL,
  `vb_dv_id` int(2) NOT NULL,
  PRIMARY KEY (`vb_dp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_zonas`
--

CREATE TABLE IF NOT EXISTS `tb_zonas` (
  `zo_id` int(3) NOT NULL AUTO_INCREMENT,
  `zo_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`zo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
