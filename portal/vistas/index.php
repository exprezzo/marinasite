<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


<html >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="/web/libs/jquery-1.8.3.js"></script>
	<script src="/web/libs/jquery-ui-1.9.2.custom/jquery-ui-1.9.2.custom.js"></script>
	<?php
		global $_TEMA;
		global $_PETICION;
		if ($_PETICION->accion=='xnews'){
			$_TEMA='blitzer';
		}else if ($_PETICION->accion=='proyectosx'){
			$_TEMA='le-frog';
		}
		$rutaTema=getUrlTema($_TEMA);		
	?>
	<link href="<?php echo $rutaTema; ?>" rel="stylesheet" type="text/css" />	
	
	<!--Wijmo Widgets CSS-->	
	<link href="/web/libs/Wijmo.2.3.2/Wijmo-Complete/css/jquery.wijmo-complete.2.3.2.css" rel="stylesheet" type="text/css" />
	<link href="/web/libs/Wijmo.2.3.2/Wijmo-Open/css/jquery.wijmo-open.2.3.2.css" rel="stylesheet" type="text/css" />				
	<!--Wijmo Widgets JavaScript-->
	<script src="/web/libs/Wijmo.2.3.2/Wijmo-Complete/js/jquery.wijmo-complete.all.2.3.2.min.js" type="text/javascript"></script>
	<script src="/web/libs/Wijmo.2.3.2/Wijmo-Open/js/jquery.wijmo-open.all.2.3.2.min.js" type="text/javascript"></script>	
	<!--script src="http://use.edgefonts.net/krona-one.js"></script-->			
	
	
	
	<script type="text/javascript" src="http://workshop.rs/projects/coin-slider/coin-slider.min.js"></script>
	<link rel="stylesheet" href="http://workshop.rs/projects/coin-slider/coin-slider-styles.css" type="text/css" />

	<?php echo '<link href="/web/'.$_PETICION->modulo.'/css/estilos.css" rel="stylesheet" type="text/css" />'; ?>
	
	
	<style>
		.slider{			
			/* background-color:black !important;			*/
			position:relative;
		}
		body{
			/* background-image:url('http://loadpaper.com/large/Linux_wallpapers_320.jpg');			
			background-image:url('http://www.fondosblackberry.com/user-content/uploads/wall/o/54/34845-gbpics.eu.jpg');
			*/
			background-image:url('http://www.fondosypantallas.com/wp-content/uploads/2009/02/ph-102083.jpg');			
			background-color:#092f46;
			background-repeat:repeat;
		}
		
		.content_wraper{
			/* background-color:black !important;			*/
			width:80% !important;			
		}
		
		.medusa{
			background-image:url('/web/marina/imagenes/medusa.jpg');
			width:81px;
			height:91px;
			position:absolute;
		}
		
		.contenido{
			
			position:relative;
		}
		
		#coin-slider{
				left:50%;
				margin-left:-450px;
		}
		.main_header{
			/* background-image: url('http://themedemo.pmnova.com/wp-content/themes/Blue_Skyline/images/Page-BgGlare.png') !important;
			background-repeat: no-repeat !important; */
		}
		.contenido_center.ui-widget-content{
			border-radius:6px;
		}
		.main_slideshow {
			/*animation-duration: 60s;
			animation-name: slidein;
			animation-iteration-count: infinite;
			
			-webkit-animation-duration:7s;
			-webkit-animation-name:slidein;		  
        	-webkit-animation-iteration-count: infinite;*/
		}
		
		@-webkit-keyframes slidein /* Safari and Chrome */
		{
		0% {background: yellow;}
		25% {background: red;}		
	   50% { background: blue; }
	   75% { background: green; }
	   100% { background: yellow; }
		}
		
		
		@keyframes slidein {
		  from {
			background-color: red;
			
		  }
		 
		  to {
			background-color: blue;
		  }
		}
		.main_slideshow{
			display:none;
		}
		.content_wraper{
		
		margin-bottom: 24px;
		margin-left: 156px;
	}
	.contenido_center.ui-widget-content{
		border-radius:0px !important;
		
	}
	
	h4{
		background: black;
		color: white;
		margin-left: -10px;
		padding: 13px 63px 13px 22px;
		border: 1px solid black;
		display: inline-block;
		box-shadow: 10px 10px 5px #888888;
		cursor:pointer;
		transition: box-shadow 1s, height 2s, transform 2s;
		-moz-transition: box-shadow 1s, height 2s, -moz-transform 2s;
		-webkit-transition: box-shadow 1s, height 2s, -webkit-transform 2s;
		-o-transition: box-shadow 1s, height 2s,-o-transform 2s;
	}
	h4:hover{
		box-shadow: 10px 10px 5px #092f46;
	}
	
	
	
	h4 {
		 text-align: center;     
	}
	h4:before, h4:after {
		font-family: "Some cool font with glyphs", serif;
		content: "\00d7";  /* Some fancy character */
		color: #c83f3f;
	}
	h4:before {
		margin-right: 10px;
	}
	h4:after {
		margin-left: 10px;
	}
		#menu_principal li{
			transition: background .2s, border .2s;
			-moz-transition: background .2s, border .2s; /* Firefox 4 */
			-webkit-transition: background .2s, border .2s; /* Safari and Chrome */
			-o-transition: background .2s, border .2s; /* Opera */
			
		}
	</style>
	<link href="/web/<?php echo $_PETICION->modulo.'/temas_mod/'.$_TEMA; ?>/mods.css" rel="stylesheet" type="text/css" />	
	<script>
		$(function(){
			// var width=$('.main_header #menu_principal').width();
			// var margin=width/2;
			// $('.main_header ').css('left','50%');
			// $('.main_header ').css('margin-left','-'+margin+'px');
			// $('.main_header').width(width);
			
		
			$('#menu_principal li').bind('mouseover',function(el,d){
				 console.log("el2");
				console.log(el);
				console.log("d");
				console.log(d);
				 $(el.currentTarget).addClass('ui-state-hover'); 
			});
			
			$('#menu_principal li').bind('mouseout',function(el,d){
				 console.log("el2");
				console.log(el);
				console.log("d");
				console.log(d);
				 $(el.currentTarget).removeClass('ui-state-hover'); 
			});
			// $('#coin-slider').coinslider({ width: 920});

		});
		
	</script>
