<?php
require('fpdf.php');
include ('../conecta.php');
include ('../funciones/funciones_generales.php');
$dp_id = $_POST['dp_id'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	$this->SetFont('Arial','',15);
    // Movernos a la derecha
//    $this->Cell(80);
    // Título
    $this->Cell(185,10,(BuscaRegistro ("tb_datos_personales", "dp_id", $_POST['dp_id'], "dp_name")).' - '.BuscaRegistro ("tb_datos_personales", "dp_id", $_POST['dp_id'], "dp_cuil"),"B",0,'C');
    // Salto de línea
    $this->Ln(10);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}
}
$pdf = new PDF();

$pdf->AddPage();

if(isset($_POST['datos_personales'])){

	$pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'DATOS PERSONALES','TB',0,'C');
    $pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Apellido y Nombre:",0,0,'L');    
	$pdf->Cell(0,10,"Fecha de Nacimiento:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,(BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_name")),0,0,'L');    
	$pdf->Cell(0,10,fecha_dev(BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_nacimiento")),0,0,'L');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"CUIL:",0,0,'L');    
	$pdf->Cell(0,10,"Edad:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_cuil"),0,0,'L');    
	$pdf->Cell(0,10,Edad(BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_nacimiento")),0,0,'L');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Sexo:",0,0,'L');    
	$pdf->Cell(0,10,"Pais de Nacimiento:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_sexos", "sx_id",BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_sexo"),"sx_name"),0,0,'L');    
	$pdf->Cell(0,10,BuscaRegistro ("tb_paises", "pa_id",BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_pais_nacimiento"),"pa_name"),0,0,'L');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Documento:",0,0,'L');    
	$pdf->Cell(0,10,"Estado Civil:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_nro_doc"),0,0,'L');    
	$pdf->Cell(0,10,BuscaRegistro ("tb_estado_civil", "ec_id",BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_estado_civil"),"ec_name"),0,0,'L');

	$pdf->Ln(15);

	$pdf->SetFont('Arial','',12);
  $pdf->Cell(185,10,'DATOS DE CONTACTO Y VIAS DE COMUNICACION','TB',0,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Telefono Fijo:",0,0,'L');    
	$pdf->Cell(0,10,"Telefono Movil:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_telefono"),0,0,'L');
	$pdf->Cell(0,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_movil"),0,0,'L');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Correo Electronico:",0,0,'L');    
	$pdf->Cell(0,10,"Telefono Movil Alternativo:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_mail"),0,0,'L');
	$pdf->Cell(0,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_movil1"),0,0,'L');

	$pdf->Ln(7);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Facebook:",0,0,'L');    
	$pdf->Cell(0,10,"Pagina Web:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_facebook"),0,0,'L');
	$pdf->Cell(0,10,BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_web"),0,0,'L');

	$pdf->Ln(15);

	$pdf->SetFont('Arial','',12);
  $pdf->Cell(185,10,'DOMICILIO','TB',0,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Domicilio:",0,0,'L');    
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,TirameDomicilio ($dp_id),0,0,'L');
	$pdf->Ln(7);
	 $pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Barrio:",0,0,'L');    
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,TirameBarrio ($dp_id),0,0,'L');
    $pdf->Ln(15);
}

if(isset($_POST['documentos_graficos'])){

    $pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'DOCUMENTOS GRÁFICOS','TB',0,'C');
    $pdf->Ln(10);

    $txt_grap = "select * from tb_imagenes where img_dp_id =".$dp_id;
          $query_grap = mysql_query($txt_grap);
          $n_grap = mysql_num_rows($query_grap);

          if($n_grap==0){
             $pdf->SetFont('Arial','B',12);
             $pdf->Cell(80,10,"No hay documentos gráficos para mostrar",0,0,'L');    
             $pdf->Ln(15);
          } else {
            while($a_grap = mysql_fetch_array($query_grap)){
                $pdf->Ln(5);
            $pdf->Image('../imagenes/'.$a_grap["img_dni_name"],null,null,-300);
        }
        $pdf->Ln(10);
          }

    }

if(isset($_POST['datos_hogar'])){

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(185,10,'MIEMBROS DEL HOGAR','TB',0,'C');
    $pdf->Ln(10);

    $dat_ho = mysql_fetch_array(mysql_query("SELECT hb_ho_id FROM tb_hogar_beneficiario WHERE hb_dp_id = '$dp_id'"));
    $hb_ho_id = $dat_ho['hb_ho_id'];
 $query_hogar = mysql_query("select * from tb_hogar_beneficiario where hb_ho_id = '$hb_ho_id'");
 $pdf->SetFont('Arial','B',12);
        while($a_hogar = mysql_fetch_array($query_hogar)){
            $n_dp_id = $a_hogar['hb_dp_id'];
            $n_parent = BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_parentesco");
            $pdf->Ln(5);
             $pdf->Cell(80,10,BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_name").' - DOC: '.BuscaRegistro ("tb_datos_personales", "dp_id", $n_dp_id, "dp_nro_doc"),0,0,'L');    
             $pdf->Ln(5);
         
        }
        $pdf->Ln(10);

    }


if(isset($_POST['datos_educativos'])){

	$pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'DATOS EDUCATIVOS','TB',0,'C');
    $pdf->Ln(10);

     $pdf->SetFont('Arial','',13);
  $pdf->Cell(185,10,'Nivel educativo alcanzado:','TB',0,'C');
    $pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(50,10,"NIVEL:",0,0,'L');
    $pdf->Cell(50,10,"ESTADO:",0,0,'L');    
	$pdf->Cell(0,10,"TITULO:",0,0,'L');
	 $pdf->Ln(7);
	 $pdf->SetFont('Arial','',12);
   $txt_ne = "select * from tb_datos_nivel_educativo where dne_dp_id = ".$dp_id;
   $query_ne = mysql_query($txt_ne);
        while($a_ne = mysql_fetch_array($query_ne)){
        	$pdf->Cell(50,10,BuscaRegistroM ("tb_nivel_educativo", "ne_id", $a_ne["dne_nivel"], "ne_name"),0,0,'L');
    		$pdf->Cell(50,10,BuscaRegistroM ("tb_estado_titulo", "et_id", $a_ne["dne_termino"], "et_name"),0,0,'L');    
			$pdf->Cell(0,10,BuscaRegistroM ("tb_titulo_secundario", "ts_id", $a_ne["dne_titulo"], "ts_name"),0,0,'L');
             $pdf->Ln(5);           
                    }
    $pdf->Ln(10);
/*
    $pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'FORMACION PROFESIONAL - CURSOS','TB',0,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(90,10,"CURSO:",0,0,'L');
    $pdf->Cell(50,10,"ESTADO:",0,0,'L');    
	$pdf->Cell(0,10,"AÑO:",0,0,'L');
	 $pdf->Ln(7);
	 $pdf->SetFont('Arial','',12);
	 $ttx = "select * from tb_beneficiario_formacion_profesional INNER JOIN tb_formacion_profesional ON tb_beneficiario_formacion_profesional.bfp_fp_id = tb_formacion_profesional.fp_id INNER JOIN tb_situaciones_curso ON tb_beneficiario_formacion_profesional.bfp_situacion = tb_situaciones_curso.sc_id where tb_beneficiario_formacion_profesional.bfp_dp_id = ".$dp_id;
            $list = mysql_query($ttx);
            while($lis_dat = mysql_fetch_array($list)){
            	$pdf->Cell(90,10,strtoupper(($lis_dat['fp_name'])),0,0,'L');
    		$pdf->Cell(50,10,strtoupper(($lis_dat['sc_name'])),0,0,'L');    
			$pdf->Cell(0,10,strtoupper(($lis_dat['bfp_year'])),0,0,'L');
             $pdf->Ln(5);
            }
     $pdf->Ln(10);
*/
    $pdf->SetFont('Arial','',13);
  $pdf->Cell(185,10,'IDIOMAS QUE MANEJA','TB',0,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(90,10,"IDIOMA:",0,0,'L');
     
    $pdf->Cell(0,10,"NIVEL:",0,0,'L');
     $pdf->Ln(7);
     $pdf->SetFont('Arial','',12);

     $ttx2 = "select * from tb_beneficiario_idioma where bi_dp_id = ".$dp_id;
                    $list2 = mysql_query($ttx2);
                    while($lis_dat2 = mysql_fetch_array($list2)){
                        $pdf->Cell(90,10,BuscaRegistroM ("tb_idiomas", "idi_id", $lis_dat2['bi_idi_id'], "idi_name"),0,0,'L');    
            $pdf->Cell(0,10,BuscaRegistroM ("tb_niveles_idiomas", "ni_id", $lis_dat2['bi_nivel'], "ni_name"),0,0,'L');
             $pdf->Ln(5);
                    }

     $pdf->Ln(10);
}

if(isset($_POST['datos_discapacidad'])){

    $pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'DATOS DE DISCAPACIDAD','TB',0,'C');
    $pdf->Ln(10);

     $pdf->SetFont('Arial','B',12);
     $pdf->Cell(80,10,"Tiene Discapacidad: ".SiNo(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_tiene_discapacidad")),0,0,'L');    
     $pdf->Ln(10);

     if(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_tiene_discapacidad")==1){

         $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80,10,"Nro de CUD:",0,0,'L');    
         $pdf->Cell(0,10,"Ley que Certifica:",0,0,'L');
     $pdf->Ln(5);
     $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_nro_cud"),0,0,'L');
    $pdf->Cell(0,10,BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_ley_cud"),0,0,'L');

    $pdf->Ln(7);

    if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_descripcion_cud"))){
         $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80,10,"Descripcion del Certificado:",0,0,'L');    
         
     $pdf->Ln(5);
     $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_descripcion_cud"),0,0,'L');

    $pdf->Ln(7);
}
     $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80,10,"Vigencia Desde:",0,0,'L');    
         $pdf->Cell(0,10,"Vigencia Hasta:",0,0,'L');
     $pdf->Ln(5);
     $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,fecha_dev(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_desde_cud")),0,0,'L');
    $pdf->Cell(0,10,fecha_dev(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_vencimiento_cud")),0,0,'L');

    $pdf->Ln(7);
     

     if(!empty(BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_ente_cud"))){
         $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80,10,"Ente Certificador:",0,0,'L');    
         
     $pdf->Ln(5);
     $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,BuscaRegistro ("tb_datos_salud", "ds_dp_id", $dp_id, "ds_ente_cud"),0,0,'L');

    $pdf->Ln(7);
     }
    }
    }

$pdf->Output();
?>