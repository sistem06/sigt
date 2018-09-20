$(document).ready(function(){
	$("#idlocalidad").on("change",Buscaloc);
   $("#dpcalle").on("change",Buscaloc);
   $("#geoloc").on("mouseover",Buscaloc);
   $("#nrolocac").on("change",Buscaloc);


   function Buscaloc (){
        var id_loc = $("#idlocalidad").val();
            var es_calle = $("#dpcalle").val();
            var es_nro = $("#nrolocac").val();
            //alert(id_loc+es_calle+es_nro);
            $.post("../recorte_gral/localidades_str.php", { id_loc: id_loc, es_calle: es_calle, es_nro: es_nro }, function(datos){
              $("#address").attr("value",datos);
            });

      };
});
