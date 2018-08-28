$(document).ready(function() {
		$("#dpcalle").keyup(function(){
			  if($("#dpcalle").val().length>1){
                $("#listado_calles").show();

                  $.post("../recorte_gral/tools/autocom.php",{busca: $("#dpcalle").val()}, function(htmlexterno){
                      $("#listado_calles").html(htmlexterno);
                  });

                   $("#listado_calles").on("click", ".cada_elemento a", function(){
                    var dato = $(this).attr("value");
                        $("#dpcalle").val(dato);
                        $("#listado_calles").hide();
                        $("#falta_calle").hide();
                        $("#geoloc").removeAttr("disabled");
                        $.post("../recorte_gral/tools/autocom1.php",{busca: $("#dpcalle").val()},function(result){
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
