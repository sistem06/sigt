<?php
session_start();
include("../".$_SESSION["dir_sis"]."/secure.php");
include ("../conecta.php");
include ("../funciones/funciones_generales.php");
include ("../funciones/funciones_prestaciones.php");
ActualizaEstado ($_SESSION["sistema"]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo BuscaRegistro ("tb_sistemas", "sis_id", $_SESSION["sistema"], "sis_name"); ?>	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/estilos_ss.css">
  <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
</head>
<body>
<?php include("encabezado.php"); ?>
<div class="container-fluid">
<?php include("../".$_SESSION["dir_sis"]."/recortes/navegacion.php"); ?>
	<!-- comienza contenido -->

      <h3>Listado de Prestaciones Asignadas</h3>
<!-- aca comienza el calendario -->
<form role="form" method="post" action="" id="buscador" class="form-inline">
       <div class="form-group">
          <select id="prestacion_filtro" class="form form-control" name="pres">
          <?php if(!isset($_POST['pres']) or $_POST['pres']==0){ ?>
          <option hidden >Prestación</option>
          <?php } else { ?> 
             <option value="<?php echo $_POST['pres']; ?>"><?php echo BuscaRegistro("tbp_prestaciones_lista","tbp_pr_id",$_POST['pres'],"tbp_pr_name"); ?></option>
            <?php } ?>
            <?php
              $tx_1 = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones_beneficiarios.pb_pre_id = tbp_prestaciones.pre_id  INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']." group by tbp_prestaciones.pre_pr_id";
          //  $tx_1 = "SELECT tbp_pr_id, tbp_pr_name FROM tbp_prestaciones_lista WHERE tbp_sis_id = ".$_SESSION['sistema']." order by tbp_pr_name";
              $query_1 = mysql_query($tx_1);
              echo '<option value="0"></option>';
                while($a1 = mysql_fetch_array($query_1)){
                    echo '<option value="'.$a1['tbp_pr_id'].'">'.$a1['tbp_pr_name'].'</option>';
                }
            ?>
          </select>
     </div>

     <div class="form-group">
       
          <select id="estado_filtro" class="form form-control" name="state">
           <?php if(!isset($_POST['state']) or $_POST['state']==0){ ?>
          <option hidden >Estado</option>
          <?php } else { ?> 
             <option value="<?php echo $_POST['state']; ?>"><?php echo BuscaRegistro("tbp_estados","est_id",$_POST['state'],"est_name"); ?></option>
            <?php } ?>
          <?php
              $tx_3 = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones.pre_id = tbp_prestaciones_beneficiarios.pb_pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']."  group by tbp_prestaciones_beneficiarios.pb_state";
               $query_3 = mysql_query($tx_3);
              echo '<option value="0"></option>';
                while($a3 = mysql_fetch_array($query_3)){
                    echo '<option value="'.$a3['pb_state'].'">'.BuscaRegistro("tbp_estados","est_id",$a3['pb_state'],"est_name").'</option>';
                }
            ?>
          </select>
     </div>

     <div class="form-group">
       
          <select id="tipo_filtro" class="form form-control" name="type">
           <?php if(!isset($_POST['type']) or $_POST['type']==0){ ?>
          <option hidden >Tipo</option>
          <?php } else { ?> 
             <option value="<?php echo $_POST['type']; ?>"><?php echo BuscaRegistro("tbp_prestacion_type","pt_id",$_POST['type'],"pt_name"); ?></option>
            <?php } ?>
          <?php
              $tx_4 = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tbp_prestaciones ON tbp_prestaciones.pre_id = tbp_prestaciones_beneficiarios.pb_pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id INNER JOIN tbp_prestacion_type ON tbp_prestaciones_lista.tbp_pt_id = tbp_prestacion_type.pt_id  WHERE tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']."  group by tbp_prestacion_type.pt_id";
               $query_4 = mysql_query($tx_4);
              echo '<option value="0"></option>';
                while($a4 = mysql_fetch_array($query_4)){
                    echo '<option value="'.$a4['pt_id'].'">'.$a4['pt_name'].'</option>';
                }
            ?>
          </select>
     </div>

      <div class="form-group">
       
          <select id="beneficiario_filtro" class="form form-control" name="ben">
           <?php if(!isset($_POST['ben']) or $_POST['ben']==0){ ?>
          <option hidden >Beneficiario</option>
          <?php } else { ?> 
             <option value="<?php echo $_POST['ben']; ?>"><?php echo BuscaRegistro("tb_datos_personales","dp_id",$_POST['ben'],"dp_name"); ?></option>
            <?php } ?>
          <?php
    /*          $tx_2 = "SELECT * FROM tbp_prestaciones_usuarios INNER JOIN tb_usuarios tbp_prestaciones_usuarios.pu_us_id ON tb_usuarios.us_id group by tbp_prestaciones_usuarios.pu_us_id";
               $query_2 = mysql_query($tx_2);
              echo '<option value="0"></option>';
                while($a2 = mysql_fetch_array($query_2)){
                    echo '<option value="'.$a2['tbp_pr_id'].'">'.$a2['tbp_pr_name'].'</option>';
                }*/

                $tx_2 = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tb_datos_personales ON tbp_prestaciones_beneficiarios.pb_dp_id = tb_datos_personales.dp_id INNER JOIN tbp_prestaciones ON tbp_prestaciones.pre_id = tbp_prestaciones_beneficiarios.pb_pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']."  group by tbp_prestaciones_beneficiarios.pb_dp_id order by tb_datos_personales.dp_name";
               $query_2 = mysql_query($tx_2);
              echo '<option value="0"></option>';
                while($a2 = mysql_fetch_array($query_2)){
                    echo '<option value="'.$a2['dp_id'].'">'.$a2['dp_name'].'</option>';
                }
            ?>
          </select>
     </div>

     <div class="form-group">
       
          <select id="tipo_responsable" class="form form-control" name="respo">
           <?php if(!isset($_POST['respo']) or $_POST['respo']==0){ ?>
          <option hidden >Responsable</option>
          <?php } else { ?> 
             <option value="<?php echo $_POST['respo']; ?>"><?php echo BuscaRegistro("tb_usuarios","us_id",$_POST['respo'],"us_name"); ?></option>
            <?php } ?>
          <?php
              $tx_5 = "SELECT * FROM tbp_prestaciones INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']."  group by tbp_prestaciones.pre_responsable";
               $query_5 = mysql_query($tx_5);
              echo '<option value="0"></option>';
                while($a5 = mysql_fetch_array($query_5)){
                    echo '<option value="'.$a5['pre_responsable'].'">'.BuscaRegistro("tb_usuarios","us_id",$a5['pre_responsable'],"us_name").'</option>';
                }
            ?>
          </select>
     </div>

      
  
</form>
<div id="contenedor_tabla">

<!-- comienza tabla -->
  <table class="table table-striped">
        <thead>
          <tr>
          <th>Prestación</th>
          <th>Estado</th>
          <th>Tipo</th>
       <!--   <th>Actual</th>-->
          <th>Tema</th>
          <th>Beneficiario</th>
          <th>Responsable</th>
          <th>Inicio</th>
          <th>Fin</th>
          <th></th>
          <th></th>
          </tr>
        </thead>

            <tbody>
      <?php
      if($_POST['ben']==0){
        $fil1 = "";
      } else {
        $fil1 = " and tbp_prestaciones_beneficiarios.pb_dp_id = '".$_POST['ben']."'";
      }
      if($_POST['pres']==0){
        $fil2 = "";
      } else {

          $tx_1 = "SELECT pre_id FROM tbp_prestaciones WHERE pre_pr_id = ".$_POST['pres'];
          $query_1 = mysql_query($tx_1);
          if(mysql_num_rows($query_1)>0){
          $fil2 = " and ( ";
            while($a1 = mysql_fetch_array($query_1)){
              $pre_id = $a1['pre_id'];
              $fil2 .= " tbp_prestaciones_beneficiarios.pb_pre_id = '".$pre_id."' or ";
            }
          $fil2 = substr($fil2, 0, -3);
        $fil2 = $fil2." ) ";
      } else {
        $fil2 = "";
      }
      }

      if($_POST['state']==0){
        $fil3 = "";
      } else {
        $fil3 = " and tbp_prestaciones_beneficiarios.pb_state = '".$_POST['state']."'";
      }

      if($_POST['type']==0){
        $fil4 = "";
      } else {
        $fil4 = " and tbp_prestaciones_lista.tbp_pt_id = ".$_POST['type'];
      }

      if($_POST['respo']==0){
        $fil5 = "";
      } else {
        $fil5 = " and tbp_prestaciones.pre_responsable = ".$_POST['respo'];
      }


      $tx_f = "SELECT * FROM tbp_prestaciones_beneficiarios INNER JOIN tb_datos_personales ON tbp_prestaciones_beneficiarios.pb_dp_id = tb_datos_personales.dp_id INNER JOIN tbp_prestaciones ON tbp_prestaciones.pre_id = tbp_prestaciones_beneficiarios.pb_pre_id INNER JOIN tbp_prestaciones_lista ON tbp_prestaciones_lista.tbp_pr_id = tbp_prestaciones.pre_pr_id WHERE (tbp_prestaciones_lista.tbp_sis_id = ".$_SESSION['sistema']." ".$fil1." ".$fil2." ".$fil3." ".$fil4." ".$fil5.") order by tb_datos_personales.dp_name";

      $qe=mysql_query($tx_f);

    //  echo $tx_f;

      if($fil2 != "" or $fil1 != "" or $fil3 != "" or $fil4 != "" or $fil5 != ""){
        while($row = mysql_fetch_array($qe)){
  echo '<tr>';

 echo '<td>'.$row['tbp_pr_name'].'</td>';
 RetornaEstado ($row['pb_id'], BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_id"));

/* if(BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_gr")==1) { $car='GRUPAL'; } else { $car='INDIVIDUAL'; }*/
  echo '<td>'.BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_name").'</td>';
/*  if($row['tbp_pr_activo']==1) { $act='<b><span style="color:#AB2419;">NO</span></b>'; } else { $act='<b><span style="color:#459024;">SI</span></b>'; }
  echo '<td>'.$act.'</td>';*/
  echo '<td>'.$row['pre_tema'].'</td>';
  echo '<td><a href="detalle_persona.php?dp_id='.$row['dp_id'].'" title="detalle del beneficiario">'.$row['dp_name'].'</a></td>';
  if($row['pre_responsable']==0){
    $resp = "";
  } else {
    $resp = BuscaRegistro("tb_usuarios","us_id",$row['pre_responsable'],"us_name");
  }
  echo '<td>'.$resp.'</td>';
  echo '<td>'.$row['pre_fecha'].'</td>';
  if($row['pre_fecha_out']=="0000-00-00"){ $fecha_out = $row['pre_fecha']; } else { $fecha_out = $row['pre_fecha_out']; }
  echo '<td>'.$fecha_out.'</td>';
  echo '<td>';
    if(BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_temp")==1){
      LinkEstado ($row['pb_id'], BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_id"));
    }

  echo '</td>';
  echo '<td><a href="tools/quitar_prestacion.php?tabla=tbp_prestaciones_beneficiarios&id=pb_id&val='.$row['pb_id'].'&tipo='.BuscaRegistro("tbp_prestacion_type","pt_id",$row['tbp_pt_id'],"pt_gr").'&pre_id='.$row['pre_id'].'" class="fancybox fancybox.iframe"><button type="button" class="btn btn-warning btn-sm">
    <span class="glyphicon glyphicon-trash"></span></button></a></td>';
  echo '</tr>';
  }
}
               ?>


            </tbody>
        </table>



<!-- fin tabla -->
</div>

        <br><br><br><br>
  <!-- fin contenido -->
</div>
<?php include("pie.php"); ?>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

  <script type="text/javascript" language="javascript" class="init">
  $(document).ready(function() {
  /*  $("#prestacion_filtro").on("change",MuestraTabla);
   $("#beneficiario_filtro").on("change",MuestraTabla);


   function MuestraTabla (){
        var ben = $("#beneficiario_filtro").val();
        var pres = $("#prestacion_filtro").val();

          //  alert(id_loc+es_calle+es_nro);
            $.post("tools/listado_pres.php", { ben: ben, pres: pres }, function(datos){
              $("#contenedor_tabla").html(datos);
            });

      };*/

    $("#prestacion_filtro").on("change",BuscaTabla);
   $("#beneficiario_filtro").on("change",BuscaTabla);
   $("#estado_filtro").on("change",BuscaTabla);
   $("#tipo_filtro").on("change",BuscaTabla);
   $("#tipo_responsable").on("change",BuscaTabla);


   function BuscaTabla (){
       $("#buscador").submit();
        };

});
  </script>
 <script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.5"></script>
  <script type="text/javascript">
    $(document).ready(function() {
          $('.fancybox').fancybox();
      $("#fancybox-manual-b").click(function() {
        $.fancybox.open({
          href : 'iframe.html',
          type : 'iframe',
          padding : 5
        });
      });
        $(".fancybox").fancybox({
        afterClose  : function() {
            window.location.reload();
        }
    });
});
  </script>
  <script type="text/javascript" language="javascript" src="../js/navbar.js"></script>
</body>
</html>
