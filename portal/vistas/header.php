<style>
	.seach-box:after{
		content:'';
		clear:both;
	}
</style>
<div class="main_header" >
		
	<div id="menu_principal" style="position:relative;text-align:center;z-index:1;">
		<?php
		if (isset($this->edicion) &&  $this->edicion=== true){
			$this->mostrar('/menu_edicion');
		}else{
			$this->mostrar('/menu');
		}		
		?>
	</div>
	<div class="sitename" style="color: white;z-index:-1;
position:absolute;
width:100%;
text-align: center;font-size:44px;"><?php echo NOMBRE_APL; ?></div>

	<div class="seach-box" style="z-index:2;">
		<form class="searchform" action="/resultados" >
			<input class="searchfield" type="text" value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}">
			<input class="searchbutton" type="submit" value="Go">
		</form>
	</div>
	
	
	
</div>