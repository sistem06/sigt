<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");
if(isset($_GET['todos'])){
		switch ($_GET['todos']) {
			case 'todos5':
					$q_et = mysql_query("SELECT * from tb_estado_titulo INNER JOIN tb_datos_nivel_educativo ON tb_estado_titulo.et_id = tb_datos_nivel_educativo.dne_termino group by tb_datos_nivel_educativo.dne_termino");
                        while($a_et = mysql_fetch_array($q_et)){
                        	$n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $a_et['et_id'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", $_GET['variante']);
								if($n==0){
								$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$a_et['et_id'].", '".$_GET['informe']."', '".$_GET['tabla']."', '".$_GET['variante']."')";
								mysql_query($tx);
							}
                        }
				break;

				case 'todos6':
					$q_idi = mysql_query("SELECT * from tb_idiomas INNER JOIN tb_beneficiario_idioma ON tb_idiomas.idi_id = tb_beneficiario_idioma.bi_idi_id group by tb_beneficiario_idioma.bi_idi_id");
                     
                        while($a_idi = mysql_fetch_array($q_idi)){
                        	$n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $a_idi['idi_id'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", $_GET['variante']);
								if($n==0){
								$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$a_idi['idi_id'].", '".$_GET['informe']."', '".$_GET['tabla']."', '".$_GET['variante']."')";
								mysql_query($tx);
							}
                        }
				break;

				case 'todos7':
					$q_nidi = mysql_query("SELECT * from tb_niveles_idiomas INNER JOIN tb_beneficiario_idioma ON tb_niveles_idiomas.ni_id = tb_beneficiario_idioma.bi_nivel group by tb_beneficiario_idioma.bi_nivel");
                     //   $nu = mysql_num_rows($qu);
                        while($a_nidi = mysql_fetch_array($q_nidi)){
                        	$n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $a_nidi['ni_id'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", $_GET['variante']);
								if($n==0){
								$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$a_nidi['ni_id'].", '".$_GET['informe']."', '".$_GET['tabla']."', '".$_GET['variante']."')";
								mysql_query($tx);
							}
                        }
				break;

				case 'todos3':
					 $qu = mysql_query("SELECT pu_id, pu_name from tb_puestos INNER JOIN tb_antecedentes_laborales ON tb_antecedentes_laborales.al_puesto = tb_puestos.pu_id  group by tb_antecedentes_laborales.al_puesto order by tb_puestos.pu_name");
                        while($a = mysql_fetch_array($qu)){
                        	$n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $a['pu_id'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", $_GET['variante']);
								if($n==0){
								$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$a['pu_id'].", '".$_GET['informe']."', '".$_GET['tabla']."', '".$_GET['variante']."')";
								mysql_query($tx);
							}
                        }
				break;
		}
}

	if(isset($_GET['variante'])){
		$n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $_GET['id_funcion'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", $_GET['variante']);
		if($n==0){
		$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$_GET['id_funcion'].", '".$_GET['informe']."', '".$_GET['tabla']."', '".$_GET['variante']."')";
		mysql_query($tx);
	} else {
		$tx = "delete from tb_informes_listado_items where (ili_item = ".$_GET['id_funcion']." and  ili_inl_id = '".$_GET['informe']."' and ili_tabla = '".$_GET['tabla']."' and ili_variante = '".$_GET['variante']."')";
		mysql_query($tx);
	}
	} else {
		if(!isset($_GET['desde']) and !isset($_GET['hasta'])){
		$n = NroRegistroTriple ("tb_informes_listado_items", "ili_item", $_GET['id_funcion'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla']);
		if($n==0){
		$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla) values (".$_GET['id_funcion'].", '".$_GET['informe']."', '".$_GET['tabla']."')";
		mysql_query($tx);
	} else {
		$tx = "delete from tb_informes_listado_items where (ili_item = ".$_GET['id_funcion']." and  ili_inl_id = '".$_GET['informe']."' and ili_tabla = '".$_GET['tabla']."')";
		mysql_query($tx);
	}
	} else {
		// parte de edades
			if(isset($_GET['desde'])){
				$n = NroRegistroTriple ("tb_informes_listado_items", "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", "desde");
				if($n==0){
		$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$_GET['desde'].", '".$_GET['informe']."', '".$_GET['tabla']."', 'desde')";
		mysql_query($tx);
	} else {
		$tx = "update tb_informes_listado_items set ili_item = '".$_GET['desde']."' where (ili_inl_id = '".$_GET['informe']."' and ili_tabla = '".$_GET['tabla']."' and ili_variante = 'desde')";
		mysql_query($tx);
	}
			if($_GET['desde']==""){
				$tx = "delete from tb_informes_listado_items where (ili_inl_id = '".$_GET['informe']."' and ili_tabla = '".$_GET['tabla']."' and ili_variante = 'desde')";
		mysql_query($tx);
			}
		}
			if(isset($_GET['hasta'])){
				$n = NroRegistroTriple ("tb_informes_listado_items", "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", "hasta");
				if($n==0){
		$tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$_GET['hasta'].", '".$_GET['informe']."', '".$_GET['tabla']."', 'hasta')";
		mysql_query($tx);
	} else {
		$tx = "update tb_informes_listado_items set ili_item = '".$_GET['hasta']."' where (ili_inl_id = '".$_GET['informe']."' and ili_tabla = '".$_GET['tabla']."' and ili_variante = 'hasta')";
		mysql_query($tx);
	}
			if($_GET['hasta']==""){
				$tx = "delete from tb_informes_listado_items where (ili_inl_id = '".$_GET['informe']."' and ili_tabla = '".$_GET['tabla']."' and ili_variante = 'hasta')";
		mysql_query($tx);
	}
			}
		// fin edades
	}
	}
/*	if($_GET['id_funcion']=="todos2"){
			$query2 = mysql_query("SELECT pu_id FROM tb_puestos INNER JOIN tb_postulaciones_laborales ON tb_postulaciones_laborales.pl_puesto = tb_puestos.pu_id");
    while($alfa2 = mysql_fetch_array($query2)){
      $tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla) values (".$alfa2['pu_id'].", '".$_GET['informe']."', '".$_GET['tabla']."')";
    }
	}*/
	include("registro_informes.php");
	
	
?>