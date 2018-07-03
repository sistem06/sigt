$(document).ready(function(){
	$("#iddepartamento").change(function () {
  	$("#iddepartamento option:selected").each(function () {
    	elegido=$(this).val();
			localidad=$("#idlocalidad").val();
      $.post("../recorte_gral/localidades.php", { elegido: elegido, localidad: localidad }, function(data){
      	$("#idlocalidad").html(data);
      });
    });
  });
});
