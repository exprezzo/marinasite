<style>
	.seach-box:after{
		content:'';
		clear:both;
	}
</style>
<div class="main_header" >
		
	<div id="menu_principal" style="position:relative;text-align:center;z-index:1;">
		<ul id="navigationMenu">
			<li><a href="/home"><span>Home</span></a>
			</li>
			<li><a href="/publicaciones"><span>Publicaciones</span></a>
			</li>
			<li><a href="/contacto"><span>Contacto</span></a>
		
		</ul>
		<!--div class="user-box">
			<a href="/<?php //echo $_PETICION->modulo; ?>/user/login">entrar</a>			
		</div-->
	</div>
	<div class="sitename" style="color: white;z-index:-1;
position:absolute;
width:100%;
text-align: center;font-size:44px;">Mundo Friki</div>

	<div class="seach-box" style="z-index:2;">
		<form class="searchform" action="/resultados" >
			<input class="searchfield" type="text" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}">
			<input class="searchbutton" type="submit" value="Go">
		</form>
	</div>
	
	
	
</div>