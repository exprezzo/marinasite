<?php
include '../apps/'.$_PETICION->modulo.'/modelos/publicaciones_model.php';


class Publicaciones extends Controlador{
	
	function getModel(){
		if ( !isset($this->modObj) ){
			$this->modObj = new PublicacionModel();
		}
		return $this->modObj;
	}
	
	
	function editar(){
		// header("Content-Type: text/html;charset=utf-8");
		
		$id=$_REQUEST['id'];
		$model=$this->getModel();
		$params=array(
			'id'=>$id
		);
		
		$obj=$model->obtener( $params );		
		$vista=$this->getVista();		
		$contenido=utf8_encode( $obj['contenido'] );
		$obj['contenido']=$contenido;
		$vista->datos=$obj;
		
		$sql='SELECT * FROM cms_categorias_publicaciones';
		$dbh=$model->getConexion();
		$sth = $dbh->prepare($sql);							
		$success = $sth->execute();
		
		if ($success != true){
			$error=$sth->errorInfo();			
			$success=false; 
			$msg=$error[2];						
			$datos=array();
			$categorias=array();
		}else{
			$categorias=$sth->fetchAll(PDO::FETCH_ASSOC);
		}
		$vista->categorias=$categorias;
		
		$vista->mostrar();
	}
	/* */
	// function guardar(){
		
		
		// if ( empty($_POST['datos']) ){
			// $res=array(
				// 'success'=>false,
				// 'msg'=>'No se recibieron datos para almacenar'
			// );
			// echo json_encode($res); exit;
		// }
		// $datos= $_POST['datos'];
		
		
		
		
		// $model=$this->getModel();				
		// $res = $model->guardar($datos);
		
		// if (!$res['success']) {			
			// echo json_encode($res); exit;
		// }
		
		
		// $datos=$res['datos'];
		
		
		
		// $res['datos']=$datos;		
		// echo json_encode($res);
	// }
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