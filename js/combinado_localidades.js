$(document).ready(function(){
	$("#iddepartamento").change(function () {  
                $("#iddepartamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("../recorte_gral/localidades.php", { elegido: elegido }, function(data){
            $("#idlocalidad").html(data);
            });           
        }); 
      });
});