<?php
	$cliente = DatosPersonales::find($_POST['dp_id']);
				   $cliente->dp_sexo = $_POST['dp_sexo'];
				   $cliente->dp_cuil = $_POST['dp_cuil'];
				   $cliente->dp_estado_civil = $_POST['dp_estado_civil'];
				   $cliente->dp_nacionalidad = $_POST['dp_nacionalidad'];
            if($_POST['dp_nacionalidad']==1){
               $cliente->dp_pais_nacimiento = 13;
            } else {

               if(!empty($_POST['dp_pais_nacimiento'])){
               $cliente->dp_pais_nacimiento = $_POST['dp_pais_nacimiento'];
            }}

            if(!empty($_POST['dp_anos_residencia'])){
               $cliente->dp_anos_residencia = $_POST['dp_anos_residencia'];
            }

            if(!empty($_POST['dp_nacimiento'])){
               $cliente->dp_nacimiento = $_POST['dp_nacimiento'];
            }
            if(!empty($_POST['dp_web'])){
               $cliente->dp_web = $_POST['dp_web'];
            }
           // if($_POST['dp_veterano']==1){
               $cliente->dp_veterano = $_POST['dp_veterano'];
           // }
           // if($_POST['dp_fam_veterano']==1){
               $cliente->dp_fam_veterano = $_POST['dp_fam_veterano'];
          //  }
            if($_POST['dp_pueblo_originario']==1){
               $cliente->dp_pueblo_originario = $_POST['dp_pueblo_originario'];
               if(isset($_POST['dp_nombre_pueblo_originario'])){
               		$cliente->dp_nombre_pueblo_originario = $_POST['dp_nombre_pueblo_originario'];
               }
            } else {
            	$cliente->dp_pueblo_originario = $_POST['dp_pueblo_originario'];
            	$cliente->dp_nombre_pueblo_originario = 0;
            }
				   $cliente->dp_telefono = $_POST['dp_telefono'];
				   $cliente->dp_movil = $_POST['dp_movil'];
				   $cliente->dp_telefono1 = $_POST['dp_telefono1'];
				   $cliente->dp_movil1 = $_POST['dp_movil1'];
				   $cliente->dp_observaciones = $_POST['dp_observaciones'];
				   $cliente->dp_mail = $_POST['dp_mail'];
				   $cliente->dp_facebook = $_POST['dp_facebook'];
				   $cliente->dp_us_relevamiento = $_POST['us_relevamiento'];
				   $cliente->save();
?>
