<style>
	
</style>
<div class="main_header" >
	
	
	<div class="logo">
		<img  src="/web/apps/<?php echo APP_MODULE; ?>/imagenes/logo2.png" />
		<div class="titulo">
			<span>Marina Suite. </span>
			<span>soluciones web.</span>
		</div>
	</div>
	<div id="menu_principal" style="position:relative;text-align:center;">
		<?php $this->mostrar('/menu');	?>
		<!--div class="user-box">
			<a href="/<?php echo $_PETICION->modulo; ?>/user/login">entrar</a>			
		</div-->
	</div>
	
	<div class="seach-box">
		<form class="searchform">
			<input class="searchfield" type="text" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}">
			<input class="searchbutton" type="button" value="Go">
		</form>
	</div>
	
	
	
</div>