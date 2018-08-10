<h3>Listado de Usuarios del Sistema</h3>
<!-- aca comienza el calendario -->
     <a href="cambios_usuario.php" class="fancybox fancybox.iframe" title="agregar usuario">
      <button type="button" class="btn btn-success">Agregar Usuario</button>
     </a>
     <br><br>
<table id="list_emprendedores" class="display" cellspacing="0" width="100%">
       <thead>
          <tr>
      <th>Usuario</th>
    <th>Tipo</th>
      <th>Modificar</th>
      <th>Quitar</th>
    </tr>
    </thead>

            <tbody>
      <?php

      $qe=mysql_query("select * from tb_usuarios INNER JOIN tb_usuarios_sistemas ON tb_usuarios.us_id = tb_usuarios_sistemas.uss_us_id where tb_usuarios_sistemas.uss_sistema='".$_SESSION["sistema"]."'");
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';
  echo '<td>'.$row['us_name'].'</td>';
  echo '<td>'.BuscaRegistro ("tb_tipo_usuarios", "tus_id", $row['uss_tipo'], "tus_name").'</td>';
   echo '<td><a href="cambios_usuario.php?us_id='.$row['us_id'].'"  title="modificar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button></a></td>';
   echo '<td>';
   if($_SESSION["id_us"] != $row['us_id']){
    echo '<a href="quitar_general.php?val='.$row['us_id'].'&id=us_id&tabla=tb_usuarios&sis='.$_SESSION["sistema"].'"  title="eliminar" class="fancybox fancybox.iframe"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>';
  }
  echo '</td></tr>';
  }
               ?>


            </tbody>
        </table>
