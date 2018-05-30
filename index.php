<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acceso al sistema</title>
	
	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	<!-- bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="css/font-awesome-4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />

	<link href="css/style.css" rel="stylesheet" type="text/css" />
<script> 
function enviar_formulario(){ 
   document.formulario1.submit() 
} 
</script> 
	
</head>
<body>

	<div id="loading">
		<div>
			<div></div>
		    <div></div>
		    <div></div>
		</div>
	</div>


		<div id="content" class="c-login clearfix">

			<div class="header">
					<a href="index.html"><img src="images/logo.png"></a>
			</div> <!-- /header -->

			<div class="breadcrumbs">
				<i class="fa fa-key"></i> Acceso
			</div>

			
			<div class="widget-content">
			<form method="post" action="login.php" name="formulario1">
				<input type="text" placeholder="Usuario" name="usuario">
				<input type="password" placeholder="Clave" name="clave">
				<a href="javascript:enviar_formulario()" class="btn btn-blue pull-right">Ingresar</a>
				</form>
			</div>
			<?php
			if (isset($_GET['error'])){
			if ($_GET['error']==1){
			?>
		<div id="error">Usuario o Clave incorrecta </div>
			<?php
			}}
			?>

		</div> <!-- /content -->
		
		<footer class="footer">
			2016 © Sistema Social desarrollado por <a href="http://www.sistemasenlaweb.com.ar">phpbariloche</a>
		</footer>

	</div> <!-- /wrapper -->


	<script type="text/javascript" src="js_index/prefixfree.min.js"></script>
	<script type="text/javascript" src="js_index/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js_index/jquery-ui.js"></script>
	<script type="text/javascript" src="js_index/bootstrap.min.js"></script>
	<script type="text/javascript" src="js_index/excanvas.min.js"></script>
	
	<script type="text/javascript" src="js_index/jquery.flot.js"></script>
	<script type="text/javascript" src="js_index/jquery.flot.resize.js"></script>
	<script type="text/javascript" src="js_index/jquery.flot.categories.js"></script>
	<script type="text/javascript" src="js_index/jquery.flot.fillbetween.js"></script>
	<script type="text/javascript" src="js_index/jquery.flot.stack.js"></script>
	<script type="text/javascript" src="js_index/jquery.flot.crosshair.js"></script>

	<script type="text/javascript" src="js_index/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="js_index/jquery.hashchange.min.js"></script>
	<script type="text/javascript" src="js_index/jquery.easytabs.min.js"></script>

	<script type="text/javascript">

		$(window).load(function(){
			$('#loading').fadeOut(1000);

		// $(document).ready(function(){

			$('.collapsible > a').click(function(){
				$(this).parent().toggleClass('open');
				if( $(this).parent().siblings().hasClass('open') ){
					$(this).parent().siblings().removeClass('open');
				}
			return false;
			}) // Collapsible


			
			$('#sts_5').sparkline('html', { 
				type: 'bullet',
				height: '40px',				
				tooltipClassname:'tooltip-sp',
				targetColor:'#e86f56'
			});

			$('#sts_6').sparkline('html', { 
				type: 'pie',
				height: '40px',				
				tooltipClassname:'tooltip-sp',
				targetColor:'#e86f56'
			});
		    
		  
		    
		 



		   
			

			

			// Mobile Nav
			$('.m-nav').click(function(){
				$('.main-nav').toggleClass('open');
			})

			// Quick Nav clicks
			$('.qn-arrow-left').click(function(){
				var sel = $('.quick-nav ul').find('.active');
				if( sel.hasClass('qn-first') ){
					sel.removeClass('active');
					sel.parent().find('.qn-last').addClass('active');
				} else {
					sel.removeClass('active').prev().addClass('active');
				}
			})
			$('.qn-arrow-right').click(function(){
				var sel = $('.quick-nav ul').find('.active');
				if( sel.hasClass('qn-last') ){
					sel.removeClass('active');
					sel.parent().find('.qn-first').addClass('active');
				} else {
					sel.removeClass('active').next().addClass('active');
				}
			})

			

		}) // Ready.
	</script>
</body>
</html>