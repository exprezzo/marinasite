<?php


class Publicaciones extends Controlador{
	
	function getModel(){		
		if ( !isset($this->modObj) ){						
			$this->modObj = new Modelo();	
		}	
		return $this->modObj;
	}
		
		
	function editar(){
		global $_PETICION;
		$_PETICION->accion='ver';
		
		$vista=$this->getVista();
		$vista->edicion=true;
		return $this->ver();
	}
	function ver($vistaFile=''){				
		$vista= $this->getVista();			
		$model=$this->getModel();		
		$con=$model->getConexion();		
		
		$id=$_GET['id'];
		$sql='SELECT p.*,cp.nombre as categoria FROM cms_publicaciones p
		LEFT JOIN cms_categorias_publicaciones cp ON cp.id = p.fk_categoria
		WHERE p.id=:id';
		$sth=$con->prepare($sql);
		$sth->bindValue(':id',$id, PDO::PARAM_INT);		
		$exito=$sth->execute();
		if (!$exito) return $model->getError($sth);		
		$datos =$sth->fetchAll(PDO::FETCH_ASSOC);		
		
		if ( empty($datos[0]) ){
			global $_PETICION;
			$_PETICION->accion='error';
		}
		$vista->publicacion=$datos[0];		
		
		
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
	
	
	
}
?>