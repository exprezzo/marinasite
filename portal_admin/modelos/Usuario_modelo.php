<?php
class UsuarioModelo extends Modelo{
	var $tabla="system_users";
	var $campos=array('nick','pass','email','rol','fbid','id','name','picture','originalName','bio','allowFavorites','allowShared','allowLiked','keepLoged','request');
	
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