</head>
<body>
	<div class="header_wraper">
		<?php $this->mostrar('/header'); ?>
	</div>
	<div class="main_slideshow" style="height:190px;background-color:yellow;width:100%;">
		<div class="slider" style="display:none;">
		<div id='coin-slider'>
			<a href="img01_url" target="_blank">
				<img src='http://www.tn3gallery.com/images/920x360/7.jpg' >
				<span>
					Description for img01
				</span>
			</a>

			<a href="imgN_url">
				<img src='http://www.tn3gallery.com/images/920x360/12.jpg' >
				<span>
					Description for imgN
				</span>
			</a>
			
			<a href="imgN_url">
				<img src='http://www.tn3gallery.com/images/920x360/7.jpg' >
				<span>
					Description for imgN
				</span>
			</a>
			
			<a href="imgN_url">
				<img src='http://www.tn3gallery.com/images/920x360/2.jpg' >
				<span>
					Description for imgN
				</span>
			</a>
			
			<a href="imgN_url">
				<img src='http://www.tn3gallery.com/images/920x360/3.jpg' >
				<span>
					Description for imgN
				</span>
			</a>
			
			<a href="imgN_url">
				<img src='http://www.tn3gallery.com/images/920x360/4.jpg' >
				<span>
					Description for imgN
				</span>
			</a>
		</div>
	</div>
	</div>
	

	<div class="content_wraper">
		<div class="contenido">
			<div class="contenido_center " >
				<?php $this->mostrar(''); ?>
			</div>
			<div class="content_right" > 
				
			</div>
			<div style="clear:both;"></div>
		</div>
	</div>
	
	<div class="footer_wraper" style="color:white;">
		<style>
			.footer_wraper .opciones{ text-align:left;margin-left:121px;}
			.footer_wraper {
				height:200px !important;
				background-image:url('/web/marina/imagenes/bg6_8_2.jpg');
			}
			.footer_wraper li{display:inline-block;padding:10px 30px 10px 0px;}
		</style>
		<p style="margin-left:161px;padding-top:5px;">
		 Marina is a trademark of Exprezzo. All rights reserved.
		 </p>
		
		<ul class="opciones">
			<li>Inicio</li>
			<li>Mapa del sitio</li>
			<li>Nosotros</li>					
			<li>Patrocinadores</li>
			<li>Contacto</li>
			<li><a href="/portal_admin/users/login">Login</a></li>
		</ul>
		<?php $this->mostrar('/footer'); ?>
	</div>
	
		
	
	
	
</body>

</html>