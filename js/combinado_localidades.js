$(document).ready(function(){
	var ruta_localidades = window.location.origin + "/sigt/recorte_gral/localidades.php"
	$("#iddepartamento").change(function () {
  	$("#iddepartamento option:selected").each(function () {
    	elegido=$(this).val();
			localidad=$("#idlocalidad").val();
      $.post(ruta_localidades, { elegido: elegido, localidad: localidad }, function(data){
      	$("#idlocalidad").html(data);
      });
    });
  });
});
