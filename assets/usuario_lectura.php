<?php
if (!isset($_SESSION)) { session_start(); }
if ($_SESSION['sector']==4) { $readonly = TRUE; } else { $readonly = FALSE;};

?>

<script type="text/javascript" language="javascript">
	$(document).ready(function() {
	  var form = document.forms[0] //, // form element to be "readonly"
	      //btn1 = document.querySelectorAll('button')[0]

	  function lockForm(){
	    /*btn1.classList.toggle('on');*/
	    [].slice.call( form.elements ).forEach(function(item){
	        item.disabled = !item.disabled;
	    });
	  }

		//Desactiva edición de campos para usuarios de Lectura
		var readonly = <?php echo $readonly; ?>;
		if (readonly) {
			lockForm();
		};
	});
</script>
