<?php
class PublicacionesModelo extends Modelo{
	var $tabla="cms_publicaciones";
	var $campos=array('id','titulo','contenido','fecha','autor','fk_autor','fk_categoria','enPortada','imagen','posx','posy');
	
	function nuevo($params){
		return parent::nuevo($params);
	}
	function guardar($params){
		return parent::guardar($params);
	}
	function borrar($params){
		return parent::borrar($params);
	}
	function editar($params){
		return parent::obtener($params);
	}
	function buscar($params){
		return parent::buscar($params);
	}
}
?>