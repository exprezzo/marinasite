<?php
class Paginas extends Controlador{
	function mostrarVista($vistaFile=''){				
		$vista= $this->getVista();			
		$model=new Modelo();		
		$con=$model->getConexion();		
		$sql='SELECT p.*,cp.nombre as categoria FROM cms_publicaciones p
		LEFT JOIN cms_categorias_publicaciones cp ON cp.id = p.fk_categoria';
		$sth=$con->prepare($sql);
		// $sth->bindValue(':codigo','%'.$codigo.'%', PDO::PARAM_STR);		
		$exito=$sth->execute();
		if (!$exito) return $model->getError($sth);		
		$datos =$sth->fetchAll(PDO::FETCH_ASSOC);		
		$vista->publicaciones=$datos;		
		return $vista->mostrar( '/mundo_friki' );
	}	

	function index(){
		global $_PETICION;
		$_PETICION->accion='home';
		$vista=$this->getVista();
		return $vista->mostrar();
	}
}
?>