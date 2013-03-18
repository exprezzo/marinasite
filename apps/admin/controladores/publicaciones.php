<?php
include '../apps/'.$_PETICION->modulo.'/modelos/publicaciones_model.php';


class Publicaciones extends Controlador{
	function getModel(){
		if ( !isset($this->modObj) ){
			$this->modObj = new PublicacionModel();
		}
		return $this->modObj;
	}
	/* */
	function guardar(){
		
		
		if ( empty($_POST['datos']) ){
			$res=array(
				'success'=>false,
				'msg'=>'No se recibieron datos para almacenar'
			);
			echo json_encode($res); exit;
		}
		$datos= $_POST['datos'];
		
		
		// $datos['fk_user']=$
		
		$model=$this->getModel();				
		$res = $model->guardar($datos);
		
		if (!$res['success']) {			
			echo json_encode($res); exit;
		}
		// $pk=$res['datos']['id'];
		
		$datos=$res['datos'];
		
		//----------------
		
		$res['datos']=$datos;		
		echo json_encode($res);
	}
	function index(){
		$vista=$this->getVista();
		$vista->mostrar('publicaciones/busqueda');
	}
	
	
	
	/*		FUNCTIONES CRUD 	*/
	// function buscar(){}
	// function guardar(){}
	// function eliminar(){}
	// function nuevo(){}
	
}
?>