<?php
if (!isset($_SESSION)) { session_start(); }
include("../../".$_SESSION["dir_sis"]."/secure1.php");
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
$car = $_GET['car'];
	$query_tipo = mysql_query("SELECT * FROM tbp_prestacion_type where (pt_gr = '$car' or pt_gr = '3') order by pt_name");
          while ($data_tipo = mysql_fetch_array($query_tipo)) {
            echo '<option value="'.$data_tipo['pt_id'].'">'.$data_tipo['pt_name'].'</option>';
          }
	?>
