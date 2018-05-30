$(document).ready(function() {
	$("#idnacionalidad").change(function(){
        if($("#idnacionalidad").val() == 1){
          $("#idpaisnacimiento").attr('disabled','disabled');
          $("#anos_residencia").attr('disabled','disabled');
        } else {
            $("#idpaisnacimiento").removeAttr('disabled','disabled');
            $("#anos_residencia").removeAttr('disabled','disabled');
        }
    });
});