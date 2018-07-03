-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2018 a las 13:56:49
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistem06_informes`
--
DROP DATABASE IF EXISTS `sistem06_informes`;
CREATE DATABASE IF NOT EXISTS `sistem06_informes` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sistem06_informes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_102_llamados`
--

CREATE TABLE `tb_102_llamados` (
  `la_102_id` int(9) NOT NULL,
  `la_102_us` int(6) NOT NULL,
  `la_102_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `la_102_tipo_llamado` int(2) NOT NULL,
  `la_102_relacion` int(2) NOT NULL,
  `la_clave_ex` int(6) NOT NULL,
  `la_dp_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_102_llamados_dp`
--

CREATE TABLE `tb_102_llamados_dp` (
  `dp_102_id` int(6) NOT NULL,
  `dp_102_apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_parentesco` int(2) NOT NULL,
  `dp_102_tel1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_tel2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dp_102_mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_102_resguardo`
--

CREATE TABLE `tb_102_resguardo` (
  `res_id` int(2) NOT NULL,
  `res_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_acceso_agua`
--

CREATE TABLE `tb_acceso_agua` (
  `aa_id` int(2) NOT NULL,
  `aa_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_actividades`
--

CREATE TABLE `tb_actividades` (
  `act_id` int(3) NOT NULL,
  `act_name` varchar(120) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_antecedentes_laborales`
--

CREATE TABLE `tb_antecedentes_laborales` (
  `al_id` int(9) NOT NULL,
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
  `al_referencias` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areas_ur`
--

CREATE TABLE `tb_areas_ur` (
  `au_id` int(1) NOT NULL,
  `au_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asistente_disc`
--

CREATE TABLE `tb_asistente_disc` (
  `ad_id` int(2) NOT NULL,
  `ad_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_asociaciones`
--

CREATE TABLE `tb_asociaciones` (
  `as_id` int(3) NOT NULL,
  `as_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ayudas_discapacidad`
--

CREATE TABLE `tb_ayudas_discapacidad` (
  `ad_id` int(6) NOT NULL,
  `ad_dp_id` int(6) NOT NULL,
  `ad_dat_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_banios`
--

CREATE TABLE `tb_banios` (
  `ban_id` int(2) NOT NULL,
  `ban_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_barrios`
--

CREATE TABLE `tb_barrios` (
  `bar_id` int(2) NOT NULL,
  `bar_name` varchar(50) NOT NULL,
  `bar_cod_muni` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_barrios_coordenadas`
--

CREATE TABLE `tb_barrios_coordenadas` (
  `bc_id` int(6) NOT NULL,
  `bc_bar_id` int(4) NOT NULL,
  `bc_lng` decimal(17,15) NOT NULL,
  `bc_lat` decimal(17,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_barrios_gloc`
--

CREATE TABLE `tb_barrios_gloc` (
  `bar_id` int(4) NOT NULL,
  `bar_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `bar_min_lng` decimal(17,15) NOT NULL,
  `bar_max_lng` decimal(17,15) NOT NULL,
  `bar_min_lat` decimal(17,15) NOT NULL,
  `bar_max_lat` decimal(17,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiarios_sistema`
--

CREATE TABLE `tb_beneficiarios_sistema` (
  `bs_id` int(9) NOT NULL,
  `bs_dp_id` int(6) NOT NULL,
  `bs_dni` int(8) NOT NULL,
  `bs_sis` int(2) NOT NULL,
  `bs_sis_ini` int(2) NOT NULL,
  `bs_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bs_us` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiario_curso_externo`
--

CREATE TABLE `tb_beneficiario_curso_externo` (
  `bce_id` int(6) NOT NULL,
  `bce_ce_id` int(3) NOT NULL,
  `bce_dp_id` int(9) NOT NULL,
  `bce_year` int(4) NOT NULL,
  `bce_situacion` int(2) NOT NULL,
  `bce_certificacion` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiario_formacion_profesional`
--

CREATE TABLE `tb_beneficiario_formacion_profesional` (
  `bfp_id` int(6) NOT NULL,
  `bfp_dp_id` int(6) NOT NULL,
  `bfp_situacion` int(2) NOT NULL,
  `bfp_fp_id` int(3) NOT NULL,
  `bfp_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_beneficiario_idioma`
--

CREATE TABLE `tb_beneficiario_idioma` (
  `bi_id` int(6) NOT NULL,
  `bi_dp_id` int(6) NOT NULL,
  `bi_idi_id` int(2) NOT NULL,
  `bi_nivel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caats`
--

CREATE TABLE `tb_caats` (
  `ca_id` int(2) NOT NULL,
  `ca_name` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ca_lng` decimal(17,15) NOT NULL,
  `ca_lat` decimal(17,15) NOT NULL,
  `ca_min_lng` decimal(17,15) NOT NULL,
  `ca_max_lng` decimal(17,15) NOT NULL,
  `ca_min_lat` decimal(17,15) NOT NULL,
  `ca_max_lat` decimal(17,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_caats_coordenadas`
--

CREATE TABLE `tb_caats_coordenadas` (
  `cc_id` int(6) NOT NULL,
  `cc_ca_id` int(3) NOT NULL,
  `cc_lng` decimal(17,15) NOT NULL,
  `cc_lat` decimal(17,15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_calle`
--

CREATE TABLE `tb_calle` (
  `ca_id` int(5) NOT NULL,
  `ca_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ca_cod_muni` int(6) NOT NULL,
  `ca_gm` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carnets`
--

CREATE TABLE `tb_carnets` (
  `car_id` int(2) NOT NULL,
  `car_name` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `car_descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `cat_id` int(3) NOT NULL,
  `cat_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cdi`
--

CREATE TABLE `tb_cdi` (
  `cdi_id` int(2) NOT NULL,
  `cdi_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_combustible_cocina`
--

CREATE TABLE `tb_combustible_cocina` (
  `coco_id` int(2) NOT NULL,
  `coco_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_comercios`
--

CREATE TABLE `tb_comercios` (
  `co_id` int(6) NOT NULL,
  `co_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `co_depto_provincial` int(3) NOT NULL,
  `co_localidad` int(3) NOT NULL,
  `co_calle` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `co_altura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `co_piso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `co_depto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `co_cuit` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `co_dp_id` int(6) NOT NULL,
  `co_tipo` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_condiciones_organizacion`
--

CREATE TABLE `tb_condiciones_organizacion` (
  `co_id` int(2) NOT NULL,
  `co_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_condicion_ocupacion`
--

CREATE TABLE `tb_condicion_ocupacion` (
  `co_id` int(2) NOT NULL,
  `co_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_condicion_uso`
--

CREATE TABLE `tb_condicion_uso` (
  `cu_id` int(2) NOT NULL,
  `cu_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cubierta_techo`
--

CREATE TABLE `tb_cubierta_techo` (
  `ct_id` int(2) NOT NULL,
  `ct_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cursos_externos`
--

CREATE TABLE `tb_cursos_externos` (
  `ce_id` int(3) NOT NULL,
  `ce_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ce_dictado` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ce_ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_educativos`
--

CREATE TABLE `tb_datos_educativos` (
  `de_dp_id` int(9) NOT NULL,
  `de_idioma` int(2) NOT NULL,
  `de_continuar` int(1) DEFAULT '1',
  `de_pc` int(1) NOT NULL,
  `de_carnet` int(1) NOT NULL DEFAULT '0',
  `de_tipo_carnet` int(2) NOT NULL,
  `de_vencimiento_carnet` date NOT NULL,
  `de_libreta` int(1) NOT NULL DEFAULT '0',
  `de_vencimiento_libreta` date NOT NULL,
  `de_libreta_construccion` int(1) NOT NULL DEFAULT '0',
  `de_vencimiento_libreta_construccion` date NOT NULL,
  `de_observaciones` blob NOT NULL,
  `de_fecha_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_educativos_social`
--

CREATE TABLE `tb_datos_educativos_social` (
  `des_dp_id` int(6) NOT NULL,
  `des_nivel` int(2) NOT NULL,
  `des_asiste` int(1) NOT NULL DEFAULT '0',
  `des_establecimiento` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `des_tipo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_emprendimiento`
--

CREATE TABLE `tb_datos_emprendimiento` (
  `em_id` int(6) NOT NULL,
  `em_dp_id` int(6) NOT NULL,
  `em_nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `em_rubro` int(2) NOT NULL,
  `em_subrubro` int(3) NOT NULL,
  `em_subrubro_old` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `em_descripcion` blob NOT NULL,
  `em_fecha_inicio` date DEFAULT NULL,
  `em_domicilio` int(6) NOT NULL,
  `em_tipo_lugar` int(2) NOT NULL,
  `em_espacio` int(1) NOT NULL,
  `em_motivo_espacio` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `em_tipo_empresa` int(1) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_laborales_actuales`
--

CREATE TABLE `tb_datos_laborales_actuales` (
  `dla_dp_id` int(9) NOT NULL,
  `dla_actividad` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `dla_direccion` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_nivel_educativo`
--

CREATE TABLE `tb_datos_nivel_educativo` (
  `dne_id` int(9) NOT NULL,
  `dne_dp_id` int(6) NOT NULL,
  `dne_nivel` int(2) NOT NULL,
  `dne_termino` int(2) NOT NULL,
  `dne_modalidad` int(2) NOT NULL,
  `dne_titulo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_personales`
--

CREATE TABLE `tb_datos_personales` (
  `dp_id` int(6) NOT NULL,
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
  `fecha_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_personales_referente`
--

CREATE TABLE `tb_datos_personales_referente` (
  `dpr_id` int(6) NOT NULL,
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
  `dpr_edificio` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_datos_salud`
--

CREATE TABLE `tb_datos_salud` (
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
  `ds_subsidios` varchar(120) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamentos`
--

CREATE TABLE `tb_departamentos` (
  `dep_id` int(2) NOT NULL,
  `dep_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dep_mostrar` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_derivaciones_102`
--

CREATE TABLE `tb_derivaciones_102` (
  `der_id` int(2) NOT NULL,
  `der_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `der_es` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_desagues`
--

CREATE TABLE `tb_desagues` (
  `de_id` int(2) NOT NULL,
  `de_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_discapacidad_ayuda_tecnica`
--

CREATE TABLE `tb_discapacidad_ayuda_tecnica` (
  `dat_id` int(2) NOT NULL,
  `dat_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dat_td_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_docs`
--

CREATE TABLE `tb_docs` (
  `do_id` int(1) NOT NULL,
  `do_name` varchar(3) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_domicilios`
--

CREATE TABLE `tb_domicilios` (
  `dom_id` int(9) NOT NULL,
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
  `dom_emp` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_donde_vive`
--

CREATE TABLE `tb_donde_vive` (
  `dv_id` int(2) NOT NULL,
  `dv_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_edad_padres`
--

CREATE TABLE `tb_edad_padres` (
  `ep_id` int(2) NOT NULL,
  `ep_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_educacion_actual`
--

CREATE TABLE `tb_educacion_actual` (
  `ea_id` int(2) NOT NULL,
  `ea_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedores_asociados`
--

CREATE TABLE `tb_emprendedores_asociados` (
  `eas_id` int(6) NOT NULL,
  `eas_dp_id` int(6) NOT NULL,
  `eas_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_capacitaciones`
--

CREATE TABLE `tb_emprendedor_capacitaciones` (
  `ec_id` int(6) NOT NULL,
  `ec_dp_id` int(6) NOT NULL,
  `ec_or_id` int(6) NOT NULL,
  `ec_motivo` int(4) NOT NULL,
  `ec_anio` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_credito`
--

CREATE TABLE `tb_emprendedor_credito` (
  `ec_id` int(6) NOT NULL,
  `ec_dp_id` int(6) NOT NULL,
  `ec_or` int(4) NOT NULL,
  `ec_mo` int(4) NOT NULL,
  `ec_vigente` varchar(2) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO',
  `ec_monto` int(11) DEFAULT NULL,
  `ec_año` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_credito_nec`
--

CREATE TABLE `tb_emprendedor_credito_nec` (
  `ecn_id` int(6) NOT NULL,
  `ecn_dp_id` int(6) NOT NULL,
  `ecn_rubro` int(4) NOT NULL,
  `ecn_rubro_cap` int(4) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_organizacion`
--

CREATE TABLE `tb_emprendedor_organizacion` (
  `eo_id` int(6) NOT NULL,
  `eo_dp_id` int(6) NOT NULL,
  `eo_or_id` int(6) NOT NULL,
  `eo_fa_id` int(3) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_emprendedor_ventas`
--

CREATE TABLE `tb_emprendedor_ventas` (
  `ev_id` int(6) NOT NULL,
  `ev_dp_id` int(4) NOT NULL,
  `ev_tipo` int(2) NOT NULL,
  `ev_det_tipo` int(4) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encuestas`
--

CREATE TABLE `tb_encuestas` (
  `enc_id` int(9) NOT NULL,
  `enc_caat` int(2) NOT NULL,
  `enc_usuario` int(3) NOT NULL,
  `enc_hogar` int(9) NOT NULL,
  `enc_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_entrevista`
--

CREATE TABLE `tb_entrevista` (
  `ent_id` int(9) NOT NULL,
  `ent_sis` int(2) NOT NULL,
  `ent_us` int(3) NOT NULL,
  `ent_fin` int(1) NOT NULL,
  `ent_dp_id` int(6) NOT NULL,
  `ent_ten_id` int(11) NOT NULL COMMENT 'tipo de entrevista, ej: DATOS PERSONALES',
  `ent_proxima` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ent_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_equipamiento_hogar`
--

CREATE TABLE `tb_equipamiento_hogar` (
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
  `eq_pc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_afip`
--

CREATE TABLE `tb_estado_afip` (
  `ea_dp_id` int(6) NOT NULL,
  `ea_tipo_relacion` int(2) NOT NULL,
  `ea_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_civil`
--

CREATE TABLE `tb_estado_civil` (
  `ec_id` int(2) NOT NULL,
  `ec_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estado_titulo`
--

CREATE TABLE `tb_estado_titulo` (
  `et_id` int(1) NOT NULL,
  `et_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_eventos`
--

CREATE TABLE `tb_eventos` (
  `ev_id` int(9) NOT NULL,
  `ev_fecha` date NOT NULL,
  `ev_hora` time NOT NULL,
  `ev_usuario` int(6) NOT NULL,
  `ev_domicilio` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `ev_condicion_org` int(2) NOT NULL,
  `ev_tipo` int(2) NOT NULL,
  `ev_observaciones` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_familiares`
--

CREATE TABLE `tb_familiares` (
  `fam_id` int(6) NOT NULL,
  `fam_dp_id` int(6) NOT NULL,
  `fam_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fam_parentesco` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ferias`
--

CREATE TABLE `tb_ferias` (
  `fe_id` int(2) NOT NULL,
  `fe_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fe_municipal` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_formacion_profesional`
--

CREATE TABLE `tb_formacion_profesional` (
  `fp_id` int(4) NOT NULL,
  `fp_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fp_dictado` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_forma_asociacion`
--

CREATE TABLE `tb_forma_asociacion` (
  `fa_id` int(2) NOT NULL,
  `fa_name` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_frecuencia_maltrato`
--

CREATE TABLE `tb_frecuencia_maltrato` (
  `fm_id` int(2) NOT NULL,
  `fm_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_fuente_agua`
--

CREATE TABLE `tb_fuente_agua` (
  `fa_id` int(2) NOT NULL,
  `fa_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historial`
--

CREATE TABLE `tb_historial` (
  `hi_id` int(9) NOT NULL,
  `hi_us_id` int(6) NOT NULL,
  `hi_dp_id` int(6) NOT NULL,
  `hi_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hi_detalle` varchar(120) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historial_tablas`
--

CREATE TABLE `tb_historial_tablas` (
  `ht_id` int(6) NOT NULL,
  `ht_us` int(6) NOT NULL,
  `ht_tabla` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ht_item` int(6) NOT NULL,
  `ht_motivo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ht_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar`
--

CREATE TABLE `tb_hogar` (
  `ho_id` int(9) NOT NULL,
  `ho_dom_id` int(9) NOT NULL,
  `ho_inicio` date NOT NULL,
  `ho_viviendas_lote` int(2) NOT NULL,
  `ho_vivienda_lote_nro` int(2) NOT NULL,
  `ho_hogares_lote` int(2) NOT NULL,
  `ho_hogar_lote_nro` int(2) NOT NULL,
  `ho_tel_ref` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ho_movil_ref` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ho_mail_ref` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_beneficiario`
--

CREATE TABLE `tb_hogar_beneficiario` (
  `hb_id` int(9) NOT NULL,
  `hb_ho_id` int(9) NOT NULL,
  `hb_dp_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_caracteristicas`
--

CREATE TABLE `tb_hogar_caracteristicas` (
  `hc_ho_id` int(6) NOT NULL,
  `hc_tipo_familia` int(2) NOT NULL,
  `hc_edad_padres` int(2) NOT NULL,
  `hc_ingresos_importes` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_general`
--

CREATE TABLE `tb_hogar_general` (
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
  `hog_sup_viv` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_propiedad`
--

CREATE TABLE `tb_hogar_propiedad` (
  `pr_ho_id` int(9) NOT NULL,
  `pr_propiedad` int(2) NOT NULL,
  `pr_ocupacion` int(2) NOT NULL,
  `pr_uso` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_hogar_servicios`
--

CREATE TABLE `tb_hogar_servicios` (
  `hos_ho_id` int(9) NOT NULL,
  `hos_electricidad` int(1) NOT NULL,
  `hos_telefono` int(1) NOT NULL,
  `hos_acceso_agua` int(2) NOT NULL,
  `hos_fuente_agua` int(2) NOT NULL,
  `hos_combustible_cocina` int(2) NOT NULL,
  `hos_combustible_calefaccion` int(2) NOT NULL,
  `hos_desague` int(2) NOT NULL,
  `hos_banio` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_idiomas`
--

CREATE TABLE `tb_idiomas` (
  `idi_id` int(2) NOT NULL,
  `idi_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_imagenes`
--

CREATE TABLE `tb_imagenes` (
  `img_id` int(9) NOT NULL,
  `img_dp_id` int(6) NOT NULL,
  `img_dni_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `img_front` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informes_listado`
--

CREATE TABLE `tb_informes_listado` (
  `inl_id` int(6) NOT NULL,
  `inl_titulo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `inl_autor` int(3) NOT NULL,
  `inl_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inl_estado` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informes_listado_detalles`
--

CREATE TABLE `tb_informes_listado_detalles` (
  `ild_id` int(6) NOT NULL,
  `ild_inl_id` int(6) NOT NULL,
  `ild_tab_id` int(6) NOT NULL,
  `ild_values` varchar(240) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informes_listado_items`
--

CREATE TABLE `tb_informes_listado_items` (
  `ili_id` int(6) NOT NULL,
  `ili_inl_id` int(6) NOT NULL,
  `ili_item` int(4) NOT NULL,
  `ili_tabla` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ili_variante` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos`
--

CREATE TABLE `tb_ingresos` (
  `in_dp_id` int(6) NOT NULL,
  `in_por` int(3) NOT NULL,
  `in_efector` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `in_efector_expediente` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos_hogar`
--

CREATE TABLE `tb_ingresos_hogar` (
  `ih_id` int(6) NOT NULL,
  `ih_ho_id` int(6) NOT NULL,
  `ih_ti_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos_importes`
--

CREATE TABLE `tb_ingresos_importes` (
  `ii_id` int(2) NOT NULL,
  `ii_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ingresos_otros`
--

CREATE TABLE `tb_ingresos_otros` (
  `io_id` int(6) NOT NULL,
  `io_dp_id` int(6) NOT NULL,
  `io_ti_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inscriptos_cdi`
--

CREATE TABLE `tb_inscriptos_cdi` (
  `ins_id` int(6) NOT NULL,
  `ins_dp_id` int(6) NOT NULL,
  `ins_cdi` int(2) NOT NULL,
  `ins_sala` int(2) NOT NULL,
  `ins_turno` int(2) NOT NULL,
  `ins_motivo` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_instituciones_cpa`
--

CREATE TABLE `tb_instituciones_cpa` (
  `ins_id` int(4) NOT NULL,
  `ins_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ins_direccion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ins_contacto` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ins_telefono` int(12) NOT NULL,
  `ins_mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_institucion_coorg`
--

CREATE TABLE `tb_institucion_coorg` (
  `ic_id` int(6) NOT NULL,
  `ic_ins_id` int(4) NOT NULL,
  `ic_ev_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_institucion_participantes`
--

CREATE TABLE `tb_institucion_participantes` (
  `ip_id` int(4) NOT NULL,
  `ip_ev_id` int(4) NOT NULL,
  `ip_ins_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_licencias`
--

CREATE TABLE `tb_licencias` (
  `lic_id` int(3) NOT NULL,
  `lic_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_licencias_beneficiario`
--

CREATE TABLE `tb_licencias_beneficiario` (
  `lb_id` int(5) NOT NULL,
  `lb_dp_id` int(6) NOT NULL,
  `lb_lic_id` int(3) NOT NULL,
  `lb_vencimiento` date NOT NULL,
  `lb_emisora` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `lb_provincia` int(3) NOT NULL,
  `lb_municipio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_localidades`
--

CREATE TABLE `tb_localidades` (
  `lo_id` int(2) NOT NULL,
  `lo_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `lo_depto` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_localidades_pais`
--

CREATE TABLE `tb_localidades_pais` (
  `loc_id` int(4) NOT NULL,
  `departamento_id` int(3) NOT NULL,
  `loc_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `loc_pr_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_manejo_pc`
--

CREATE TABLE `tb_manejo_pc` (
  `mp_id` int(1) NOT NULL,
  `mp_name` varchar(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_material_paredes`
--

CREATE TABLE `tb_material_paredes` (
  `mpe_id` int(2) NOT NULL,
  `mpe_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_material_piso`
--

CREATE TABLE `tb_material_piso` (
  `mp_id` int(2) NOT NULL,
  `mp_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_modalidad_cursado`
--

CREATE TABLE `tb_modalidad_cursado` (
  `mc_id` int(1) NOT NULL,
  `mc_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_motivo_credito`
--

CREATE TABLE `tb_motivo_credito` (
  `mc_id` int(4) NOT NULL,
  `mc_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_motivo_llamado`
--

CREATE TABLE `tb_motivo_llamado` (
  `ml_id` int(2) NOT NULL,
  `ml_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_municipios`
--

CREATE TABLE `tb_municipios` (
  `mun_id` int(3) NOT NULL,
  `mun_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_niveles_idiomas`
--

CREATE TABLE `tb_niveles_idiomas` (
  `ni_id` int(2) NOT NULL,
  `ni_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_nivel_educativo`
--

CREATE TABLE `tb_nivel_educativo` (
  `ne_id` int(2) NOT NULL,
  `ne_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_nivel_estudios_social`
--

CREATE TABLE `tb_nivel_estudios_social` (
  `nes_id` int(2) NOT NULL,
  `nes_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obras_sociales`
--

CREATE TABLE `tb_obras_sociales` (
  `os_id` int(4) NOT NULL,
  `os_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `os_location` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `os_telefonos` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_organizaciones`
--

CREATE TABLE `tb_organizaciones` (
  `or_id` int(3) NOT NULL,
  `or_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `or_depto_provincial` int(2) NOT NULL,
  `or_localidad` int(3) NOT NULL,
  `or_calle` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `or_altura` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `or_piso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `or_depto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `or_cuit` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_origen_discapacidad`
--

CREATE TABLE `tb_origen_discapacidad` (
  `od_id` int(2) NOT NULL,
  `od_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_paises`
--

CREATE TABLE `tb_paises` (
  `pa_id` int(11) NOT NULL,
  `iso` char(2) DEFAULT NULL,
  `pa_name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_parentesco`
--

CREATE TABLE `tb_parentesco` (
  `par_id` int(3) NOT NULL,
  `par_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_postulaciones_cursos`
--

CREATE TABLE `tb_postulaciones_cursos` (
  `pc_id` int(6) NOT NULL,
  `pc_dp_id` int(6) NOT NULL,
  `pc_curso` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_postulaciones_laborales`
--

CREATE TABLE `tb_postulaciones_laborales` (
  `pl_id` int(6) NOT NULL,
  `pl_dp_id` int(6) NOT NULL,
  `pl_actividad` int(4) NOT NULL,
  `pl_puesto` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_provincias`
--

CREATE TABLE `tb_provincias` (
  `pr_id` int(2) NOT NULL,
  `pr_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pueblos_originarios`
--

CREATE TABLE `tb_pueblos_originarios` (
  `po_id` int(2) NOT NULL,
  `po_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_puestos`
--

CREATE TABLE `tb_puestos` (
  `pu_id` int(3) NOT NULL,
  `pu_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pu_cat` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_red_contencion`
--

CREATE TABLE `tb_red_contencion` (
  `rc_id` int(2) NOT NULL,
  `rc_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_referentes_beneficiarios`
--

CREATE TABLE `tb_referentes_beneficiarios` (
  `rb_id` int(6) NOT NULL,
  `rb_dp_id` int(6) NOT NULL,
  `rb_dpr_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_relacion_danmificado`
--

CREATE TABLE `tb_relacion_danmificado` (
  `rd_id` int(2) NOT NULL,
  `rd_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_riesgo_102`
--

CREATE TABLE `tb_riesgo_102` (
  `er_id` int(2) NOT NULL,
  `er_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rubros`
--

CREATE TABLE `tb_rubros` (
  `ru_id` int(2) NOT NULL,
  `ru_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_salas_cdi`
--

CREATE TABLE `tb_salas_cdi` (
  `sal_id` int(2) NOT NULL,
  `sal_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sexos`
--

CREATE TABLE `tb_sexos` (
  `sx_id` int(1) NOT NULL,
  `sx_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_sistemas`
--

CREATE TABLE `tb_sistemas` (
  `sis_id` int(2) NOT NULL,
  `sis_name` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situaciones_curso`
--

CREATE TABLE `tb_situaciones_curso` (
  `sc_id` int(2) NOT NULL,
  `sc_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situaciones_violencia`
--

CREATE TABLE `tb_situaciones_violencia` (
  `sv_llamada_id` int(9) NOT NULL,
  `sv_dp_id` int(9) NOT NULL,
  `sv_vinculo` int(2) NOT NULL,
  `sv_convive` int(1) NOT NULL DEFAULT '0',
  `sv_red` int(2) NOT NULL,
  `sv_frecuencia` int(2) NOT NULL,
  `sv_tiempo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situacion_discapacidad`
--

CREATE TABLE `tb_situacion_discapacidad` (
  `sd_id` int(2) NOT NULL,
  `sd_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_situacion_laboral`
--

CREATE TABLE `tb_situacion_laboral` (
  `sl_id` int(1) NOT NULL,
  `sl_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_subrubros`
--

CREATE TABLE `tb_subrubros` (
  `sr_id` int(5) NOT NULL,
  `sr_ru_id` int(3) NOT NULL,
  `sr_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tabulaciones`
--

CREATE TABLE `tb_tabulaciones` (
  `tab_id` int(6) NOT NULL,
  `tab_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tab_value` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tab_table` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_terminalidad`
--

CREATE TABLE `tb_terminalidad` (
  `ter_id` int(2) NOT NULL,
  `ter_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tiempo_maltrato`
--

CREATE TABLE `tb_tiempo_maltrato` (
  `tm_id` int(2) NOT NULL,
  `tm_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_asociacion`
--

CREATE TABLE `tb_tipo_asociacion` (
  `ta_id` int(3) NOT NULL,
  `ta_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_capacitaciones`
--

CREATE TABLE `tb_tipo_capacitaciones` (
  `tc_id` int(4) NOT NULL,
  `tc_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_casa`
--

CREATE TABLE `tb_tipo_casa` (
  `tc_id` int(2) NOT NULL,
  `tc_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_discapacidad`
--

CREATE TABLE `tb_tipo_discapacidad` (
  `td_id` int(2) NOT NULL,
  `td_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_emprendimiento`
--

CREATE TABLE `tb_tipo_emprendimiento` (
  `te_id` int(2) NOT NULL,
  `te_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_entrevista`
--

CREATE TABLE `tb_tipo_entrevista` (
  `ten_id` int(11) NOT NULL,
  `ten_descripcion` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_eventos`
--

CREATE TABLE `tb_tipo_eventos` (
  `te_id` int(2) NOT NULL,
  `te_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_familia`
--

CREATE TABLE `tb_tipo_familia` (
  `tf_id` int(2) NOT NULL,
  `tf_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_ingresos`
--

CREATE TABLE `tb_tipo_ingresos` (
  `ti_id` int(3) NOT NULL,
  `ti_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_iva`
--

CREATE TABLE `tb_tipo_iva` (
  `ti_id` int(2) NOT NULL,
  `ti_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_locacion`
--

CREATE TABLE `tb_tipo_locacion` (
  `tl_id` int(2) NOT NULL,
  `tl_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_nacionalidad`
--

CREATE TABLE `tb_tipo_nacionalidad` (
  `tn_id` int(2) NOT NULL,
  `tn_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_propiedad`
--

CREATE TABLE `tb_tipo_propiedad` (
  `tp_id` int(2) NOT NULL,
  `tp_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_punto_venta`
--

CREATE TABLE `tb_tipo_punto_venta` (
  `tpv_id` int(2) NOT NULL,
  `tpv_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_retraso`
--

CREATE TABLE `tb_tipo_retraso` (
  `tr_id` int(2) NOT NULL,
  `tr_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_trabajo`
--

CREATE TABLE `tb_tipo_trabajo` (
  `tt_id` int(2) NOT NULL,
  `tt_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_usuarios`
--

CREATE TABLE `tb_tipo_usuarios` (
  `tus_id` int(2) NOT NULL,
  `tus_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipo_violencia`
--

CREATE TABLE `tb_tipo_violencia` (
  `tv_id` int(2) NOT NULL,
  `tv_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tv_tipo` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_titulo_secundario`
--

CREATE TABLE `tb_titulo_secundario` (
  `ts_id` int(4) NOT NULL,
  `ts_name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ts_nivel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_transporte_disc`
--

CREATE TABLE `tb_transporte_disc` (
  `td_id` int(2) NOT NULL,
  `td_name` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_turnos_cdi`
--

CREATE TABLE `tb_turnos_cdi` (
  `tur_id` int(2) NOT NULL,
  `tur_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ubicaciones_urbanas`
--

CREATE TABLE `tb_ubicaciones_urbanas` (
  `uu_id` int(2) NOT NULL,
  `uu_name` varchar(90) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ultimo_domicilio`
--

CREATE TABLE `tb_ultimo_domicilio` (
  `ud_dp_id` int(6) NOT NULL,
  `ud_pais` int(4) NOT NULL,
  `ud_provincia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ud_localidad` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ud_domicilio` varchar(120) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `us_id` int(3) NOT NULL,
  `us_name` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `us_pass` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios_sistemas`
--

CREATE TABLE `tb_usuarios_sistemas` (
  `uss_id` int(5) NOT NULL,
  `uss_us_id` int(3) NOT NULL,
  `uss_sistema` int(2) NOT NULL,
  `uss_tipo` int(2) NOT NULL,
  `uss_conectado` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vinculo_agresor`
--

CREATE TABLE `tb_vinculo_agresor` (
  `va_id` int(2) NOT NULL,
  `va_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_vive_beneficiario`
--

CREATE TABLE `tb_vive_beneficiario` (
  `vb_dp_id` int(6) NOT NULL,
  `vb_dv_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_zonas`
--

CREATE TABLE `tb_zonas` (
  `zo_id` int(3) NOT NULL,
  `zo_name` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_102_llamados`
--
ALTER TABLE `tb_102_llamados`
  ADD PRIMARY KEY (`la_102_id`);

--
-- Indices de la tabla `tb_102_llamados_dp`
--
ALTER TABLE `tb_102_llamados_dp`
  ADD PRIMARY KEY (`dp_102_id`);

--
-- Indices de la tabla `tb_102_resguardo`
--
ALTER TABLE `tb_102_resguardo`
  ADD PRIMARY KEY (`res_id`);

--
-- Indices de la tabla `tb_acceso_agua`
--
ALTER TABLE `tb_acceso_agua`
  ADD PRIMARY KEY (`aa_id`);

--
-- Indices de la tabla `tb_actividades`
--
ALTER TABLE `tb_actividades`
  ADD PRIMARY KEY (`act_id`);

--
-- Indices de la tabla `tb_antecedentes_laborales`
--
ALTER TABLE `tb_antecedentes_laborales`
  ADD PRIMARY KEY (`al_id`);

--
-- Indices de la tabla `tb_areas_ur`
--
ALTER TABLE `tb_areas_ur`
  ADD PRIMARY KEY (`au_id`);

--
-- Indices de la tabla `tb_asistente_disc`
--
ALTER TABLE `tb_asistente_disc`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indices de la tabla `tb_asociaciones`
--
ALTER TABLE `tb_asociaciones`
  ADD PRIMARY KEY (`as_id`);

--
-- Indices de la tabla `tb_ayudas_discapacidad`
--
ALTER TABLE `tb_ayudas_discapacidad`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indices de la tabla `tb_banios`
--
ALTER TABLE `tb_banios`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indices de la tabla `tb_barrios`
--
ALTER TABLE `tb_barrios`
  ADD PRIMARY KEY (`bar_id`);

--
-- Indices de la tabla `tb_barrios_coordenadas`
--
ALTER TABLE `tb_barrios_coordenadas`
  ADD PRIMARY KEY (`bc_id`);

--
-- Indices de la tabla `tb_barrios_gloc`
--
ALTER TABLE `tb_barrios_gloc`
  ADD PRIMARY KEY (`bar_id`);

--
-- Indices de la tabla `tb_beneficiarios_sistema`
--
ALTER TABLE `tb_beneficiarios_sistema`
  ADD PRIMARY KEY (`bs_id`);

--
-- Indices de la tabla `tb_beneficiario_curso_externo`
--
ALTER TABLE `tb_beneficiario_curso_externo`
  ADD PRIMARY KEY (`bce_id`),
  ADD KEY `bce_id` (`bce_id`),
  ADD KEY `bce_id_2` (`bce_id`);

--
-- Indices de la tabla `tb_beneficiario_formacion_profesional`
--
ALTER TABLE `tb_beneficiario_formacion_profesional`
  ADD PRIMARY KEY (`bfp_id`);

--
-- Indices de la tabla `tb_beneficiario_idioma`
--
ALTER TABLE `tb_beneficiario_idioma`
  ADD PRIMARY KEY (`bi_id`);

--
-- Indices de la tabla `tb_caats`
--
ALTER TABLE `tb_caats`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indices de la tabla `tb_caats_coordenadas`
--
ALTER TABLE `tb_caats_coordenadas`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indices de la tabla `tb_calle`
--
ALTER TABLE `tb_calle`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indices de la tabla `tb_carnets`
--
ALTER TABLE `tb_carnets`
  ADD PRIMARY KEY (`car_id`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `tb_cdi`
--
ALTER TABLE `tb_cdi`
  ADD PRIMARY KEY (`cdi_id`);

--
-- Indices de la tabla `tb_combustible_cocina`
--
ALTER TABLE `tb_combustible_cocina`
  ADD PRIMARY KEY (`coco_id`);

--
-- Indices de la tabla `tb_comercios`
--
ALTER TABLE `tb_comercios`
  ADD PRIMARY KEY (`co_id`);

--
-- Indices de la tabla `tb_condiciones_organizacion`
--
ALTER TABLE `tb_condiciones_organizacion`
  ADD PRIMARY KEY (`co_id`);

--
-- Indices de la tabla `tb_condicion_ocupacion`
--
ALTER TABLE `tb_condicion_ocupacion`
  ADD PRIMARY KEY (`co_id`);

--
-- Indices de la tabla `tb_condicion_uso`
--
ALTER TABLE `tb_condicion_uso`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indices de la tabla `tb_cubierta_techo`
--
ALTER TABLE `tb_cubierta_techo`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indices de la tabla `tb_cursos_externos`
--
ALTER TABLE `tb_cursos_externos`
  ADD PRIMARY KEY (`ce_id`);

--
-- Indices de la tabla `tb_datos_educativos`
--
ALTER TABLE `tb_datos_educativos`
  ADD PRIMARY KEY (`de_dp_id`);

--
-- Indices de la tabla `tb_datos_educativos_social`
--
ALTER TABLE `tb_datos_educativos_social`
  ADD PRIMARY KEY (`des_dp_id`);

--
-- Indices de la tabla `tb_datos_emprendimiento`
--
ALTER TABLE `tb_datos_emprendimiento`
  ADD PRIMARY KEY (`em_id`);

--
-- Indices de la tabla `tb_datos_laborales_actuales`
--
ALTER TABLE `tb_datos_laborales_actuales`
  ADD PRIMARY KEY (`dla_dp_id`);

--
-- Indices de la tabla `tb_datos_nivel_educativo`
--
ALTER TABLE `tb_datos_nivel_educativo`
  ADD PRIMARY KEY (`dne_id`);

--
-- Indices de la tabla `tb_datos_personales`
--
ALTER TABLE `tb_datos_personales`
  ADD PRIMARY KEY (`dp_busqueda`),
  ADD KEY `dp_id` (`dp_id`);

--
-- Indices de la tabla `tb_datos_personales_referente`
--
ALTER TABLE `tb_datos_personales_referente`
  ADD PRIMARY KEY (`dpr_id`);

--
-- Indices de la tabla `tb_datos_salud`
--
ALTER TABLE `tb_datos_salud`
  ADD PRIMARY KEY (`ds_dp_id`);

--
-- Indices de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indices de la tabla `tb_derivaciones_102`
--
ALTER TABLE `tb_derivaciones_102`
  ADD PRIMARY KEY (`der_id`);

--
-- Indices de la tabla `tb_desagues`
--
ALTER TABLE `tb_desagues`
  ADD PRIMARY KEY (`de_id`);

--
-- Indices de la tabla `tb_discapacidad_ayuda_tecnica`
--
ALTER TABLE `tb_discapacidad_ayuda_tecnica`
  ADD PRIMARY KEY (`dat_id`);

--
-- Indices de la tabla `tb_docs`
--
ALTER TABLE `tb_docs`
  ADD PRIMARY KEY (`do_id`);

--
-- Indices de la tabla `tb_domicilios`
--
ALTER TABLE `tb_domicilios`
  ADD PRIMARY KEY (`dom_id`);

--
-- Indices de la tabla `tb_donde_vive`
--
ALTER TABLE `tb_donde_vive`
  ADD PRIMARY KEY (`dv_id`);

--
-- Indices de la tabla `tb_edad_padres`
--
ALTER TABLE `tb_edad_padres`
  ADD PRIMARY KEY (`ep_id`);

--
-- Indices de la tabla `tb_educacion_actual`
--
ALTER TABLE `tb_educacion_actual`
  ADD PRIMARY KEY (`ea_id`);

--
-- Indices de la tabla `tb_emprendedores_asociados`
--
ALTER TABLE `tb_emprendedores_asociados`
  ADD PRIMARY KEY (`eas_id`);

--
-- Indices de la tabla `tb_emprendedor_capacitaciones`
--
ALTER TABLE `tb_emprendedor_capacitaciones`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indices de la tabla `tb_emprendedor_credito`
--
ALTER TABLE `tb_emprendedor_credito`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indices de la tabla `tb_emprendedor_credito_nec`
--
ALTER TABLE `tb_emprendedor_credito_nec`
  ADD PRIMARY KEY (`ecn_id`);

--
-- Indices de la tabla `tb_emprendedor_organizacion`
--
ALTER TABLE `tb_emprendedor_organizacion`
  ADD PRIMARY KEY (`eo_id`);

--
-- Indices de la tabla `tb_emprendedor_ventas`
--
ALTER TABLE `tb_emprendedor_ventas`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indices de la tabla `tb_encuestas`
--
ALTER TABLE `tb_encuestas`
  ADD PRIMARY KEY (`enc_id`);

--
-- Indices de la tabla `tb_entrevista`
--
ALTER TABLE `tb_entrevista`
  ADD PRIMARY KEY (`ent_id`);

--
-- Indices de la tabla `tb_equipamiento_hogar`
--
ALTER TABLE `tb_equipamiento_hogar`
  ADD PRIMARY KEY (`eq_ho_id`);

--
-- Indices de la tabla `tb_estado_afip`
--
ALTER TABLE `tb_estado_afip`
  ADD PRIMARY KEY (`ea_dp_id`);

--
-- Indices de la tabla `tb_estado_civil`
--
ALTER TABLE `tb_estado_civil`
  ADD PRIMARY KEY (`ec_id`);

--
-- Indices de la tabla `tb_estado_titulo`
--
ALTER TABLE `tb_estado_titulo`
  ADD PRIMARY KEY (`et_id`);

--
-- Indices de la tabla `tb_eventos`
--
ALTER TABLE `tb_eventos`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indices de la tabla `tb_familiares`
--
ALTER TABLE `tb_familiares`
  ADD PRIMARY KEY (`fam_id`);

--
-- Indices de la tabla `tb_ferias`
--
ALTER TABLE `tb_ferias`
  ADD PRIMARY KEY (`fe_id`);

--
-- Indices de la tabla `tb_formacion_profesional`
--
ALTER TABLE `tb_formacion_profesional`
  ADD PRIMARY KEY (`fp_id`);

--
-- Indices de la tabla `tb_forma_asociacion`
--
ALTER TABLE `tb_forma_asociacion`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indices de la tabla `tb_frecuencia_maltrato`
--
ALTER TABLE `tb_frecuencia_maltrato`
  ADD PRIMARY KEY (`fm_id`);

--
-- Indices de la tabla `tb_fuente_agua`
--
ALTER TABLE `tb_fuente_agua`
  ADD PRIMARY KEY (`fa_id`);

--
-- Indices de la tabla `tb_historial`
--
ALTER TABLE `tb_historial`
  ADD PRIMARY KEY (`hi_id`);

--
-- Indices de la tabla `tb_historial_tablas`
--
ALTER TABLE `tb_historial_tablas`
  ADD PRIMARY KEY (`ht_id`);

--
-- Indices de la tabla `tb_hogar`
--
ALTER TABLE `tb_hogar`
  ADD PRIMARY KEY (`ho_id`);

--
-- Indices de la tabla `tb_hogar_beneficiario`
--
ALTER TABLE `tb_hogar_beneficiario`
  ADD PRIMARY KEY (`hb_id`);

--
-- Indices de la tabla `tb_hogar_caracteristicas`
--
ALTER TABLE `tb_hogar_caracteristicas`
  ADD PRIMARY KEY (`hc_ho_id`);

--
-- Indices de la tabla `tb_hogar_general`
--
ALTER TABLE `tb_hogar_general`
  ADD PRIMARY KEY (`hog_ho_id`);

--
-- Indices de la tabla `tb_hogar_propiedad`
--
ALTER TABLE `tb_hogar_propiedad`
  ADD PRIMARY KEY (`pr_ho_id`);

--
-- Indices de la tabla `tb_hogar_servicios`
--
ALTER TABLE `tb_hogar_servicios`
  ADD PRIMARY KEY (`hos_ho_id`);

--
-- Indices de la tabla `tb_idiomas`
--
ALTER TABLE `tb_idiomas`
  ADD PRIMARY KEY (`idi_id`);

--
-- Indices de la tabla `tb_imagenes`
--
ALTER TABLE `tb_imagenes`
  ADD PRIMARY KEY (`img_id`);

--
-- Indices de la tabla `tb_informes_listado`
--
ALTER TABLE `tb_informes_listado`
  ADD PRIMARY KEY (`inl_id`);

--
-- Indices de la tabla `tb_informes_listado_detalles`
--
ALTER TABLE `tb_informes_listado_detalles`
  ADD PRIMARY KEY (`ild_id`);

--
-- Indices de la tabla `tb_informes_listado_items`
--
ALTER TABLE `tb_informes_listado_items`
  ADD PRIMARY KEY (`ili_id`);

--
-- Indices de la tabla `tb_ingresos`
--
ALTER TABLE `tb_ingresos`
  ADD PRIMARY KEY (`in_dp_id`);

--
-- Indices de la tabla `tb_ingresos_hogar`
--
ALTER TABLE `tb_ingresos_hogar`
  ADD PRIMARY KEY (`ih_id`);

--
-- Indices de la tabla `tb_ingresos_importes`
--
ALTER TABLE `tb_ingresos_importes`
  ADD PRIMARY KEY (`ii_id`);

--
-- Indices de la tabla `tb_ingresos_otros`
--
ALTER TABLE `tb_ingresos_otros`
  ADD PRIMARY KEY (`io_id`),
  ADD KEY `io_id` (`io_id`);

--
-- Indices de la tabla `tb_inscriptos_cdi`
--
ALTER TABLE `tb_inscriptos_cdi`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indices de la tabla `tb_instituciones_cpa`
--
ALTER TABLE `tb_instituciones_cpa`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indices de la tabla `tb_institucion_coorg`
--
ALTER TABLE `tb_institucion_coorg`
  ADD PRIMARY KEY (`ic_id`);

--
-- Indices de la tabla `tb_institucion_participantes`
--
ALTER TABLE `tb_institucion_participantes`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indices de la tabla `tb_licencias`
--
ALTER TABLE `tb_licencias`
  ADD PRIMARY KEY (`lic_id`);

--
-- Indices de la tabla `tb_licencias_beneficiario`
--
ALTER TABLE `tb_licencias_beneficiario`
  ADD PRIMARY KEY (`lb_id`);

--
-- Indices de la tabla `tb_localidades`
--
ALTER TABLE `tb_localidades`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indices de la tabla `tb_localidades_pais`
--
ALTER TABLE `tb_localidades_pais`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indices de la tabla `tb_manejo_pc`
--
ALTER TABLE `tb_manejo_pc`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indices de la tabla `tb_material_paredes`
--
ALTER TABLE `tb_material_paredes`
  ADD PRIMARY KEY (`mpe_id`);

--
-- Indices de la tabla `tb_material_piso`
--
ALTER TABLE `tb_material_piso`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indices de la tabla `tb_modalidad_cursado`
--
ALTER TABLE `tb_modalidad_cursado`
  ADD PRIMARY KEY (`mc_id`),
  ADD KEY `mc_id` (`mc_id`),
  ADD KEY `mc_id_2` (`mc_id`);

--
-- Indices de la tabla `tb_motivo_credito`
--
ALTER TABLE `tb_motivo_credito`
  ADD PRIMARY KEY (`mc_id`);

--
-- Indices de la tabla `tb_motivo_llamado`
--
ALTER TABLE `tb_motivo_llamado`
  ADD PRIMARY KEY (`ml_id`);

--
-- Indices de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  ADD PRIMARY KEY (`mun_id`);

--
-- Indices de la tabla `tb_niveles_idiomas`
--
ALTER TABLE `tb_niveles_idiomas`
  ADD PRIMARY KEY (`ni_id`);

--
-- Indices de la tabla `tb_nivel_educativo`
--
ALTER TABLE `tb_nivel_educativo`
  ADD PRIMARY KEY (`ne_id`);

--
-- Indices de la tabla `tb_nivel_estudios_social`
--
ALTER TABLE `tb_nivel_estudios_social`
  ADD PRIMARY KEY (`nes_id`);

--
-- Indices de la tabla `tb_obras_sociales`
--
ALTER TABLE `tb_obras_sociales`
  ADD PRIMARY KEY (`os_id`);

--
-- Indices de la tabla `tb_organizaciones`
--
ALTER TABLE `tb_organizaciones`
  ADD PRIMARY KEY (`or_id`);

--
-- Indices de la tabla `tb_origen_discapacidad`
--
ALTER TABLE `tb_origen_discapacidad`
  ADD PRIMARY KEY (`od_id`);

--
-- Indices de la tabla `tb_paises`
--
ALTER TABLE `tb_paises`
  ADD PRIMARY KEY (`pa_id`);

--
-- Indices de la tabla `tb_parentesco`
--
ALTER TABLE `tb_parentesco`
  ADD PRIMARY KEY (`par_id`);

--
-- Indices de la tabla `tb_postulaciones_cursos`
--
ALTER TABLE `tb_postulaciones_cursos`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indices de la tabla `tb_postulaciones_laborales`
--
ALTER TABLE `tb_postulaciones_laborales`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indices de la tabla `tb_provincias`
--
ALTER TABLE `tb_provincias`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indices de la tabla `tb_pueblos_originarios`
--
ALTER TABLE `tb_pueblos_originarios`
  ADD PRIMARY KEY (`po_id`);

--
-- Indices de la tabla `tb_puestos`
--
ALTER TABLE `tb_puestos`
  ADD PRIMARY KEY (`pu_id`);

--
-- Indices de la tabla `tb_red_contencion`
--
ALTER TABLE `tb_red_contencion`
  ADD PRIMARY KEY (`rc_id`);

--
-- Indices de la tabla `tb_referentes_beneficiarios`
--
ALTER TABLE `tb_referentes_beneficiarios`
  ADD PRIMARY KEY (`rb_id`);

--
-- Indices de la tabla `tb_relacion_danmificado`
--
ALTER TABLE `tb_relacion_danmificado`
  ADD PRIMARY KEY (`rd_id`);

--
-- Indices de la tabla `tb_riesgo_102`
--
ALTER TABLE `tb_riesgo_102`
  ADD PRIMARY KEY (`er_id`);

--
-- Indices de la tabla `tb_rubros`
--
ALTER TABLE `tb_rubros`
  ADD PRIMARY KEY (`ru_id`),
  ADD KEY `ru_id` (`ru_id`);

--
-- Indices de la tabla `tb_salas_cdi`
--
ALTER TABLE `tb_salas_cdi`
  ADD PRIMARY KEY (`sal_id`);

--
-- Indices de la tabla `tb_sexos`
--
ALTER TABLE `tb_sexos`
  ADD PRIMARY KEY (`sx_id`);

--
-- Indices de la tabla `tb_sistemas`
--
ALTER TABLE `tb_sistemas`
  ADD PRIMARY KEY (`sis_id`);

--
-- Indices de la tabla `tb_situaciones_curso`
--
ALTER TABLE `tb_situaciones_curso`
  ADD PRIMARY KEY (`sc_id`);

--
-- Indices de la tabla `tb_situaciones_violencia`
--
ALTER TABLE `tb_situaciones_violencia`
  ADD PRIMARY KEY (`sv_llamada_id`);

--
-- Indices de la tabla `tb_situacion_discapacidad`
--
ALTER TABLE `tb_situacion_discapacidad`
  ADD PRIMARY KEY (`sd_id`);

--
-- Indices de la tabla `tb_situacion_laboral`
--
ALTER TABLE `tb_situacion_laboral`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indices de la tabla `tb_subrubros`
--
ALTER TABLE `tb_subrubros`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indices de la tabla `tb_tabulaciones`
--
ALTER TABLE `tb_tabulaciones`
  ADD PRIMARY KEY (`tab_id`);

--
-- Indices de la tabla `tb_terminalidad`
--
ALTER TABLE `tb_terminalidad`
  ADD PRIMARY KEY (`ter_id`);

--
-- Indices de la tabla `tb_tiempo_maltrato`
--
ALTER TABLE `tb_tiempo_maltrato`
  ADD PRIMARY KEY (`tm_id`);

--
-- Indices de la tabla `tb_tipo_asociacion`
--
ALTER TABLE `tb_tipo_asociacion`
  ADD PRIMARY KEY (`ta_id`);

--
-- Indices de la tabla `tb_tipo_capacitaciones`
--
ALTER TABLE `tb_tipo_capacitaciones`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indices de la tabla `tb_tipo_casa`
--
ALTER TABLE `tb_tipo_casa`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indices de la tabla `tb_tipo_discapacidad`
--
ALTER TABLE `tb_tipo_discapacidad`
  ADD PRIMARY KEY (`td_id`);

--
-- Indices de la tabla `tb_tipo_emprendimiento`
--
ALTER TABLE `tb_tipo_emprendimiento`
  ADD PRIMARY KEY (`te_id`);

--
-- Indices de la tabla `tb_tipo_entrevista`
--
ALTER TABLE `tb_tipo_entrevista`
  ADD PRIMARY KEY (`ten_id`);

--
-- Indices de la tabla `tb_tipo_eventos`
--
ALTER TABLE `tb_tipo_eventos`
  ADD PRIMARY KEY (`te_id`);

--
-- Indices de la tabla `tb_tipo_familia`
--
ALTER TABLE `tb_tipo_familia`
  ADD PRIMARY KEY (`tf_id`);

--
-- Indices de la tabla `tb_tipo_ingresos`
--
ALTER TABLE `tb_tipo_ingresos`
  ADD PRIMARY KEY (`ti_id`);

--
-- Indices de la tabla `tb_tipo_iva`
--
ALTER TABLE `tb_tipo_iva`
  ADD PRIMARY KEY (`ti_id`);

--
-- Indices de la tabla `tb_tipo_locacion`
--
ALTER TABLE `tb_tipo_locacion`
  ADD PRIMARY KEY (`tl_id`);

--
-- Indices de la tabla `tb_tipo_nacionalidad`
--
ALTER TABLE `tb_tipo_nacionalidad`
  ADD PRIMARY KEY (`tn_id`);

--
-- Indices de la tabla `tb_tipo_propiedad`
--
ALTER TABLE `tb_tipo_propiedad`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indices de la tabla `tb_tipo_punto_venta`
--
ALTER TABLE `tb_tipo_punto_venta`
  ADD PRIMARY KEY (`tpv_id`);

--
-- Indices de la tabla `tb_tipo_retraso`
--
ALTER TABLE `tb_tipo_retraso`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indices de la tabla `tb_tipo_trabajo`
--
ALTER TABLE `tb_tipo_trabajo`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indices de la tabla `tb_tipo_usuarios`
--
ALTER TABLE `tb_tipo_usuarios`
  ADD KEY `tus_ud` (`tus_id`);

--
-- Indices de la tabla `tb_tipo_violencia`
--
ALTER TABLE `tb_tipo_violencia`
  ADD PRIMARY KEY (`tv_id`);

--
-- Indices de la tabla `tb_titulo_secundario`
--
ALTER TABLE `tb_titulo_secundario`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indices de la tabla `tb_transporte_disc`
--
ALTER TABLE `tb_transporte_disc`
  ADD PRIMARY KEY (`td_id`);

--
-- Indices de la tabla `tb_turnos_cdi`
--
ALTER TABLE `tb_turnos_cdi`
  ADD PRIMARY KEY (`tur_id`);

--
-- Indices de la tabla `tb_ubicaciones_urbanas`
--
ALTER TABLE `tb_ubicaciones_urbanas`
  ADD PRIMARY KEY (`uu_id`);

--
-- Indices de la tabla `tb_ultimo_domicilio`
--
ALTER TABLE `tb_ultimo_domicilio`
  ADD PRIMARY KEY (`ud_dp_id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`us_id`);

--
-- Indices de la tabla `tb_usuarios_sistemas`
--
ALTER TABLE `tb_usuarios_sistemas`
  ADD PRIMARY KEY (`uss_id`);

--
-- Indices de la tabla `tb_vinculo_agresor`
--
ALTER TABLE `tb_vinculo_agresor`
  ADD PRIMARY KEY (`va_id`);

--
-- Indices de la tabla `tb_vive_beneficiario`
--
ALTER TABLE `tb_vive_beneficiario`
  ADD PRIMARY KEY (`vb_dp_id`);

--
-- Indices de la tabla `tb_zonas`
--
ALTER TABLE `tb_zonas`
  ADD PRIMARY KEY (`zo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_102_llamados`
--
ALTER TABLE `tb_102_llamados`
  MODIFY `la_102_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_102_llamados_dp`
--
ALTER TABLE `tb_102_llamados_dp`
  MODIFY `dp_102_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_102_resguardo`
--
ALTER TABLE `tb_102_resguardo`
  MODIFY `res_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_actividades`
--
ALTER TABLE `tb_actividades`
  MODIFY `act_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_antecedentes_laborales`
--
ALTER TABLE `tb_antecedentes_laborales`
  MODIFY `al_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_areas_ur`
--
ALTER TABLE `tb_areas_ur`
  MODIFY `au_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_asistente_disc`
--
ALTER TABLE `tb_asistente_disc`
  MODIFY `ad_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_asociaciones`
--
ALTER TABLE `tb_asociaciones`
  MODIFY `as_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_ayudas_discapacidad`
--
ALTER TABLE `tb_ayudas_discapacidad`
  MODIFY `ad_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_barrios`
--
ALTER TABLE `tb_barrios`
  MODIFY `bar_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_barrios_coordenadas`
--
ALTER TABLE `tb_barrios_coordenadas`
  MODIFY `bc_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_barrios_gloc`
--
ALTER TABLE `tb_barrios_gloc`
  MODIFY `bar_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_beneficiarios_sistema`
--
ALTER TABLE `tb_beneficiarios_sistema`
  MODIFY `bs_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_beneficiario_curso_externo`
--
ALTER TABLE `tb_beneficiario_curso_externo`
  MODIFY `bce_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_beneficiario_formacion_profesional`
--
ALTER TABLE `tb_beneficiario_formacion_profesional`
  MODIFY `bfp_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_beneficiario_idioma`
--
ALTER TABLE `tb_beneficiario_idioma`
  MODIFY `bi_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_caats`
--
ALTER TABLE `tb_caats`
  MODIFY `ca_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_caats_coordenadas`
--
ALTER TABLE `tb_caats_coordenadas`
  MODIFY `cc_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_calle`
--
ALTER TABLE `tb_calle`
  MODIFY `ca_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_carnets`
--
ALTER TABLE `tb_carnets`
  MODIFY `car_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_cdi`
--
ALTER TABLE `tb_cdi`
  MODIFY `cdi_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_comercios`
--
ALTER TABLE `tb_comercios`
  MODIFY `co_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_condiciones_organizacion`
--
ALTER TABLE `tb_condiciones_organizacion`
  MODIFY `co_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_cursos_externos`
--
ALTER TABLE `tb_cursos_externos`
  MODIFY `ce_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_datos_emprendimiento`
--
ALTER TABLE `tb_datos_emprendimiento`
  MODIFY `em_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_datos_nivel_educativo`
--
ALTER TABLE `tb_datos_nivel_educativo`
  MODIFY `dne_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_datos_personales`
--
ALTER TABLE `tb_datos_personales`
  MODIFY `dp_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_datos_personales_referente`
--
ALTER TABLE `tb_datos_personales_referente`
  MODIFY `dpr_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_departamentos`
--
ALTER TABLE `tb_departamentos`
  MODIFY `dep_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_derivaciones_102`
--
ALTER TABLE `tb_derivaciones_102`
  MODIFY `der_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_discapacidad_ayuda_tecnica`
--
ALTER TABLE `tb_discapacidad_ayuda_tecnica`
  MODIFY `dat_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_docs`
--
ALTER TABLE `tb_docs`
  MODIFY `do_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_domicilios`
--
ALTER TABLE `tb_domicilios`
  MODIFY `dom_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_donde_vive`
--
ALTER TABLE `tb_donde_vive`
  MODIFY `dv_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_edad_padres`
--
ALTER TABLE `tb_edad_padres`
  MODIFY `ep_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_educacion_actual`
--
ALTER TABLE `tb_educacion_actual`
  MODIFY `ea_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_emprendedores_asociados`
--
ALTER TABLE `tb_emprendedores_asociados`
  MODIFY `eas_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_emprendedor_capacitaciones`
--
ALTER TABLE `tb_emprendedor_capacitaciones`
  MODIFY `ec_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_emprendedor_credito`
--
ALTER TABLE `tb_emprendedor_credito`
  MODIFY `ec_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_emprendedor_credito_nec`
--
ALTER TABLE `tb_emprendedor_credito_nec`
  MODIFY `ecn_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_emprendedor_organizacion`
--
ALTER TABLE `tb_emprendedor_organizacion`
  MODIFY `eo_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_emprendedor_ventas`
--
ALTER TABLE `tb_emprendedor_ventas`
  MODIFY `ev_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_encuestas`
--
ALTER TABLE `tb_encuestas`
  MODIFY `enc_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_entrevista`
--
ALTER TABLE `tb_entrevista`
  MODIFY `ent_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_estado_civil`
--
ALTER TABLE `tb_estado_civil`
  MODIFY `ec_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_estado_titulo`
--
ALTER TABLE `tb_estado_titulo`
  MODIFY `et_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_eventos`
--
ALTER TABLE `tb_eventos`
  MODIFY `ev_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_familiares`
--
ALTER TABLE `tb_familiares`
  MODIFY `fam_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_ferias`
--
ALTER TABLE `tb_ferias`
  MODIFY `fe_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_formacion_profesional`
--
ALTER TABLE `tb_formacion_profesional`
  MODIFY `fp_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_forma_asociacion`
--
ALTER TABLE `tb_forma_asociacion`
  MODIFY `fa_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_frecuencia_maltrato`
--
ALTER TABLE `tb_frecuencia_maltrato`
  MODIFY `fm_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_historial`
--
ALTER TABLE `tb_historial`
  MODIFY `hi_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_historial_tablas`
--
ALTER TABLE `tb_historial_tablas`
  MODIFY `ht_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_hogar`
--
ALTER TABLE `tb_hogar`
  MODIFY `ho_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_hogar_beneficiario`
--
ALTER TABLE `tb_hogar_beneficiario`
  MODIFY `hb_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_idiomas`
--
ALTER TABLE `tb_idiomas`
  MODIFY `idi_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_imagenes`
--
ALTER TABLE `tb_imagenes`
  MODIFY `img_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_informes_listado`
--
ALTER TABLE `tb_informes_listado`
  MODIFY `inl_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_informes_listado_detalles`
--
ALTER TABLE `tb_informes_listado_detalles`
  MODIFY `ild_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_informes_listado_items`
--
ALTER TABLE `tb_informes_listado_items`
  MODIFY `ili_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_ingresos_hogar`
--
ALTER TABLE `tb_ingresos_hogar`
  MODIFY `ih_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_ingresos_importes`
--
ALTER TABLE `tb_ingresos_importes`
  MODIFY `ii_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_ingresos_otros`
--
ALTER TABLE `tb_ingresos_otros`
  MODIFY `io_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_inscriptos_cdi`
--
ALTER TABLE `tb_inscriptos_cdi`
  MODIFY `ins_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_instituciones_cpa`
--
ALTER TABLE `tb_instituciones_cpa`
  MODIFY `ins_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_institucion_coorg`
--
ALTER TABLE `tb_institucion_coorg`
  MODIFY `ic_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_institucion_participantes`
--
ALTER TABLE `tb_institucion_participantes`
  MODIFY `ip_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_licencias`
--
ALTER TABLE `tb_licencias`
  MODIFY `lic_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_licencias_beneficiario`
--
ALTER TABLE `tb_licencias_beneficiario`
  MODIFY `lb_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_localidades`
--
ALTER TABLE `tb_localidades`
  MODIFY `lo_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_manejo_pc`
--
ALTER TABLE `tb_manejo_pc`
  MODIFY `mp_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_modalidad_cursado`
--
ALTER TABLE `tb_modalidad_cursado`
  MODIFY `mc_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_motivo_credito`
--
ALTER TABLE `tb_motivo_credito`
  MODIFY `mc_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_motivo_llamado`
--
ALTER TABLE `tb_motivo_llamado`
  MODIFY `ml_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_municipios`
--
ALTER TABLE `tb_municipios`
  MODIFY `mun_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_niveles_idiomas`
--
ALTER TABLE `tb_niveles_idiomas`
  MODIFY `ni_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_nivel_educativo`
--
ALTER TABLE `tb_nivel_educativo`
  MODIFY `ne_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_obras_sociales`
--
ALTER TABLE `tb_obras_sociales`
  MODIFY `os_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_organizaciones`
--
ALTER TABLE `tb_organizaciones`
  MODIFY `or_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_origen_discapacidad`
--
ALTER TABLE `tb_origen_discapacidad`
  MODIFY `od_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_paises`
--
ALTER TABLE `tb_paises`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_parentesco`
--
ALTER TABLE `tb_parentesco`
  MODIFY `par_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_postulaciones_cursos`
--
ALTER TABLE `tb_postulaciones_cursos`
  MODIFY `pc_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_postulaciones_laborales`
--
ALTER TABLE `tb_postulaciones_laborales`
  MODIFY `pl_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_pueblos_originarios`
--
ALTER TABLE `tb_pueblos_originarios`
  MODIFY `po_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_puestos`
--
ALTER TABLE `tb_puestos`
  MODIFY `pu_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_red_contencion`
--
ALTER TABLE `tb_red_contencion`
  MODIFY `rc_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_referentes_beneficiarios`
--
ALTER TABLE `tb_referentes_beneficiarios`
  MODIFY `rb_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_relacion_danmificado`
--
ALTER TABLE `tb_relacion_danmificado`
  MODIFY `rd_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_riesgo_102`
--
ALTER TABLE `tb_riesgo_102`
  MODIFY `er_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_rubros`
--
ALTER TABLE `tb_rubros`
  MODIFY `ru_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_salas_cdi`
--
ALTER TABLE `tb_salas_cdi`
  MODIFY `sal_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_sexos`
--
ALTER TABLE `tb_sexos`
  MODIFY `sx_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_sistemas`
--
ALTER TABLE `tb_sistemas`
  MODIFY `sis_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_situaciones_curso`
--
ALTER TABLE `tb_situaciones_curso`
  MODIFY `sc_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_situacion_discapacidad`
--
ALTER TABLE `tb_situacion_discapacidad`
  MODIFY `sd_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_situacion_laboral`
--
ALTER TABLE `tb_situacion_laboral`
  MODIFY `sl_id` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_subrubros`
--
ALTER TABLE `tb_subrubros`
  MODIFY `sr_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tabulaciones`
--
ALTER TABLE `tb_tabulaciones`
  MODIFY `tab_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_terminalidad`
--
ALTER TABLE `tb_terminalidad`
  MODIFY `ter_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tiempo_maltrato`
--
ALTER TABLE `tb_tiempo_maltrato`
  MODIFY `tm_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_asociacion`
--
ALTER TABLE `tb_tipo_asociacion`
  MODIFY `ta_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_capacitaciones`
--
ALTER TABLE `tb_tipo_capacitaciones`
  MODIFY `tc_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_discapacidad`
--
ALTER TABLE `tb_tipo_discapacidad`
  MODIFY `td_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_emprendimiento`
--
ALTER TABLE `tb_tipo_emprendimiento`
  MODIFY `te_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_entrevista`
--
ALTER TABLE `tb_tipo_entrevista`
  MODIFY `ten_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_eventos`
--
ALTER TABLE `tb_tipo_eventos`
  MODIFY `te_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_familia`
--
ALTER TABLE `tb_tipo_familia`
  MODIFY `tf_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_ingresos`
--
ALTER TABLE `tb_tipo_ingresos`
  MODIFY `ti_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_locacion`
--
ALTER TABLE `tb_tipo_locacion`
  MODIFY `tl_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_nacionalidad`
--
ALTER TABLE `tb_tipo_nacionalidad`
  MODIFY `tn_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_punto_venta`
--
ALTER TABLE `tb_tipo_punto_venta`
  MODIFY `tpv_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_retraso`
--
ALTER TABLE `tb_tipo_retraso`
  MODIFY `tr_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_trabajo`
--
ALTER TABLE `tb_tipo_trabajo`
  MODIFY `tt_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_usuarios`
--
ALTER TABLE `tb_tipo_usuarios`
  MODIFY `tus_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_tipo_violencia`
--
ALTER TABLE `tb_tipo_violencia`
  MODIFY `tv_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_titulo_secundario`
--
ALTER TABLE `tb_titulo_secundario`
  MODIFY `ts_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_transporte_disc`
--
ALTER TABLE `tb_transporte_disc`
  MODIFY `td_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_turnos_cdi`
--
ALTER TABLE `tb_turnos_cdi`
  MODIFY `tur_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `us_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios_sistemas`
--
ALTER TABLE `tb_usuarios_sistemas`
  MODIFY `uss_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_vinculo_agresor`
--
ALTER TABLE `tb_vinculo_agresor`
  MODIFY `va_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_zonas`
--
ALTER TABLE `tb_zonas`
  MODIFY `zo_id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
