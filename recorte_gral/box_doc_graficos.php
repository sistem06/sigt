<?php
//Sección Documentos Gráficos
echo '
<div class="col-xs-12 col-sm-6 col-md-3">
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title"><span class="glyphicon glyphicon-camera"></span>Documentos Graficos</h3>
  </div>
  <div class="panel-body">';

      $txt_grap = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"]." and img_front = 1";
      $query_grap = mysql_query($txt_grap);
      $n_grap = mysql_num_rows($query_grap);

      if($n_grap==0){
         echo '<p><a href="dni_front.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Agregar frente DNI</button></a></p>';
      } else {
        while($a_grap = mysql_fetch_array($query_grap)){
          echo '<p><a class="single-image" href="../imagenes/'.$a_grap["img_dni_name"].'"><img src="../imagenes/'.$a_grap["img_dni_name"].'" width="100%"></a></p>';
          echo '<a href="dni_front.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';
          echo '<br><br>';
        }
      }

      $txt_grap1 = "select * from tb_imagenes where img_dp_id =".$_GET["dp_id"]." and img_front = 0";
      $query_grap1 = mysql_query($txt_grap1);
      $n_grap1 = mysql_num_rows($query_grap1);

      if($n_grap1==0){
      	echo '<p><a href="dni_back.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Agregar dorso DNI</button></a></p>';
      } else {
        while($a_grap1 = mysql_fetch_array($query_grap1)){
          echo '<p><a class="single-image" href="../imagenes/'.$a_grap1["img_dni_name"].'"><img src="../imagenes/'.$a_grap1["img_dni_name"].'" width="100%"></a></p>';
          echo '<a href="dni_back.php?dp_id='.$_GET["dp_id"].'&estado=E"><button type="button" class="btn btn-warning">Modificar</button></a>';
          echo '<br><br>';
        }
      }

      echo '
  </div>
</div>
</div>';
?>
