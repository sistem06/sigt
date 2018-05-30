$(document).ready(function() {
	$("#parte1").submit(function(event){
		
     if($("#idapellido").val() == ""){
          $("#faltaapellido").show();
          $("#faltaapellido").html("debe completar el apellido");
          $("#idapellido").focus();
          event.preventDefault();
        }
        
        if($("#idnombre").val() == ""){
          $("#faltanombre").show();
          $("#faltanombre").html("debe completar el nombre");
          $("#idnombre").focus();
          event.preventDefault();
        }

        if($("#nrodni").val().length < 7){
          $("#faltadni").show();
          $("#faltadni").html("debe completar el nro de documento con todos sus numeros");
          $("#nrodni").focus();
          event.preventDefault();
        } 
 });

  $("#nrodni").on("mouseout",Buscadni);
       $("#envia1").on("mouseover",Buscadni);

       function Buscadni (){
      
        if($("#nrodni").val().length == 7 || $("#nrodni").val().length == 8) {
            $.get("../recorte_gral/comprobar_ben_doble.php", {dnii: $("#nrodni").val(), tabla: "tb_datos_personales", valorbusc: "dp_nro_doc", actual:$("#nro_doc").val()}, function(respuesta){
                    if (respuesta == "B"){
                        $(".yasta").show();
                        $(".yasta").html("Ya existe un Beneficiario con el nro de documento ingresado");
                        $('#envia1').attr("disabled", true);
                        $(".yasta").focus();
                         event.preventDefault();
                    } 
                    if (respuesta != "B" && respuesta != "A"){
                        $(".yasta").show();
                        $('.yasta').html('Con el nro de documento ingresado ya esta en el sistema');
                        $('#envia1').attr("disabled", true);
                        event.preventDefault();
                          $(".yasta").focus();
                    } 
              });
        }
     };
	
});