<?php
class Paginas extends Controlador{
	function mostrarVista($vistaFile=''){				
		$vista= $this->getVista();			
		$model=$this->getModel();		
		$con=$model->getConexion();
		
		$sql='SELECT * FROM cms_publicaciones';
		$sth=$con->prepare($sql);
		// $sth->bindValue(':codigo','%'.$codigo.'%', PDO::PARAM_STR);
		
		$exito=$sth->execute();
		if (!$exito) return $model->getError($sth);
		
		$datos =$sth->fetchAll(PDO::FETCH_ASSOC);
		
		$vista->publicaciones=$datos;
		
		return $vista->mostrar( '/mundo_friki' );
	}	
}
?>