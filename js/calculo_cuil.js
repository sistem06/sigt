$(document).ready(function() {
		 $("#idsexo").change(function(){
          if($("#idsexo").val() != 3 && $("#idtipodoc").val()==1 && $("#nrodni").val().length ==8){
            if($("#idsexo").val() == 1){
              var nro_in = 27;
              var pte1 = 38;
            } else {
              var nro_in = 20;
              var pte1 = 10;
            }
            var nr1 = Math.floor($("#nrodni").val()/10000000);
            var nr2 = Math.floor($("#nrodni").val()/1000000)-(nr1 * 10);
            var nr3 = Math.floor($("#nrodni").val()/100000)-((nr1 * 100)+(nr2 * 10));
            var nr4 = Math.floor($("#nrodni").val()/10000)-((nr1 * 1000)+(nr2 * 100)+(nr3 * 10));
            var nr5 = Math.floor($("#nrodni").val()/1000)-((nr1 * 10000)+(nr2 * 1000)+(nr3 * 100)+(nr4 * 10));
            var nr6 = Math.floor($("#nrodni").val()/100)-((nr1 * 100000)+(nr2 * 10000)+(nr3 * 1000)+(nr4 * 100)+(nr5 * 10));
            var nr7 = Math.floor($("#nrodni").val()/10)-((nr1 * 1000000)+(nr2 * 100000)+(nr3 * 10000)+(nr4 * 1000)+(nr5 * 100)+(nr6 * 10));
            var nr8 = $("#nrodni").val()-((nr1 * 10000000)+(nr2 * 1000000)+(nr3 * 100000)+(nr4 * 10000)+(nr5 * 1000)+(nr6 * 100)+(nr7 * 10));
            var sum_nro = pte1 + nr1*3 + nr2*2 + nr3*7 + nr4*6 + nr5*5 + nr6*4 + nr7*3 + nr8*2;
            var cosi = Math.floor(sum_nro / 11);
            var resto = sum_nro - (cosi*11);
              if(resto == 0){
                var zz=0;
              } else {
                  if(resto==1){
                            if($("#idsexo").val() == 1){
                                var nro_in = 23;
                                var zz = 4;
                              } else {
                                var nro_in = 23;
                                var zz = 9;
                              }
                  } else {
                    var zz = 11 - resto;
                  }
              }

            $("#nrocuil").val(nro_in+'-'+$("#nrodni").val()+'-'+zz);
          }
      });
});