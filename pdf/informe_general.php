<?php
require('fpdf.php');
include ('../conecta.php');
include ('../funciones/funciones_generales.php');
$dp_id = $_POST['dp_id'];

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	$this->SetFont('Arial','',15);
    // Movernos a la derecha
//    $this->Cell(80);
    // T�tulo
    $this->Cell(185,10,BuscaRegistro ("tb_datos_personales", "dp_id", $_POST['dp_id'], "dp_name").' - '.BuscaRegistro ("tb_datos_personales", "dp_id", $_POST['dp_id'], "dp_cuil"),"B",0,'C');
    // Salto de l�nea
    $this->Ln(10);

}

// Pie de p�gina
function Footer()
{
    // Posici�n: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // N�mero de p�gina
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}
}
$pdf = new PDF();

$pdf->AddPage();

	$pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'DATOS PERSONALES','TB',0,'C');
    $pdf->Ln(10);

	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(80,10,"Apellido y Nombre:",0,0,'L');
	$pdf->Cell(0,10,"Fecha de Nacimiento:",0,0,'L');
	 $pdf->Ln(5);
	 $pdf->SetFont('Arial','',12);
    $pdf->Cell(80,10,utf8_decode(BuscaRegistro ("tb_datos_personales", "dp_id", $dp_id, "dp_name")),0,0,'L');
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

	$pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'DATOS EDUCATIVOS','TB',0,'C');
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

    $pdf->SetFont('Arial','B',13);
  $pdf->Cell(185,10,'FORMACION PROFESIONAL - CURSOS','TB',0,'C');
    $pdf->Ln(10);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(90,10,"CURSO:",0,0,'L');
    $pdf->Cell(50,10,"ESTADO:",0,0,'L');
	$pdf->Cell(0,10,"A�O:",0,0,'L');
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

    $pdf->SetFont('Arial','',13);
  $pdf->Cell(185,10,'IDIOMAS QUE MANEJA','TB',0,'C');
    $pdf->Ln(10);

$pdf->Output();
?>
