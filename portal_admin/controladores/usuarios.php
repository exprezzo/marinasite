<?php
require_once '../'.$_PETICION->modulo.'/modelos/Usuario_modelo.php';
class usuarios extends Controlador{
	var $modelo="Usuario";
	var $campos=array('nick','pass','email','rol','fbid','id','name','picture','originalName','bio','allowFavorites','allowShared','allowLiked','keepLoged','request');
	
	function nuevo(){		
		$campos=$this->campos;
		$vista=$this->getVista();				
		for($i=0; $i<sizeof($campos); $i++){
			$obj[$campos[$i]]='';
		}
		$vista->datos=$obj;		
		
		global $_PETICION;
		$vista->mostrar('/'.$_PETICION->controlador.'/edicion');
		
		
	}
	
	function guardar(){
		return parent::guardar();
	}
	function borrar(){
		return parent::borrar();
	}
	function editar(){
		return parent::editar();
	}
	function buscar(){
		return parent::buscar();
	}
}
?>