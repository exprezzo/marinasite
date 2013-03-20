<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html >
<head>
	<script src="/web/libs/jquery-1.8.3.js"></script>
	<script src="/web/libs/jquery-ui-1.9.2.custom/jquery-ui-1.9.2.custom.js"></script>	
	<script type="text/javascript" src="http://workshop.rs/projects/coin-slider/coin-slider.min.js"></script>
	<link rel="stylesheet" href="http://workshop.rs/projects/coin-slider/coin-slider-styles.css" type="text/css" />
	<link href="/web/apps/marina/css/menu_fresco.css"  rel="stylesheet" type="text/css" />
	<?php echo '<link href="/web/apps/'.$_PETICION->modulo.'/css/mundo_friki.css" rel="stylesheet" type="text/css" />'; ?>
	<?php echo '<link href="/web/apps/'.$_PETICION->modulo.'/css/w_noticias.css" rel="stylesheet" type="text/css" />'; ?>
	<style>
		.slider{			
			/* background-color:black !important;			*/
			position:relative;
		}
		
		
		.medusa{
			background-image:url('/web/apps/marina/imagenes/medusa.jpg');
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
		
		/* search form  */
.main_header  .seach-box{position:absolute; right:19px; top:70px}
.searchform {
	display: inline-block;zoom: 1; border: solid 1px #d2d2d2;padding: 3px 5px;-webkit-border-radius: 2em;-moz-border-radius: 2em;border-radius: 2em;*display: inline;			
	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,.1);-moz-box-shadow: 0 1px 0px rgba(0,0,0,.1);box-shadow: 0 1px 0px rgba(0,0,0,.1);background: #f1f1f1;
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));background: -moz-linear-gradient(top,  #fff,  #ededed);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie8 */
	
}
.searchform input { font: normal 12px/100% Arial, Helvetica, sans-serif;}
.searchform .searchfield { background: #fff;padding: 6px 6px 6px 8px;width: 202px;border: solid 1px #bcbbbb;outline: none;-webkit-border-radius: 2em;-moz-border-radius: 2em;border-radius: 2em;
	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.2); -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.2); box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
}
.searchform .searchbutton { color: #fff;border: solid 1px #494949;font-size: 11px;height: 27px;width: 27px;text-shadow: 0 1px 1px rgba(0,0,0,.6);-webkit-border-radius: 2em;-moz-border-radius: 2em;border-radius: 2em;background: #5f5f5f;
	background: -webkit-gradient(linear, left top, left bottom, from(#eeeeee), to(#8A6FB6)); background: -moz-linear-gradient(top,  #9e9e9e,  #454545);filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); -ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie8 */
}

	</style>
	
	<script>
		$(function(){
			

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
				<div class="bubble">
					<?php $this->mostrar(''); ?>
				</div>
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
				background-image:url('/web/apps/marina/imagenes/bg6_8_2.jpg');
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
			<li>Login</li>
		</ul>
		<?php $this->mostrar('/footer'); ?>
	</div>
	
		
	
	
	
</body>

</html>