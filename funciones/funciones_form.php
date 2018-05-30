<?php
	function InputGeneral($tipo, $name, $clase, $id, $previo, $etiqueta){
	$dato =	'<label for="'.$id.'">'.$etiqueta.'</label>
    <input type="'.$tipo.'" class="'.$clase.'" id="'.$id.'" name="'.$name.'"
           placeholder="'.$previo.'">';
           return $dato;
	}

	function InputGeneralVal($tipo, $name, $clase, $id, $previo, $etiqueta, $valor){
	$dato =	'<label for="'.$id.'">'.$etiqueta.'</label>
    <input type="'.$tipo.'" class="'.$clase.'" id="'.$id.'" name="'.$name.'"
           placeholder="'.$previo.'" value="'.$valor.'">';
           return $dato;
	}
	
	function ListadoOptionsTabla ($tabla, $campo_id, $campo){
		
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 $lista .= "<option></option>"; 
		while ($ddat = mysql_fetch_array ($result)){
			$lista .= '<option value="'.$ddat[$campo_id].'">'.$ddat[$campo].'</option>';
		}
		return  ($lista);
	}
	function SelectGeneral($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectGeneralSO($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." order by '".$campo."'";
		$result = mysql_query ($txt_q);
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectGeneralAccion($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $titulo){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		 $dato .= '<optgroup label="Accion">';
			$dato .= '<option>Agregar</option>';
			$dato .= '<optgroup label="'.$titulo.'">';
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectGeneralAccion2C($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $campo1, $titulo){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo.",".$campo1." from ".$tabla." order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		 $dato .= '<optgroup label="Accion">';
			$dato .= '<option>Agregar</option>';
			$dato .= '<optgroup label="'.$titulo.'">';
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).' | '.utf8_encode($ddat[$campo1]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectGeneralSU($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.$ddat[$campo].'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectFiltro($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $campo_fil, $valor_fil){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." where ".$campo_fil." = '".$valor_fil."' order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectFiltroVal($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $campo_fil, $valor_fil,$val){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." where ".$campo_fil." = '".$valor_fil."' order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}
		$txt_q1 = "select ".$campo_id.",".$campo." from ".$tabla." where ".$campo_fil." = '".$valor_fil."' and ".$campo_id." = '".$val."'";
		$dat = mysql_fetch_array(mysql_query ($txt_q1));
		$dato .= '<option value="'.$dat[$campo_id].'" selected = "selected">'.utf8_encode($dat[$campo]).'</option>'; 
  $dato .= '</select>';
           return $dato;
	}

	function SelectAccionFiltro($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $titulo, $campo_fil, $valor_fil){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." where ".$campo_fil." = '".$valor_fil."' order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		 $dato .= '<optgroup label="Accion">';
			$dato .= '<option>Agregar</option>';
			$dato .= '<optgroup label="'.$titulo.'">';
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectFiltroMayorNro($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $nro){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." where ".$campo_id." > '".$nro."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

	function SelectFiltroMenorNro($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $nro){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." where ".$campo_id." < '".$nro."'";
		$result = mysql_query ($txt_q);
		 $dato .= "<option></option>"; 
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}

  $dato .= '</select>';
           return $dato;
	}

		function SelectGeneralVal($name, $clase, $id, $etiqueta,$tabla, $campo_id, $campo, $valor){
		$dato ="";
		$dato .=	'<label for="'.$id.'">'.$etiqueta.'</label>
		<select class="'.$clase.'" name="'.$name.'" id="'.$id.'">';
		$txt_q = "select ".$campo_id.",".$campo." from ".$tabla." order by '".$campo."'";
		$result = mysql_query ($txt_q);
		 
		while ($ddat = mysql_fetch_array ($result)){
			$dato .= '<option value="'.$ddat[$campo_id].'">'.utf8_encode($ddat[$campo]).'</option>';
		}
	$txt_r = "select ".$campo_id.",".$campo." from ".$tabla." where ".$campo_id." = '".$valor."'";
	$dat_r = mysql_fetch_array(mysql_query($txt_r));
	$dato .= '<option value="'.$valor.'" selected = "selected">'.utf8_encode($dat_r[$campo]).'</option>';
  $dato .= '</select>';
           return $dato;
	}


	function TextAreaGeneral($name, $clase, $id, $rows, $etiqueta){
	$dato =	'<label for="'.$id.'">'.$etiqueta.'</label>
    <textarea class="'.$clase.'" id="'.$id.'" name="'.$name.'"
           rows="'.$rows.'"></textarea>';
           return $dato;
	}
	function TextAreaGeneralVal($name, $clase, $id, $rows, $etiqueta, $valor){
	$dato =	'<label for="'.$id.'">'.$etiqueta.'</label>
    <textarea class="'.$clase.'" id="'.$id.'" name="'.$name.'"
           rows="'.$rows.'">'.$valor.'</textarea>';
           return $dato;
	}
?>