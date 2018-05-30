$(document).ready(function(){
		$("#map").on("mouseover",BuscaBarrio);
            $("#envia1").on("mouseover",BuscaBarrio);
            $("#geoloc").on("click",BuscaBarrio);

          function BuscaBarrio(){

              $.post("../recorte_gral/busca_barrio.php",{coor : $("#latid").val()},function(respbarrio){
                  $("#barrioid").val(respbarrio);
              });  

              $.post("../recorte_gral/busca_caat.php",{coor : $("#latid").val()},function(respcaat){
                  $("#caatid").val(respcaat);
              });         
          };
});