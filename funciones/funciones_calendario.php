<?php
function dias_mes ($mes, $ano){
	 $mes = mktime( 0, 0, 0, $mes, 1, $ano); 
      setlocale('LC_ALL', 'fr_FR');
	  $d_mes = date("t",$mes);
      return $d_mes;	
}

function name_mes ($mes){
	switch($mes){
	case 1:
	$n_mes = "Enero";
	break;
	
	case 2:
	$n_mes = "Febrero";
	break;
	
	case 3:
	$n_mes = "Marzo";
	break;
	
	case 4:
	$n_mes = "Abril";
	break;
	
	case 5:
	$n_mes = "Mayo";
	break;
	
	case 6:
	$n_mes = "Junio";
	break;
	
	case 7:
	$n_mes = "Julio";
	break;
	
	case 8:
	$n_mes = "Agosto";
	break;
	
	case 9:
	$n_mes = "Septiembre";
	break;
	
	case 10:
	$n_mes = "Octubre";
	break;
	
	case 11:
	$n_mes = "Noviembre";
	break;
	
	case 12:
	$n_mes = "Diciembre";
	break;
	}
	return $n_mes;
}
function name_dia ($dia){
	switch($dia){
	case 1:
	$n_dia = "Lunes";
	break;
	
	case 2:
	$n_dia = "Martes";
	break;
	
	case 3:
	$n_dia = "Miercoles";
	break;
	
	case 4:
	$n_dia = "Jueves";
	break;
	
	case 5:
	$n_dia = "Viernes";
	break;
	
	case 6:
	$n_dia = "Sabado";
	break;
	
	case 0:
	$n_dia = "Domingo";
	break;

	}
	return $n_dia;
}
function fecha_dev ($fecha){
	$fecha = substr($fecha,8,2).'/'.substr($fecha,5,2).'/'.substr($fecha,0,4);
	return $fecha;
}
function parteHora( $hora ){
    $horaSplit = explode(":", $hora);
        if( count($horaSplit) < 3 ){
            $horaSplit[2] = 0;
        }
    return $horaSplit;
}
function SumaHoras( $time1, $time2 ){
    list($hour1, $min1, $sec1) = parteHora($time1);
    list($hour2, $min2, $sec2) = parteHora($time2);
    return date('H:i:s', mktime( $hour1 + $hour2, $min1 + $min2, $sec1 + $sec2));
}
?>