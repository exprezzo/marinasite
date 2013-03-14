<?php
	//Este bloque es creado para resaltar el menu de la pagina activa
	$idMenu_destinos='';
	$idMenu_index='';
	$idMenu_nosotros='';
	$idMenu_contacto='';
	 global $_PETICION;
	$menus=array();
	$menus[]=array(
		'idMenu'=>'menuHome',
		'estado'=>'',
		'text'=>'Inicio',
		'url'=>'/'.$_PETICION->modulo.'/paginas/home'
	);
	
	$menus[]=array(
		'idMenu'=>'menuMVC',
		'estado'=>'',
		'text'=>'Marina MVC',
		'url'=>'/'.$_PETICION->modulo.'/paginas/marinamvc'
	);
	
	$menus[]=array(
		'idMenu'=>'menuOctopus',
		'estado'=>'',
		'text'=>'Octopus',
		'url'=>'/'.$_PETICION->modulo.'/paginas/octopus'
	);
	
	$menus[]=array(
		'idMenu'=>'menuCoral',
		'estado'=>'',
		'text'=>'Coral',
		'url'=>'/'.$_PETICION->modulo.'/paginas/coral'
	);
	
	// $menus[]=array(
		// 'idMenu'=>'menuProyectos',
		// 'estado'=>'',
		// 'text'=>'Productos',
		// 'url'=>'/'.$_PETICION->modulo.'/paginas/proyectos'
	// );
	// $menus[]=array(
		// 'idMenu'=>'menuServicios',
		// 'estado'=>'',
		// 'text'=>'Servicios',
		// 'url'=>'/'.$_PETICION->modulo.'/paginas/servicios'
	// );
	$menus[]=array(
		'idMenu'=>'menuNews',
		'estado'=>'',
		'text'=>'Publicaciones',
		'url'=>'/'.$_PETICION->modulo.'/paginas/publicaciones'
	);
	
	
	// $menus[]=array(
		// 'idMenu'=>'menuSucursales',
		// 'estado'=>'',
		// 'text'=>'Sucursales',
		// 'url'=>'/'.$_PETICION->modulo.'/paginas/sucursales'
	// );
	// $menus[]=array(
		// 'idMenu'=>'menuBolsa',
		// 'estado'=>'',
		// 'text'=>'Bolsa de trabajo',
		// 'url'=>'/'.$_PETICION->modulo.'/paginas/bolsa'
	// );
	
	$menus[]=array(
		'idMenu'=>'menuContac',
		'estado'=>'',
		'text'=>'Contacto',
		'url'=>'/'.$_PETICION->modulo.'/paginas/contact'
	);
	
?>
<style>
	#menu_principal .ui-state-hover{
		
	}
</style>
<script>
	$(function(){
		// $('#menu_principal li').mouseenter(function(){
			// $(this).addClass('ui-state-hover');
		// });			
		// $('#menu_principal li').mouseleave(function(){
			// $(this).removeClass('ui-state-hover');
		// });		
	});
</script>
	
	<ul  class="ui-widget">	
		<?php
		$raiz= empty($_PETICION->modulo)? '/' : '/'.$_PETICION->modulo.'/';
	
		for($i=0; $i<sizeof($menus); $i++ ){
			if ( $raiz.$_PETICION->controlador.'/'.$_PETICION->accion == $menus[$i]['url'] ){
				$menus[$i]['estado']='ui-state-active';
			}
		}	
		for($i=0; $i<sizeof($menus); $i++){
			echo '<li '.$menus[$i]['idMenu'].' class="ui-state-default '.$menus[$i]['estado'].'"><a href="'.$menus[$i]['url'].'">'.$menus[$i]['text'].'</a></li>';
		}
		?>
	</ul>
