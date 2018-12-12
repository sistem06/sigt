<?php
if (!isset($_SESSION)) { session_start(); }
include("../../".$_SESSION["dir_sis"]."/secure1.php");
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

 if($_GET['estipo'] != ""){
  		$estipo = $_GET['estipo'];
  		$data_tipo1 = mysql_fetch_array(mysql_query("SELECT * FROM tbp_prestacion_type where (pt_id = '$estipo')"));
  		echo '<option value="'.$data_tipo1['pt_id'].'" selected = "selected">'.$data_tipo1['pt_name'].'</option>';
  }  
  $car = $_GET['car'];
	$query_tipo = mysql_query("SELECT * FROM tbp_prestacion_type where (pt_gr = '$car' or pt_gr = '3') order by pt_name");
          while ($data_tipo = mysql_fetch_array($query_tipo)) {
            echo '<option value="'.$data_tipo['pt_id'].'">'.$data_tipo['pt_name'].'</option>';
          }
	?>
