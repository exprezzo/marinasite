<?php
if ( !isset($_SESSION['isLoged'])|| $_SESSION['isLoged']!=true ){
	header ('Location: /admin/user/login'); exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="us">
<head>
	<meta charset="utf-8">
	<title><?php echo NOMBRE_APL; ?></title>
	<!--jQuery References-->
	<!--link href="/js/jquery-ui-1.9.2.custom/css/flick/jquery-ui-1.9.2.custom.css" rel="stylesheet"-->	
	<script src="/web/libs/jquery-1.8.3.js"></script>
	<script src="/web/libs/jquery-ui-1.9.2.custom/jquery-ui-1.9.2.custom.js"></script>
	<?php 		
		global $_TEMA, $_PETICION;
		
		$rutaTema=getUrlTema($_TEMA);				
	?>
	<link href="<?php echo $rutaTema; ?>" rel="stylesheet" type="text/css" />	
	<!--Wijmo Widgets CSS-->	
	<link href="/web/libs/Wijmo.2.3.2/Wijmo-Complete/css/jquery.wijmo-complete.2.3.2.css" rel="stylesheet" type="text/css" />
	<link href="/web/libs/Wijmo.2.3.2/Wijmo-Open/css/jquery.wijmo-open.2.3.2.css" rel="stylesheet" type="text/css" />				
	<!--Wijmo Widgets JavaScript-->
	<script src="/web/libs/Wijmo.2.3.2/Wijmo-Complete/js/jquery.wijmo-complete.all.2.3.2.min.js" type="text/javascript"></script>
	<script src="/web/libs/Wijmo.2.3.2/Wijmo-Open/js/jquery.wijmo-open.all.2.3.2.min.js" type="text/javascript"></script>	
	<script src="http://use.edgefonts.net/krona-one.js"></script>
	<!-- Gritter -->
	<link href="/web/libs/Gritter-master/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
	<script src="/web/libs/Gritter-master/js/jquery.gritter.min.js" type="text/javascript"></script>
	
	<?php echo '<link href="/web/apps/'.$_PETICION->modulo.'/estilos.css" rel="stylesheet" type="text/css" />'; ?>
	
	<?php echo '<script src="/web/apps/'.$_PETICION->modulo.'/js/funciones.js" type="text/javascript"></script>'; ?>
	<?php echo '<script src="/web/apps/'.$_PETICION->modulo.'/js/TabManager.js" type="text/javascript"></script>'; ?>	
	
	<script type="text/javascript">		
		var sistema={};
		sistema.modulo = "<?php echo $_PETICION->modulo; ?>";
		$(function () {			
			$.extend($.gritter.options, { 
				position: 'bottom-right', // defaults to 'top-right' but can be 'bottom-left', 'bottom-right', 'top-left', 'top-right' 
				fade_in_speed: 'medium', // how fast notifications fade in (string or int)
				fade_out_speed: 2000, // how fast the notices fade out
				time: 6000 // hang on the screen for...
			});
			
			TabManager.init('#tabs');
			
			ajustarTab(); //Ajusta la altura al tama�o en relacion al tama�o de la pantalla
			iniciarLinkTabs(); //A los objetos con atributo linkTab=true,  se les agrega comportamiento ajax para abrir tabs.
			
			//TabManager.add('/welcome');
			TabManager.add('/'+sistema.modulo+'/paginas/welcome');

			$(window).resize(function() {
			  ajustarTab();
			});
			
			$('.user_widget a').mouseenter(function(){
				$(this).addClass('ui-state-hover');
			});			
			$('.user_widget a').mouseleave(function(){
				$(this).removeClass('ui-state-hover');
			});
			
			$('.header_empresa').mouseenter(function(){
				$(this).addClass('ui-state-hover');
			});			
			$('.header_empresa').mouseleave(function(){
				$(this).removeClass('ui-state-hover');
			});
			
			
			//$("#splitter").wijsplitter({ orientation: "horizontal" });
			
			 $(".accesos_directos").wijcarousel({
                display: 12,
                step: 4,
                orientation: "horizontal"
            });			
		});		
	</script>
	<style type="text/css">
		
		@media only screen and (max-width: 999px) {	  } /* rules that only apply for canvases narrower than 1000px */
		@media only screen and (device-width: 768px) and (orientation: landscape) {} /* rules for iPad in landscape orientation */
		@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {}/* iPhone, Android rules here */		
		.link{
			cursor:pointer;
		}
		.ui-tabs .ui-tabs-nav{
			/* border-bottom:0; */
		}
		.ui-tabs .ui-tabs-hide {
			display: none !important;
		}
		
		
		
		.main_header{
			display: inline-block;
			width: 100%;
			border: 0;
		}

		
		.wijmo-wijsplitter-h-panel1.ui-resizable{
				transition:height .5s;
				-moz-transition:height .5s; /* Firefox 4 */
				-webkit-transition:height .5s; /* Safari and Chrome */
				-o-transition:height .5s; /* Opera */					
		}
		#tabs > ul{display:none;}
	</style>
	<?php //echo '<link href="/web/apps/'.$_PETICION->modulo.'/tema_mod/estilos.css" rel="stylesheet" type="text/css" />'; ?>
</head>
<body style="padding:0; margin:0;" class="ui-widget-content" >	
	<div id="splitter">
		<div class="main_header">
			<div style="padding:0px 0 0px 0px; float:left;position:relative;">
				<a class="header_empresa ui-state-default" href="/index"><span style="margin:8px;"><?php echo NOMBRE_APL; ?></span></a>
			</div>	
					
			<div class="user_widget" >
				<a class ="left ui-state-default" href="/<?php echo  $_PETICION->modulo; ?>/user/perfil" tablink="true">Perfil</a>
				<a class ="right ui-state-default" href="/<?php echo $_PETICION->modulo; ?>/user/logout" tablink="false">Salir</a>
			</div>						
			
			<?php 
			
			$this->mostrar($_PETICION->controlador.'/accesos_directos'); ?>
		</div>
		<div id="tabs">
			 <ul>			
			</ul>		
		</div>	
	</div>	
</body>
</html>