$(document).ready(function() {
		$("#nacim").focusout(function(){
        var fecha = $("#nacim").val();
        if($("#nacim").val() != ""){
          $.get("../recorte_gral/calcula_edad.php", {fecha_in: fecha}, function(htmlexterno){
              $("#muestra_edad").val(htmlexterno);
          });
        }
      });
});