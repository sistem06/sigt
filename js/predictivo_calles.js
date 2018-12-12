$(document).ready(function() {
    var ruta_autocomp = window.location.origin + "/sigt/recorte_gral/tools/autocom.php"
		var ruta_autocomp1 = window.location.origin + "/sigt/recorte_gral/tools/autocom1.php"
		$("#dpcalle").keyup(function(){
			  if($("#dpcalle").val().length>1){
                $("#listado_calles").show();

                  $.post(ruta_autocomp,{busca: $("#dpcalle").val()}, function(htmlexterno){
                      $("#listado_calles").html(htmlexterno);
                  });

                   $("#listado_calles").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#dpcalle").val(dato);
                        $("#listado_calles").hide();
                        $("#falta_calle").hide();
                        $("#geoloc").removeAttr("disabled");
                        $.post(ruta_autocomp1,{busca: $("#dpcalle").val()},function(result){
                    $("#valor_calle").val(result);
                });
                        return false;
                  });
             } else {
                $("#listado_calles").hide();
                $("#valor_calle").val("");
                $("#geoloc").removeAttr("disabled");
              }
          });
});
