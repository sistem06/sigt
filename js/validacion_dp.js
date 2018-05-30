$(document).ready(function() {
	$("#parte1").submit(function(event){
		if($("#idapellido").val()==""){
          $("#falta_apellido").show();
          $("#idapellido").focus();
          event.preventDefault();
        }
     if($("#idnombre").val()==""){
          $("#falta_nombre").show();
          $("#idnombre").focus();
           event.preventDefault();
        }
      if($("#nacim").val()==""){
          $("#falta_nacim").show();
          $("#nacim").focus();
          event.preventDefault();
        } else {
          var ano = $("#nacim").val().substring(0,4);
          var fecha = new Date();
          var ano_actual = fecha.getFullYear();
          if(ano > ano_actual || ano < 1900){
            $("#falta_nacim").show();
            $("#falta_nacim").html("la fecha ingresada no es valida");
          $("#nacim").focus();
           event.preventDefault();
          }
        }
        if($("#nrocuil").val().length < 13){
          $("#falta_cuil").show();
          $("#nrocuil").focus();
         event.preventDefault();
        }
        if($("#latid").val()==""){
          $("#falta_mapa").show();
          $("#falta_mapa").focus();
          event.preventDefault();
        }
        if($("#muestra_edad").val() < $("#anos_residencia").val()){
          $("#falta_resi").show();
          $("#muestra_edad").focus();
          return false;
        }
	});
});