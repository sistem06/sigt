<h3>Listado de Usuarios del Sistema</h3>
<!-- aca comienza el calendario -->

<a href="cambios_usuario.php" class="fancybox fancybox.iframe" title="Agregar nuevo Usuario al Área">
  <button type="button" class="btn btn-success">

    <span class="glyphicon glyphicon-plus"></span>Agregar Usuario</button>
</a>
<a href="tools/add_usuario_area.php" class="fancybox fancybox.iframe" title="Agregar usuario existente de otra Área">
  <button type="button" class="btn btn-success">
    <span class="glyphicon glyphicon-user"></span>
    <span class="glyphicon glyphicon-share"></span>Agregar Usuario de otra Área</button>
</a>

<br><br>
<?php
  if (isset($_GET['verusr'])) {
    if ($_GET['verusr']==1) {
      $sin_acceso="notActive";
      $con_acceso="active";
    } else {
      $sin_acceso="active";
      $con_acceso="notActive";
    }
  } else {
    $sin_acceso="notActive";
    $con_acceso="active";
  }
?>
<div id="radioBtn" class="btn-group">
  <a class="btn btn-primary btn-sm <?php echo $con_acceso; ?>" data-toggle="ver_usuarios" data-title="1">USUARIOS DEL ÁREA</a>
  <a class="btn btn-primary btn-sm <?php echo $sin_acceso; ?>" data-toggle="ver_usuarios" data-title="2">USUARIOS SIN ACCESO</a>
</div>
<input type="hidden" name="ver_usuarios" id="ver_usuarios">
<br><br>


<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Nombre y Apellido</th>
      <th>Usuario</th>
      <th>Tipo</th>
      <th>Observaciones</th>
      <th>Modificar</th>
      <th>Quitar</th>
    </tr>
  </thead>

  <tbody>
    <?php

    if ($con_acceso=="active") {
      $qe=mysql_query("select * from tb_usuarios
                      INNER JOIN tb_usuarios_sistemas ON tb_usuarios.us_id = tb_usuarios_sistemas.uss_us_id
                      where tb_usuarios.us_login = 1 and tb_usuarios_sistemas.uss_sistema='".$_SESSION["sistema"]."'");

      while($row = mysql_fetch_array($qe)){
        echo '<tr>';
        echo '<td>'.$row['us_nombre'].' '.$row['us_apellido'].'</td>';
        echo '<td>'.$row['us_name'].'</td>';
        echo '<td>'.BuscaRegistro ("tb_tipo_usuarios", "tus_id", $row['uss_tipo'], "tus_name").'</td>';
        echo '<td>'.$row['us_observaciones'].'</td>';
        echo '<td><a href="cambios_usuario.php?us_id='.$row['us_id'].'"  title="modificar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button></a></td>';
        echo '<td>';
        if($_SESSION["id_us"] != $row['us_id']){
          echo '<a href="quitar_general.php?val='.$row['us_id'].'&id=us_id&tabla=tb_usuarios&sis='.$_SESSION["sistema"].'"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>';
        }
        echo '</td></tr>';
      }

    } else {
      $qe=mysql_query("select a.us_id, a.us_nombre, a.us_apellido, a.us_name, a.us_observaciones, b.uss_sistema, b.uss_tipo
                       from tb_usuarios a
                       left join tb_usuarios_sistemas b
                       	on b.uss_us_id = a.us_id
                       where a.us_login = 0
                         and (b.uss_sistema = ".$_SESSION["sistema"]." or b.uss_sistema is null)");

       while($row = mysql_fetch_array($qe)){
         $tipo_usr = "";
         $id_tipo_usr = 0;
         echo '<tr>';
         echo '<td>'.$row['us_nombre'].' '.$row['us_apellido'].'</td>';
         echo '<td>'.$row['us_name'].'</td>';
         $id_tipo_usr = BuscaRegistro ("tb_usuarios_sistemas", "uss_us_id", $row['us_id'], "uss_tipo");
         if ($id_tipo_usr <> 0) {
           $tipo_usr = BuscaRegistro ("tb_tipo_usuarios", "tus_id", $id_tipo_usr, "tus_name");
           echo '<td>'.$tipo_usr.'</td>';
         } else {
           echo '<td>Otro (Responsable / Educador / Asistente)</td>';
         }
         echo '<td>'.$row['us_observaciones'].'</td>';
         echo '<td><a href="cambios_usuario.php?us_id='.$row['us_id'].'"  title="modificar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button></a></td>';
         echo '<td>';
         if($_SESSION["id_us"] != $row['us_id']){
           echo '<a href="quitar_general.php?val='.$row['us_id'].'&id=us_id&tabla=tb_usuarios&sis='.$_SESSION["sistema"].'"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>';
         }
         echo '</td></tr>';
       }
    }

    ?>


  </tbody>
</table>
