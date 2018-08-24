<?php
include ("../../conecta.php");
include ("../../funciones/funciones_generales.php");

$n = NroRegistro4 ("tb_informes_listado_items", "ili_item", $_GET['id_funcion'], "ili_inl_id", $_GET['informe'], "ili_tabla", $_GET['tabla'], "ili_variante", $_GET['variante']);
    if($n==0){
    $tx = "insert into tb_informes_listado_items (ili_item, ili_inl_id, ili_tabla, ili_variante) values (".$_GET['id_funcion'].", '".$_GET['informe']."', '".$_GET['tabla']."', '".$_GET['variante']."')";
    mysql_query($tx);
  } else {
    $tx = "delete from tb_informes_listado_items where (ili_item = ".$_GET['id_funcion']." and  ili_inl_id = '".$_GET['informe']."' and ili_tabla = '".$_GET['tabla']."' and ili_variante = '".$_GET['variante']."')";
    mysql_query($tx);
  }



$informe = $_GET['informe'];

$query_in = mysql_query("select * from tb_informes_listado_items where ili_inl_id = '$informe' and ili_variante = 'dne_nivel' and ili_tabla = 'tb_datos_nivel_educativo' and ili_item > 4");
if(mysql_num_rows($query_in)==0){
  echo "No hay carreras para estos niveles educativos";
} else {
$filtro = "";
  while ($dd = mysql_fetch_array($query_in)) {
    $filtro .= " tb_titulo_secundario.ts_nivel = '".$dd['ili_item']."' or";
  }
 $filtro = substr($filtro, 0, -3);
?>
<ul class="nav nav-tabs">
    <?php
      $query3 = mysql_query("SELECT ts_id, ts_name, SUBSTRING(ts_name, 1,1) as inicial, COUNT(ts_name)
FROM tb_titulo_secundario INNER JOIN tb_datos_nivel_educativo ON tb_datos_nivel_educativo.dne_titulo = tb_titulo_secundario.ts_id where ($filtro)
GROUP BY SUBSTRING(tb_titulo_secundario.ts_name, 1,1)");
    while($alfa3 = mysql_fetch_array($query3)){
      echo '<li><a href="#" class="list_tit" id="'.$alfa3['inicial'].'">'.strtoupper($alfa3['inicial']).'</a></li>';
    }
//    echo '<li>'.$filtro.'</li>'
    ?>
</ul>
                       
                  <?php
                  }
                  
  echo '|';
  include("registro_informes.php");
  ?>