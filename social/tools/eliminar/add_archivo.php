<?php
include ("../../conecta.php");
$dp_id = $_POST['dp_id'];
$ho_id = $_POST['ho_id'];
	$fileName= basename ($_FILES ['foto']['name']);
	$foto_name = "dni_".$dp_id.".jpg";
	$fileDest	= "../../imagenes/dni_".$dp_id.".jpg";
	if ($_FILES ['archivo']['error'] == 0){
		move_uploaded_file ($_FILES ['foto']['tmp_name'], $fileDest);
		}

		$original = imagecreatefromjpeg($fileDest);
		$ancho = imagesx($original);
		$alto = imagesy($original);

		$destinoch =  "../../imagenes/dni_th_".$dp_id.".jpg";

		if ($ancho < $alto){
		
		
		$alto_med=300*$alto/$ancho;
		$thumb = imagecreatetruecolor(300,$alto_med); 
		imagecopyresampled($thumb,$original,0,0,0,0,300,$alto_med,$ancho,$alto); 
		imagejpeg($thumb,$destinoch,90); 
		unset($thumb);
		
		$alto_gr=800*$alto/$ancho;
		$thumb = imagecreatetruecolor(800,$alto_gr); 
		imagecopyresampled($thumb,$original,0,0,0,0,800,$alto_gr,$ancho,$alto); 
		imagejpeg($thumb,$fileDest,90); 
		unset($thumb);
		
		
		} else {
		
		$ancho_med=300*$ancho/$alto;
		$thumb = imagecreatetruecolor($ancho_med,300); 
		imagecopyresampled($thumb,$original,0,0,0,0,$ancho_med,300,$ancho,$alto); 
		imagejpeg($thumb,$destinoch,90); 
		unset($thumb);
		
		$ancho_gr=800*$ancho/$alto;
		$thumb = imagecreatetruecolor($ancho_gr,800); 
		imagecopyresampled($thumb,$original,0,0,0,0,$ancho_gr,800,$ancho,$alto); 
		imagejpeg($thumb,$fileDest,90); 
		unset($thumb);
		}

mysql_query("insert into tb_imagenes (img_dp_id,img_dni_name) values ('$dp_id','$foto_name')");
		
		chmod($fileDest, 644);
		chmod($destinoch, 644);

header("Location: ../nuevo_archivos.php?ho_id=$ho_id");
exit();
?>