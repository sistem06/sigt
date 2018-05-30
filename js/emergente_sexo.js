$(document).ready(function(){
 $("#idsexo").change(function(){
      if($("#idsexo").val()==3){
          $("#agregasexo").trigger("click");
      }
    });
});