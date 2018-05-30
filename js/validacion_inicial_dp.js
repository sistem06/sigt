$(document).ready(function() {
	$("#verificar").click(function() {
          if($("#nro_doc").val().length < 7){
            $("#falta_nro_doc").show();
          } else {
            var nro_doc = $("#nro_doc").val();
            var sistema_actual = $("#sistema_actual").val();
            $.get("../assets/comprobar_inicial.php", {dnii: nro_doc, tabla: "tb_datos_personales", valorbusc: "dp_nro_doc",actual: sistema_actual}, function(respuesta){
                if(respuesta == "A"){
                  
                $("#parte0").hide();
                $("#respuesta_dni_nueva").show();
                
                $("#respuesta_dni_anterior").hide();
                $("#nrodni").attr('disabled','disabled');
                $("#idtipodoc").attr('disabled','disabled');
                $("#nrodni").val(nro_doc);
                $("#pasa_dni").val(nro_doc);
               
                google.maps.event.trigger(initMap());
                    } else {
            var res = respuesta.split("|");
            
            if(res[0]=="B"){
              window.location.href = res[1];
            } 

            if(res[0]=="C"){
              var usuario = $("#esusuario").val();
              $("#respuesta_dni_anterior").show();
              $("#respuesta_dni_nueva").hide();
              $("#respuesta_dni_anterior").html("Con el documento <b>"+$("#nro_doc").val()+"</b> esta dado de alta el beneficiario <b>"+res[2]+"</b> ¿desea agregarlo a este sistema? <a href='tools/agrega_al_sistema.php?dp_id="+res[1]+"&id_us="+usuario+"'>AGREGAR</a>");
              
            }

    }

              })
          }
      });
});